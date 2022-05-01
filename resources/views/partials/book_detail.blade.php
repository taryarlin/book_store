@extends('layouts.master', ['small_header' => true])

@section('content')
<div class="p-4 mt-6 pb-5 w-full">
    <div class="card p-4 shadow-md rounded bg-white">
        <div class="card-body text-center">
            <img class="object-cover rounded mx-auto" src="{{ asset('images/book_cover') . '/' . $book->cover }}" alt="">

            <h3 class="text-2xl my-4 font-black">{{ $book->title }}</h3>

            <h3 class="text-md text-gray-700 my-2">
                <i class="fa-solid fa-user-pen"></i> {{ $book->author }} | <i class="fa-solid fa-list"></i> {{ $book->Category->name }}
            </h3>

            <p class="my-4">{{ $book->summary }}</p>

            @auth
                <a href="#" class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                    <i class="fa-solid fa-cart-shopping mr-2 w-4 h-4"></i>
                    Rent Book
                </a>
            @endauth

            @guest
                <a href="{{ route('login') }}" class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                    <i class="fa-solid fa-cart-shopping mr-2 w-4 h-4"></i>
                    Login to Rent
                </a>
            @endguest
        </div>
    </div>
</div>
@endsection
