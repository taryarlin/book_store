<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class CartController extends Controller
{
    const CART_SESSION_KEY = 'book_cart';

    public function index()
    {
        return view('cart', ['cart_items' => $this->getCartSession()]);
    }

    public function clearCart()
    {
        session()->forget(self::CART_SESSION_KEY);

        return redirect()->route('home.index')->with('global_alert', 'Cart is clear successfully.');
    }

    public function addToCart(Request $request)
    {
        $request->validate(['book_id' => ['required']]);

        $already_added = false;
        $cart_session = $this->getCartSession();

        foreach ($cart_session as $cart) {
            if (isset($cart['book_id']) && $cart['book_id'] == $request->book_id) {
                $already_added = true;
            }
        }

        if ($already_added == false) {
            $book = Book::find($request->book_id);
            $session_data = [
                'book_id' => $request->book_id,
                'title' => $book->title,
                'author' => $book->author,
                'cover' => $book->cover,
                'student_id' => auth()->user()->id,
            ];

            $cart_session[] = $session_data;

            session()->put(self::CART_SESSION_KEY, $cart_session);

            return back()->with('global_alert', 'Book is added to cart successfully.');
        } else {
            return back()->with('global_alert', 'Book is already in cart.');
        }
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
