<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Purchase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class UserController extends Controller
{


// To view index page with filter logic
    public function index(Request $request)
{
    $data = Books::query();
    $user_id = Auth::id();
    $categories = ['Action', 'Motivational', 'Comics', 'Romance'];
    $requestedCategory = $request->input('category'); 

    if (!empty($requestedCategory)) {
        $data->where('category', $requestedCategory);
    }

    $data = $data->get();

    return view('index', compact('data', 'user_id', 'categories', 'requestedCategory'));
}


// To check DB connection
    public function checkdb(){
        try{
            DB::connection()->getPdo();
            if(DB::connection()->getDatabaseName()){
                echo "Successfully connected";
            }
        } catch (\Exception $e){
            die ("Could not connect");
        }
    }




// To view selected book details and check whether the user owns the book
    public function showbook($id)
{
    $user = auth()->user();
    $book = Books::find($id);
    $userOwnsBook = false;

    if ($user) {
        $userOwnsBook = Purchase::where('user_id', $user->id)
                            ->where('book_id', $book->id)
                            ->exists();
    }

    return view('BookFiles/bookshow', compact('book', 'userOwnsBook'));
}


// for testing
public function test(){
    return view('test');
}


}


