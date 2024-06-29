<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('web.layouts.head')
</head>
<body>
    <div class="wrapper" id="app">
            <header>
                @yield('header')
            </header>

            <main class="main_blocks">
                <header-sticky></header-sticky>
                <modal></modal>
                <success-modal></success-modal>
                @yield('content')
            </main>

            <footer class="back_footer">
                @include('web.layouts.footer')
            </footer>
    </div>

    @yield('scripts')
</body>
</html>
