<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LibraryController extends Controller
{
    public function index()
    {
        $books = Book::latest()->paginate('10');
        return view('student.library.index', compact('books'));
    }

    public function show(Book $book)
    {
        return view('student.library.show', compact('book'));
    }

    public function borrow(Request $request, Book $book)
    {
        $borrow = $request->validate([
            'book_id',
            'borrow',
            'return',
            'date_return',
            'mulct',
        ]);

        $borrow['student_id'] = Auth::user()->id;

        Book::create($borrow);
    }
}
