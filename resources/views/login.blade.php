<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.web_title') }}</title>

    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Poppins'>
    <link rel="stylesheet" href="{{ asset('css/foundation.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/foundation.js') }}"></script>
    <script src='https://code.iconify.design/2/2.0.4/iconify.min.js'></script>
</head>

<body class="antialiased">
    @include('_layout/header')
    <div class="page-backdrop grid-x">
        <div class="cell large-auto">
            <div class="login-container">
                <form action="/" method="POST">
                    @csrf
                    <div class="auth-header">Log In</div>
                    <input name="id" type="text" placeholder="Phone number / Email">
                    <input name="password" type="password" placeholder="Password">
                    <a href="forgotpassword/">Forgot Password</a>
                    <button>Log In</button>
                    <a href="{{ route('register', ['registerAs' => 'member']) }}">Register Now</a>
                    @if ($errors->any())
                        <div class="error-message-box">
                            <span>{{ $errors->first() }}</span>
                        </div>
                    @endif
                </form>
            </div>
        </div>
        <div class="login-banner cell large-auto show-for-large">
            <div>Ease</div>
            <div>Tagline for Ease</div>
        </div>
    </div>
</body>

</html>
