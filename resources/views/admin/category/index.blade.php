@section('title', 'Category List')

<x-admin-layout>
    <div class="pull-right mb-4">
        <a href="{{ route('admin.category.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Create New Category</a>
    </div>

    <div class="clearfix"></div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title text-primary">Category</h5>
            <hr>

            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Category Name</th>
                            <th>Remark</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $key => $category)
                            <tr>
                                <td>{{ $key+1 }}</td>

                                <td>
                                    {{ $category->name }}
                                </td>

                                <td>{{ $category->remark }}</td>

                                <td>
                                    <a href="{{ route('admin.category.edit', $category->id) }}" class="btn btn-sm btn-warning text-white"><i class="fa fa-edit"></i>  Edit</a>
                                    <form action="{{ route('admin.category.destroy', $category->id) }}" method="POST" class="d-inline-block">
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
                {!! $categories->links() !!}
            </div>

        </div>
    </div>

</x-admin-layout>
