@extends('layouts.master', ['small_header' => true])

@section('content')
    @if(count($cart_items) > 0)
        <div class="mt-6 pb-5">
            <h3 class="text-xl font-black mb-4"><i class="fa-solid fa-credit-card"></i> Checkout</h3>

            <div class="p-4 my-4 text-sm text-blue-700 bg-blue-100 rounded-lg dark:bg-blue-200 dark:text-blue-800 text-center" role="alert">
                <span class="font-medium">Please make sure to rent all of these books!</span>
            </div>

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Book Cover
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Title
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Author
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cart_items as $cart_item)
                            <tr class="border-b odd:bg-white even:bg-gray-50">
                                <td class="px-6 py-4">
                                    <img src="{{ asset('images/book_cover') . '/' . $cart_item['cover'] }}" alt="Book Cover" class="w-3/12 pb-3">
                                </td>
                                <td class="px-6 py-4">
                                    {{ $cart_item['title'] }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $cart_item['author'] }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-4 text-right">
                <form action="{{ route('checkout.confirm-checkout') }}" method="POST">
                    @csrf

                    <input type="hidden" name="checkout_items" value="{{ json_encode($cart_items) }}">

                    <button type="submit" class="inline-block items-center py-2 px-3 text-sm font-medium text-center text-white bg-blue-700 rounded hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                        <i class="fa-solid fa-user-check"></i> Submit Rent
                    </button>
                </form>
            </div>
        </div>
    @else
        <div class="p-4 mt-4 text-sm text-blue-700 bg-blue-100 rounded-lg dark:bg-blue-200 dark:text-blue-800" role="alert">
            <span class="font-medium">No item found.
        </div>
        <br>
    @endif
@endsection
