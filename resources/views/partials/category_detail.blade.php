@extends('layouts.master', ['small_header' => true])

@section('content')
    <h3 class="text-2xl my-4 font-black">Category Name - {{ $category->name }}</h3>

    <hr>

    <div class="justify-content-center mt-6 pb-5">
        @include('partials.book_list')
    </div>
@endsection
