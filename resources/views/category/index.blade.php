@extends('layouts.master', ['small_header' => true])

@section('content')
    <div class="justify-content-center mt-6 pb-5">
        @include('partials.category_list')
    </div>
@endsection
