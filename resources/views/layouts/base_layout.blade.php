<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Potters Craft | @yield('title')</title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <style>
        body{
            background-color: #f1f1f1;
        }
    </style>
    @livewireStyles
</head>
<body>
    @if(\Illuminate\Support\Facades\Auth::user()->role == "admin")
        @include('partials.topbar_inc')
    @else
        @include("partials.topbar_user_inc")
    @endif

    <div class="mt-2">
        @yield('content')
    </div>

    @livewireScripts
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>
