<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<h1 class="text-3xl font-bold text-red-400 underline">
    @yield('judul')
</h1>

<header>
    @yield('header')
</header>

<main>
    @yield('main')
</main>

<footer>
    @yield('footer')
</footer>

</body>
</html>
