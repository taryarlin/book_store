@extends('layouts.master', ['small_header' => true])

@section('content')
    @if(count($order_details) > 0)
        <div class="mt-6 pb-5">
            <h3 class="text-xl font-black mb-4"><i class="fa-solid fa-list"></i> Your Rented Books</h3>

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3" width="20%">
                                Book Cover
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Title
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Author
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Rented Date
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Status
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order_details as $order_detail)
                            <tr class="border-b odd:bg-white even:bg-gray-50">
                                <td class="px-6 py-4">
                                    <img src="{{ asset('images/book_cover') . '/' . $order_detail->Order->Book->cover }}" alt="Book Cover" class="w-3/12 pb-3">
                                </td>
                                <td class="px-6 py-4">
                                    {{ $order_detail->Order->Book->title }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $order_detail->Order->Book->author }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $order_detail->created_at->diffForHumans() }}
                                </td>
                                <td class="px-6 py-4">
                                    <span class="p-2 text-white rounded
                                        @if (isOverDueDate($order_detail->created_at, $order_detail->status))
                                            bg-red-600
                                        @elseif(isDueDate($order_detail->created_at, $order_detail->status))
                                            bg-yellow-600
                                        @else
                                            bg-indigo-600
                                        @endif
                                    ">
                                        {{ Str::ucfirst($order_detail->status) }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @else
        <div class="p-4 mt-4 text-sm text-blue-700 bg-blue-100 rounded-lg dark:bg-blue-200 dark:text-blue-800" role="alert">
            <span class="font-medium">No book found.
        </div>
        <br>
    @endif
@endsection
