<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @vite (['resources/css/app.scss', 'resources/js/app.js'])

</head>
<body oncopy="return false;" onselectstart="return false;" class="bg-dark text-white">

    @include('layouts.navigation')

    @yield('content')
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
