@section('title', 'Rented Book List')

<x-admin-layout>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title text-primary">Rented Books</h5>
            <hr>

            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th width="15%">Book Title</th>
                            <th>Category Name</th>
                            <th>Student Name</th>
                            <th>Rented Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($order_details as $key => $order_detail)
                            <tr>
                                <td>{{ $key+1 }}</td>

                                <td>
                                    <a href="{{ route('admin.book.show', $order_detail->Order->Book->id) }}">
                                        <img src="{{ asset('images/book_cover/' . $order_detail->Order->Book->cover) }}" alt="Book Cover" class="w-25 pb-3">
                                        <br>
                                        {{ $order_detail->Order->Book->title }}
                                    </a>
                                </td>

                                <td>{{ $order_detail->Order->Book->Category->name }}</td>

                                <td>{{ $order_detail->Student->name }}</td>

                                <td>
                                    <span class="py-1 px-2 text-white rounded
                                        @if (isOverDueDate($order_detail->created_at, $order_detail->status)) bg-danger @elseif (isDueDate($order_detail->created_at, $order_detail->status)) bg-warning @else bg-primary @endif
                                    ">
                                        <i class="fas fa-clock"></i> {{ $order_detail->created_at->diffForHumans() }}
                                    </span>
                                </td>

                                <td>
                                    <span class="py-1 px-3 text-white rounded
                                        @if (isOverDueDate($order_detail->created_at, $order_detail->status)) bg-danger @elseif (isDueDate($order_detail->created_at, $order_detail->status)) bg-warning @else bg-primary @endif
                                    ">
                                        {{ Str::ucfirst($order_detail->status) }}
                                    </span>
                                </td>

                                <td>
                                    <a href="{{ route('admin.order.change-status', $order_detail->id) }}" class="btn btn-sm btn-primary text-white"><i class="fa fa-edit"></i>  Change Status</a>
                                </td>
                            </tr>
                        @empty
                            <div class="alert alert-info">No Record Found.</div>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="pull-right">
                {!! $order_details->links() !!}
            </div>

        </div>
    </div>

</x-admin-layout>
