<div class="card my-10">
    <div class="card-body">
        <h3 class="text-xl font-black my-5"><i class="fa-solid fa-list"></i> Category List</h3>

        <div class="grid grid-cols-5 gap-2">
            @foreach ($categories as $category)
                <a href="{{ route('category.detail', $category->id) }}" class="bg-white shadow-md p-4 rounded text-center text-indigo-600">
                    {{ $category->name }}
                </a>
            @endforeach
        </div>
    </div>
</div>
