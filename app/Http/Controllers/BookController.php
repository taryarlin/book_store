<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        return view('book.index', ['books' => Book::all()]);
    }

    public function detail(Book $book)
    {
        return view('partials.book_detail', ['book' => $book]);
    }
}
