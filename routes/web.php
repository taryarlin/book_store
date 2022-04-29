<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

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
    });
});
