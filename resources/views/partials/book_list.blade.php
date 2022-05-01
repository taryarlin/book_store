<div class="card my-10">
    <div class="card-body">
        <h3 class="text-xl font-black mb-4"><i class="fa-solid fa-rectangle-list"></i> Book List</h3>

        <div class="grid grid-cols-4 gap-4">
            @forelse ($books as $book)
                <div class="max-w-sm bg-white rounded-lg border border-gray-200 shadow-md">
                    <a href="{{ route('book.detail', $book->id) }}">
                        <img class="rounded-t-lg" src="{{ asset('images/book_cover') . '/' . $book->cover }}" alt="" />
                    </a>
                    <div class="p-5">
                        <a href="{{ route('book.detail', $book->id) }}">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{ \Illuminate\Support\Str::limit($book->title, 25) }}</h5>
                        </a>
                        <p class="mb-3 font-normal text-gray-700">{{ \Illuminate\Support\Str::limit($book->summary, 70) }}</p>

                       <div class="text-center">
                            @auth
                                <form action="{{ route('cart.add-to-cart') }}" method="POST">
                                    @csrf

                                    <input type="hidden" name="book_id" value="{{ $book->id }}">

                                    <button class="block items-center py-2 px-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                                        <i class="fa-solid fa-cart-shopping mr-2 w-4 h-4"></i>
                                        Rent Book
                                    </button>
                                </form>
                            @endauth

                            @guest
                                <a href="{{ route('login') }}" class="block items-center py-2 px-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                                    <i class="fa-solid fa-cart-shopping mr-2 w-4 h-4"></i>
                                    Login to Rent
                                </a>
                            @endguest
                       </div>
                    </div>
                </div>
            @empty
                <div class="alert alert-danger">No Books</div>
            @endforelse
        </div>
    </div>
</div>
