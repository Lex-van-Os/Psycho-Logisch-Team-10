<!DOCTYPE html>
<html class="dark" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!--Title neerzetten -->
    <title> {{$title ?? 'Psycho-logisch'}}</title>
    @vite('resources/css/app.css')
    @push('css')
        <link rel="stylesheet" href="/resources/css/layout-style.css">
    @endpush
</head>
<body class="bg-gray-700">
@include('Components.navbar')
@yield('content')
</body>
</html>
