<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title> {{$title ?? 'Psycho-logisch'}}</title>
    @vite('resources/css/app.css')
    <style>
        /* width */
        ::-webkit-scrollbar {
            width: 10px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: #888;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }
    </style>
</head>
<body class="dark:bg-gray-700 bg-gray-100">
@extends('/Components/navbar')
@section('layout')
    <p>Hello!</p>
@endsection
<div class="relative h-14 w-full dark:bg-gray-800 bg-gray-100">
</div>
{{$slot}}
</body>
</html>
