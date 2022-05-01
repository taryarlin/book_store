@section('title', 'Edit Book')

<x-admin-layout>
    <div class="pull-right mb-4">
        <a href="{{ route('admin.book.index') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Back</a>
    </div>

    <div class="clearfix"></div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title text-primary">Edit Book</h5>
            <hr>

            <form action="{{ route('admin.book.update', $book->id) }}" method="POST" enctype="multipart/form-data">
                @method('PATCH')
                @csrf

                <div class="form-group">
                    <label>Category</label>
                    <select name="category_id" class="form-control">
                        <option>Select category...</option>
                        @foreach ($categories as $category_id => $category)
                            <option value="{{ $category_id }}" @if($book->category_id == $category_id) selected @endif>{{ $category }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" value="{{ $book->title }}" class="form-control">
                </div>

                <div class="form-group">
                    <label>Author Name</label>
                    <input type="text" name="author" value="{{ $book->author }}" class="form-control">
                </div>

                <div class="form-group">
                    <label>Summary</label>
                    <textarea name="summary" class="form-control" rows="5">{{ $book->summary }}</textarea>
                </div>

                <img src="{{ asset('images/book_cover/' . $book->cover) }}" alt="Book Cover" class="w-25 pb-3">
                <div class="form-group">
                    <label>Cover</label>
                    <input type="file" name="cover" class="form-control">
                </div>

                <div class="pull-right">
                    <button class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
