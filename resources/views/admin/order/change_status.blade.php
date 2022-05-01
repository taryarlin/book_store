@section('title', 'Change Rent Status')

<x-admin-layout>
    <div class="pull-right mb-4">
        <a href="{{ route('admin.order.index') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Back</a>
    </div>

    <div class="clearfix"></div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title text-primary">Change Rent Status</h5>
            <hr>

            <form action="{{ route('admin.order.update-status', $order_detail->id) }}" method="POST">
                @method('PATCH')
                @csrf

                <div class="form-group">
                    <label>Rent Status</label>
                    <select name="status" class="form-control">
                        <option>Select Status...</option>
                        @foreach ($order_status as $status_id => $status)
                            <option value="{{ $status_id }}" @if($order_detail->status == $status_id) selected @endif>
                                {{ $status }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="pull-right">
                    <button class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
