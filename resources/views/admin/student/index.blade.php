@section('title', 'Student')

<x-admin-layout>
    <div class="pull-right mb-4">
        <a href="{{ route('admin.student.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Create New Student</a>
    </div>

    <div class="clearfix"></div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title text-primary">Student</h5>
            <hr>

            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Registered At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($students as $key => $student)
                            <tr>
                                <td>{{ $key+1 }}</td>

                                <td>
                                    <a href="{{ route('admin.student.show', $student->id) }}">{{ $student->name }}</a>
                                </td>

                                <td>{{ $student->email }}</td>

                                <td>{{ $student->phone }}</td>

                                <td>{{ $student->created_at->diffForHumans() }}</td>

                                <td>
                                    <a href="{{ route('admin.student.edit', $student->id) }}" class="btn btn-sm btn-warning text-white"><i class="fa fa-edit"></i>  Edit</a>
                                    <form action="{{ route('admin.student.destroy', $student->id) }}" method="POST" class="d-inline-block">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger text-white" onclick="return confirm('Are you sure you want to Delete?');"><i class="fa fa-trash"></i>  Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <div class="alert alert-info">No Record Found.</div>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="pull-right">
                {!! $students->links() !!}
            </div>

        </div>
    </div>

</x-admin-layout>
