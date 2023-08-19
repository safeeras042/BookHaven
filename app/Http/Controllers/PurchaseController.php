<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Books;
use App\Models\User;
use App\Models\Cart;
use App\Models\Purchase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
// Adds to cart
class PurchaseController extends Controller
{


// For Login required
    public function __construct()
    {
        $this->middleware('auth')->only(['addToCart']);
    }

 // To add book to cart
    public function addToCart(Request $request)
    {
        $bookId = $request->input('book_id');
        $userId = $request->input('user_id');


        $existingCartItem = Cart::where('user_id', $userId)
                            ->where('book_id', $bookId)
                            ->first();

        if ($existingCartItem) {
            // return redirect()->route('book.cart',['user_id'=>$userId]);
            return redirect()->back()->with('message', 'Item already added in Cart.');
        }

        Cart::create([
            'book_id' => $bookId,
            'user_id' => $userId,
        ]);

        return redirect()->route('book.cart', ['user_id'=>$userId]);
    }
    

// To remove cart item
    public function removeItem(Cart $cart_id)
    {
        $cart_id->delete();
        return redirect()->back()->with('message', 'Item removed from cart.');
    }


// To fetch the user's cart items and calculate the total price
private function fetchCartItems($user_id)
{
    $userItems = Cart::where('user_id', $user_id)->get();
    $bookInfo = [];
    $totalPrice = 0;

    foreach ($userItems as $userItem) {
        $book = Books::find($userItem->book_id);
        if ($book) {
            $bookInfo[$userItem->book_id] = [
                'title' => $book->title,
                'price' => $book->price,
                'cover_image' => $book->cover_image
            ];
            $totalPrice += $book->price;
        }
    }

    return [
        'bookInfo' => $bookInfo,
        'userItems' => $userItems,
        'totalPrice' => $totalPrice
    ];
}

public function cartItems($user_id)
{
    if (Auth::check() && Auth::id() == $user_id) {
        $data = $this->fetchCartItems($user_id);
        return view('Purchase/cart', $data);
    } else {
        return redirect()->route('book.index');
    }
}

// For orderSummary
public function orderSummary($user_id)
{
    if (Auth::check() && Auth::id() == $user_id) {
        $user_id = Auth::id();
        $data = $this->fetchCartItems($user_id);
        $book_ids = Cart::where('user_id', $user_id)->pluck('book_id')->toArray();
        $data['user_id'] = $user_id;
        $data['book_ids'] = $book_ids;
        return view('Purchase/purchase', $data);
    } else {
        return redirect()->route('book.index');
    }
}




// checks the form is filled in purchase section and logic to form submition
public function purchaseStore(Request $request)
{
    try {
        $validator = Validator::make($request->all(), [
            'payment_type' => 'required',
            'user_id' => 'required|exists:users,id', 
            'name' => 'required',
            'billing_address' => 'required',
            'book_ids' => 'required|array', 
            'book_ids.*' => 'required|exists:books,id', 
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $payment_type = $request->input('payment_type');
        $user_id = $request->input('user_id');
        $name = $request->input('name');
        $billing_address = $request->input('billing_address');
        $book_ids = $request->input('book_ids');

        DB::beginTransaction();

        foreach ($book_ids as $book_id) {
            $purchase = new Purchase();
            $purchase->payment_type = $payment_type;
            $purchase->user_id = $user_id;
            $purchase->name = $name;
            $purchase->billing_address = $billing_address;
            $purchase->book_id = $book_id;
            $purchase->save();
        }

        Cart::where('user_id', $user_id)->delete();

        DB::commit();

        return redirect()->route('book.index')->with('message', 'Purchased Successfully. Go to My Books to read your book.');
    } catch (\Exception $e) {
        DB::rollback();
        // Handle exception, log error, and return a response
        return redirect()->back()->with('error', 'An error occurred while processing your purchase.');
    }
}

}