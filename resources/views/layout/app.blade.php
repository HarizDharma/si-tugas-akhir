<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>@yield('title')</title>
{{--    tambahkan sweetalert asset--}}
</head>
<body>
<h1 class="text-3xl font-bold text-red-400 underline">
    @yield('judul')
</h1>

<header>
    @yield('header')
</header>

<main>
    @include('sweetalert::alert')
    @yield('main')
</main>

<footer>

    @push('scripts')
        <script>
            $('#logout-button').click(function(e) {
                e.preventDefault();
                $.post("{{ route('logout') }}");
            });
        </script>
    @endpush

    <script src="{{ asset('js/app.js') }}"></script>

    @yield('footer')
</footer>

</body>
</html>
