<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    {{-- @vite (['resources/css/app.scss', 'resources/js/app.js']) --}}
    <link rel="stylesheet" href="{{ asset('css/guest.css') }}">
</head>
<body oncopy="return false;" onselectstart="return false;" class="bg-dark text-white">


    @yield('content')

    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
