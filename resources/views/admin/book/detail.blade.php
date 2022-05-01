@section('title', 'Book Detail')

<x-admin-layout>
    <div class="pull-right mb-4">
        <a href="{{ route('admin.book.index') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Back</a>
    </div>

    <div class="clearfix"></div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title text-primary">Book Detail</h5>
            <hr>

            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th>Cover Image</th>
                            <td><img src="{{ asset('images/book_cover') . '/' . $book->cover }}" alt="Book Cover"></td>
                        </tr>
                        <tr>
                            <th>Title</th>
                            <td>{{ $book->title }}</td>
                        </tr>
                        <tr>
                            <th>Category</th>
                            <td>{{ $book->Category->name }}</td>
                        </tr>
                        <tr>
                            <th>Author Name</th>
                            <td>{{ $book->author }}</td>
                        </tr>
                        <tr>
                            <th>Summary</th>
                            <td>{{ $book->summary }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-admin-layout>
