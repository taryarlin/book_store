<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;

require __DIR__.'/auth.php';

Route::get('/', 'PageController@index')->name('home.index');
Route::get('/history', 'PageController@history')->name('home.history');
Route::get('/contact', 'PageController@contact')->name('home.contact');

// Book
Route::get('/books', 'BookController@index')->name('book.index');
Route::get('/books/{book}', 'BookController@detail')->name('book.detail');

// Category
Route::get('/categories', 'CategoryController@index')->name('category.index');
Route::get('/categories/{category}', 'CategoryController@detail')->name('category.detail');

Route::group(['middleware' => 'auth'], function () {
    // Cart
    Route::get('/cart', 'CartController@index')->name('cart.index');
    Route::post('/add-to-card', 'CartController@addToCart')->name('cart.add-to-cart');
    Route::get('/clear-card', 'CartController@clearCart')->name('cart.clear-cart');

    // Checkout
    Route::get('checkout', 'CheckoutController@index')->name('checkout.index');
    Route::post('checkout/confirm-checkout', 'CheckoutController@confirmCheckout')->name('checkout.confirm-checkout');

    // Dashboard
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index');
});

// Admin Panel
Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function () {
    Route::namespace('Auth')->middleware('guest:admin')->group(function () {
        Route::get('login', 'AuthenticatedSessionController@create')->name('login');
        Route::post('login', 'AuthenticatedSessionController@store')->name('post_login');
    });

    Route::middleware('admin')->group(function () {
        Route::post('logout', 'Auth\AuthenticatedSessionController@destroy')->name('logout');

        Route::get('dashboard', 'DashboardController@index')->name('dashboard');
        Route::resource('admin', AdminController::class);
        Route::resource('student', StudentController::class);
        Route::resource('category', CategoryController::class);
        Route::resource('book', BookController::class);

        // Order
        Route::get('order', 'OrderController@index')->name('order.index');
        Route::get('order/{order_detail}/change-status', 'OrderController@changeStatus')->name('order.change-status');
        Route::patch('order/{order_detail}/update-status', 'OrderController@updateStatus')->name('order.update-status');
    });
});
