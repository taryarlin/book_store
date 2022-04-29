@section('title', 'Admin')

<x-admin-layout>
    <div class="pull-right mb-4">
        <a href="{{ route('admin.admin.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Create New Admin</a>
    </div>

    <div class="clearfix"></div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title text-primary">Admin</h5>
            <hr>

            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Registered At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($admins as $key => $admin)
                            <tr>
                                <td>{{ $key+1 }}</td>

                                <td>
                                    <a href="{{ route('admin.admin.show', $admin->id) }}">{{ $admin->name }}</a>
                                </td>

                                <td>{{ $admin->email }}</td>

                                <td>{{ $admin->created_at->diffForHumans() }}</td>

                                <td>
                                    <a href="{{ route('admin.admin.edit', $admin->id) }}" class="btn btn-sm btn-warning text-white"><i class="fa fa-edit"></i>  Edit</a>
                                    @if ($admins->count() > 0)
                                        <form action="{{ route('admin.admin.destroy', $admin->id) }}" method="POST" class="d-inline-block">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-danger text-white" onclick="return confirm('Are you sure you want to Delete?');"><i class="fa fa-trash"></i>  Delete</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <div class="alert alert-info">No Record Found.</div>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="pull-right">
                {!! $admins->links() !!}
            </div>

        </div>
    </div>

</x-admin-layout>
