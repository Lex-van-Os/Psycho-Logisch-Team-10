@extends('Components.layout')
@section('content')
<head>
    @vite('resources/js/profile/userProfile.js')
</head>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>

        <div class="user-summaries flex">
            @foreach ($summaries as $summary)
                @include('Components.profile-summary-card')
            @endforeach
        </div>
    </div>
    <button onclick="window.location.href='/'">
        <h1 class="focus:outline-none px-4 bg-gray-900 p-3 ml-3 rounded-lg text-white hover:bg-gray-800 text-primary-500  mb-8 text-4xl font-extrabold tracking-tight lg:text-4xlxl dark:text-white text-gray-900">
            Begin met je reflectie
        </h1>
    </button>
</div>
@endsection
