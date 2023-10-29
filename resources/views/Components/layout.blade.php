<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title> {{$title ?? 'App name'}}</title>
    @vite('resources/css/app.css')
</head>
<body class="dark:bg-gray-700 bg-gray-100">
<div class="relative h-14 w-full dark:bg-gray-800 bg-gray-100">
</div>
{{$slot}}
</body>
</html>
