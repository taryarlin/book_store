<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="icon" type="image/x-icon" href="{{ asset('images/favion.png') }}">

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        {{-- Fontawesome --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        @stack('header')
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            <div id="global_alert">
                @if(session()->has('global_alert'))
                    <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800 text-center" role="alert">
                        {{ session('global_alert') }}
                    </div>
                @endif
            </div>

            {{-- Top Bar --}}
            @include('layouts.partials.topbar')

            <!-- Page Heading -->
            @include('layouts.partials.header')

            <!-- Page Content -->
            <main>
                <div class="container mx-auto">
                    @yield('content')
                </div>
            </main>
        </div>

        @include('layouts.partials.footer')

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        @stack('scripts')

        <script>
            setTimeout(() => {
                document.getElementById('global_alert').style.display = 'none'
            }, 3000);
        </script>
    </body>
</html>
