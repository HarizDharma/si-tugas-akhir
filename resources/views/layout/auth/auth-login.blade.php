<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>@yield('title')</title>
{{--    tambah sweetalert kesini--}}
</head>
<body>

<header>
    @yield('header')
</header>

<main>
    @include('sweetalert::alert')
    @yield('main')
</main>

<footer>
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('footer')
</footer>

</body>
</html>
