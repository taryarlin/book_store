@section('title', 'Book List')

<x-admin-layout>
    <div class="pull-right mb-4">
        <a href="{{ route('admin.book.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Create New Book</a>
    </div>

    <div class="clearfix"></div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title text-primary">Book</h5>
            <hr>

            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Title</th>
                            <th>Category Name</th>
                            <th>Author Name</th>
                            <th>Summary</th>
                            <th width="10%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($books as $key => $book)
                            <tr>
                                <td>{{ $key+1 }}</td>

                                <td>
                                    <a href="{{ route('admin.book.show', $book->id) }}">
                                        <img src="{{ asset('images/book_cover/' . $book->cover) }}" alt="Book Cover" class="w-25 pb-3">
                                        <br>
                                        {{ $book->title }}
                                    </a>
                                </td>

                                <td>{{ $book->Category->name }}</td>

                                <td>{{ $book->author }}</td>

                                <td>{{ $book->summary }}</td>

                                <td>
                                    <a href="{{ route('admin.book.edit', $book->id) }}" class="btn btn-sm btn-warning text-white"><i class="fa fa-edit"></i>  Edit</a>
                                    <form action="{{ route('admin.book.destroy', $book->id) }}" method="POST" class="d-inline-block">
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
                {!! $books->links() !!}
            </div>

        </div>
    </div>

</x-admin-layout>
