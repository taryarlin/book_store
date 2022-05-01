<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    const ORDER_STATUS = [
        'rented' => 'Rented',
        'returned' => 'Returned'
    ];

    public function index()
    {
        return view('admin.order.index', ['order_details' => OrderDetail::paginate(10)]);
    }

    public function changeStatus(OrderDetail $order_detail)
    {
        return view('admin.order.change_status', [
            'order_detail' => $order_detail,
            'order_status' => self::ORDER_STATUS
        ]);
    }

    public function updateStatus(OrderDetail $order_detail, Request $request)
    {
        $order_detail->update(['status' => $request->status]);

        return redirect()->route('admin.order.index')->with('status', 'Student rent status is successfully changed.');
    }
}
