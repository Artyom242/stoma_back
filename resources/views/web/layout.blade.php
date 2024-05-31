<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('web.layouts.head')
</head>
<body>
    <header>
        @include('web.layouts.header')
    </header>

    <main>
{{--        @include('web.layouts.main')--}}
    </main>

    <footer>
        @include('web.layouts.footer')
    </footer>
</body>
</html>
