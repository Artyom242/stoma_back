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

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.2.1/dist/jquery.min.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery.maskedinput@1.4.1/src/jquery.maskedinput.min.js" type="text/javascript"></script>

</body>
</html>
