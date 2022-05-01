@extends('layouts.master')

@section('content')
    <div class="justify-content-center mt-6 pb-5">
        @include('partials.category_list')

        @include('partials.book_list')

        @include('partials.app_download')
    </div>
@endsection
