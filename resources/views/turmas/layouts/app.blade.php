<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title-cjt-curso1')@yield('title-index')</title>

</head>
<body>


    {{-- INDEX --}}
    @yield('content')
    @yield('label-teste')

    {{-- CONJUNTO DE CURSOS --}}
    @yield('body-cjt-curso1')

    @stack('script')

</body>
</html>
