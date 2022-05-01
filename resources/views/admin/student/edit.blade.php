@section('title', 'Edit Student')

<x-admin-layout>
    <div class="pull-right mb-4">
        <a href="{{ route('admin.student.index') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Back</a>
    </div>

    <div class="clearfix"></div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title text-primary">Edit Student</h5>
            <hr>

            <form action="{{ route('admin.student.update', $student->id) }}" method="POST">
                @method('PATCH')
                @csrf

                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" value="{{ $student->name }}" class="form-control">
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" value="{{ $student->email }}" class="form-control">
                </div>

                <div class="form-group">
                    <label>Phone</label>
                    <input type="email" name="phone" value="{{ $student->phone }}" class="form-control">
                </div>

                <div class="form-group">
                    <label>Address</label>
                    <textarea name="address" class="form-control" rows="3">{{ $student->address }}</textarea>
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
