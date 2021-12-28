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
    <script src="{{ asset('js/jquery-ui.js') }}"></script>
    <script src="{{ asset('js/foundation.js') }}"></script>
    <script src="{{ asset('js/auth.js') }}"></script>
    <script src='https://code.iconify.design/2/2.0.4/iconify.min.js'></script>
</head>

<body class="antialiased">
    @include('_layout/header')
    <div class="page-backdrop grid-x">
        <div class="cell large-auto">
            <div class="register-overall-container">
                <?php if (isset($_GET['registerAs']) && $_GET['registerAs'] == "member") { ?>
                <form action="/register" method="POST">
                    @csrf
                    <div class="register-container-1">
                        <div class="auth-header">Register <span>as member</span></div>
                        <input name="name" type="text" placeholder="Full Name">
                        <input name="email" type="email" placeholder="Email">
                        <input name="tel" type="tel" placeholder="Phone Number">
                        <input name="password" type="password" placeholder="Password">
                        <input name="cfmPassword" type="password" placeholder="Confirm Password">
                        <input name="referralCode" type="text" placeholder="Referral Code">
                        <a href="{{ route('register', ['registerAs' => 'vendor']) }}">Register as Vendor</a>
                        <button name="member">Register</button>
                        <a href="/">Log In</a>
                        @if ($errors->any())
                            <div class="error-message-box">
                                <span class="iconify" data-icon="mdi:close-circle"></span>
                                <span>{{ $errors->first() }}</span>
                            </div>
                        @endif
                    </div>
                </form>
                <?php } ?>

                <?php if (isset($_GET['registerAs']) && $_GET['registerAs'] == "vendor") { ?>
                <form action="/register" method="POST">
                    @csrf
                    <div id="register-container-1" class="register-container-1">
                        <div class="auth-header">Register <span>as vendor</span></div>
                        <input name="name" type="text" placeholder="Full Name/Company Name">
                        <input name="email" type="email" placeholder="Email">
                        <input name="tel" type="tel" placeholder="Phone Number">
                        <input name="password" type="password" placeholder="Password">
                        <input name="cfmPassword" type="password" placeholder="Confirm Password">
                        <input name="referralCode" type="text" placeholder="Referral Code">
                        <a href="{{ route('register', ['registerAs' => 'member']) }}">Register as Member</a>
                        <button id="btn-register-container-1">Next</button>
                        <a href="/">Log In</a>
                        @if ($errors->any())
                            <div class="error-message-box">
                                <span class="iconify" data-icon="mdi:close-circle"></span>
                                <span>{{ $errors->first() }}</span>
                            </div>
                        @endif
                    </div>

                    <div id="register-container-2" class="register-container-2">
                        <div class="auth-header">Register <span>as vendor</span></div>
                        <input name="address" type="text" placeholder="Company Address">
                        <input name="category" type="text" placeholder="Category">
                        <div class="button-row">
                            <button id="btn-register-container-2" class="secondary-button">Back</button>
                            <button name="vendor">Register</button>
                        </div>
                        <div>
                            <a href="/">Log In</a>
                        </div>
                    </div>

                </form>
                <?php } ?>
            </div>
        </div>
        <div class="login-banner cell large-auto show-for-large">
            <div>Ease</div>
            <div>Tagline for Ease</div>
        </div>
    </div>
    <div class="invi-foot"></div>
</body>

</html>
