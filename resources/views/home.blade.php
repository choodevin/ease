<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.web_title') }}</title>

    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Poppins'>
    <link rel="stylesheet" href="{{ asset('css/foundation.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.js') }}"></script>
    <script src="{{ asset('js/foundation.js') }}"></script>
    <script src="{{ asset('js/auth.js') }}"></script>
    <script src='https://code.iconify.design/2/2.0.4/iconify.min.js'></script>
</head>

<body class="antialiased">
    @include('_layout/header')
    <div class="overall-container">
        @include('_layout/sidebar')
        <div class="content-container">
            @if ($homeData != null)
                @foreach ($homeData as $item)
                    <div class="item-container">
                        <img class="item-image" src="{{ asset('res/food1.jpg') }}">
                        <div class="item-title">{{ $item->title }}</div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</body>

</html>
