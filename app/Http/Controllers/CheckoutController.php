<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    const CART_SESSION_KEY = 'book_cart';

    public function index()
    {
        return view('checkout', ['cart_items' => $this->getCartSession()]);
    }

    public function confirmCheckout(Request $request)
    {
        $this->validate($request, ['checkout_items' => 'required']);

        $checkout_items = json_decode($request->checkout_items, 1);
        foreach ($checkout_items as $item) {
            $order = Order::create([
                'student_id' => auth()->user()->id,
                'book_id' => $item['book_id']
            ]);

            OrderDetail::create([
                'order_id' => $order->id,
                'student_id' => auth()->user()->id,
                'status' => 'rented'
            ]);
        }

        session()->forget(self::CART_SESSION_KEY);

        return redirect()->route('home.index')->with('global_alert', 'You are successfully rented books.');
    }

    private static function getCartSession()
    {
        if (session()->has(self::CART_SESSION_KEY)) {
            $session = request()->session()->get(self::CART_SESSION_KEY);

            return $session;
        }

        return [];
    }
}
