@section('title', 'Edit Admin')

<x-admin-layout>
    <div class="pull-right mb-4">
        <a href="{{ route('admin.admin.index') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Back</a>
    </div>

    <div class="clearfix"></div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title text-primary">Edit Admin</h5>
            <hr>

            <form action="{{ route('admin.admin.update', $admin->id) }}" method="POST">
                @method('PATCH')
                @csrf

                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" value="{{ $admin->name }}" class="form-control">
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" value="{{ $admin->email }}" class="form-control">
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control">
                </div>

                <div class="form-group">
                    <label>Confirmed Password</label>
                    <input type="password" name="password_confirmation" class="form-control">
                </div>

                <div class="pull-right">
                    <button class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
