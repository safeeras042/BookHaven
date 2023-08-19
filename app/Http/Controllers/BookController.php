<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Purchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class BookController extends Controller
{
    // To view books owned by user
    public function mybook(){
        $user = Auth::user();
        $purchases = Purchase::with('book')
        ->where('user_id', $user->id)
        ->get();
    
        return view('BookFiles/booksown', compact('purchases'));
    }


    // To read read books and to checks for Unauthorized access
    public function readbook($id)
    {
        $book = Books::findOrFail($id);
        if (Gate::denies('view-book', $book)) {
            abort(403, 'Unauthorized');
        }else{
            return view('BookFiles/booksread', compact('book'));
        }
    }

    // Search function
    public function search(Request $request)
    {
        $query = $request->input('query');
        $books = Books::where('title', 'like', "%$query%")->get();

        return view('BookFiles/booksearch', compact('books', 'query'));
    }
}
