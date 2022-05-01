<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Order;
use App\Models\Category;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view('index', [
            'books' => Book::all(),
            'categories' => Category::all(),
        ]);
    }

    public function history()
    {
        return view('history');
    }

    public function contact()
    {
        return view('contact');
    }
}
