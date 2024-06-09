<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('web.layouts.head')
</head>
<body>
    <div class="wrapper">
        <header>
            @yield('header')
        </header>

        <main class="main_blocks">
            @include('web.components.header_sticky')
            @yield('content')
        </main>

        <footer class="back_footer">
            @include('web.layouts.footer')
        </footer>
    </div>

    @yield('scripts')
</body>
</html>
