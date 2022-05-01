<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('category.index', ['categories' => Category::all()]);
    }

    public function detail(Category $category)
    {
        return view('partials.category_detail', [
            'category' => $category,
            'books' => $category->Book
        ]);
    }
}
