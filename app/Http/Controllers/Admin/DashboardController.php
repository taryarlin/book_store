<?php

namespace App\Http\Controllers\Admin;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use App\Models\OrderDetail;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'student_total' => Student::count(),
            'category_total' => Category::count(),
            'book_total' => Book::count(),
            'order_total' => OrderDetail::count(),
        ]);
    }
}
