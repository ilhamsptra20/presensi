<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

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
        $request->validate([
            'student_id',
            'book_id',
            'borrow',
            'return',
            'date_return',
            'mulct',
        ]);
    }
}
