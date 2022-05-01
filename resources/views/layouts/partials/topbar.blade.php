<div class="container mx-auto">
    <div class="py-2 text-right">
        @guest
            <i class="fa-solid fa-lock text-indigo-600"></i>
            <a href="{{ route('login') }}" class="text-xs text-black-500 hover:text-black-900">Login</a>
            |
            <a href="{{ route('register') }}" class="text-xs text-black-500 hover:text-black-900">Register</a>
        @endguest

        @auth
            <i class="fa-solid fa-user-graduate text-indigo-600"></i>
            <a href="{{ route('dashboard.index') }}" class="text-xs text-black-500 hover:text-black-900">{{ Auth::user()->name }}</a>
            |
            <form method="POST" action="{{ route('logout') }}" class="inline-block">
                @csrf
                <a href="{{ route('logout') }}" onclick="event.preventDefault();this.closest('form').submit();" class="text-xs text-black-500 hover:text-black-900">Logout</a>
            </form>
            |
            <a href="{{ route('cart.index') }}" class="bg-green-100 text-green-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-green-200 dark:text-green-900">
                <i class="fa-solid fa-cart-shopping"></i>
                {{ session()->has('book_cart') && (count(session()->get('book_cart')) > 0) ? count(session()->get('book_cart')) : 0 }}
            </a>
        @endauth
    </div>
</div>
