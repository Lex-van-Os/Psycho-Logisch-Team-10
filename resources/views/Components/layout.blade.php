<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title> {{$title ?? 'App name'}}</title>
    @vite('resources/css/app.css')
</head>
<body>
<div class="relative h-32 w-32 bg-purple-950">
    <div class="absolute inset-x-0 top-0 h-16">02</div>
</div>
{{$slot}}
</body>
</html>
