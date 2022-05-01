@section('title', 'Create Category')

<x-admin-layout>
    <div class="pull-right mb-4">
        <a href="{{ route('admin.category.index') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Back</a>
    </div>

    <div class="clearfix"></div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title text-primary">Create Category</h5>
            <hr>

            <form action="{{ route('admin.category.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                </div>

                <div class="form-group">
                    <label>Remark</label>
                    <textarea name="remark" class="form-control" rows="5">{{ old('remark') }}</textarea>
                </div>

                <div class="pull-right">
                    <button class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
