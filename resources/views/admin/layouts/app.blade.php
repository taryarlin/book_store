<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Book Verse | @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">

    <link href="{{ asset('backend/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/css/style.css') }}" rel="stylesheet">

    @stack('header')

</head>

<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">

        @include('admin.layouts.partials.header')

        <div class="app-main">

            @include('admin.layouts.partials.sidebar')

            <div class="app-main__outer">

                <div class="app-main__inner">
                    @include('page_info')

                    <main class="mb-4">
                        {{ $slot }}
                    </main>
                </div>

                @include('admin.layouts.partials.footer')

            </div>
        </div>

    </div>

    <script type="text/javascript" src="{{ asset('backend/scripts/main.js') }}"></script>

    @stack('scripts')

</body>
</html>
