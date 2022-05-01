<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $order_details = OrderDetail::where('student_id', auth()->user()->id)->get();

        return view('dashboard', ['order_details' => $order_details]);
    }
}
