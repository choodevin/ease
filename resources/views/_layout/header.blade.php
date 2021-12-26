@php
$routeName = Route::currentRouteName();
$loggedIn = Session::has('current_user');
@endphp
<div class="header">
    <div class="logo"><a href="{{ url('/') }}">Ease</a></div>
    <div class="search-box">
        <input type="text">
        <a class="icon-button"><span class="iconify" data-icon="mdi-light:magnify"></span></a>
    </div>
    <div class="nav">
        <a class='@if ($routeName == 'home') selected-header-item @endif' href="{{ url('/home') }}">Home</a>

        @if (!$loggedIn)<a class='@if ($routeName == 'login') selected-header-item @endif' href="{{ url('/') }} ">Login</a>@endif

        @if ($loggedIn)
            <a class='@if ($routeName == 'profile') selected-header-item @endif' href="{{ url('/profile') }}">Profile</a>
            <a class='@if ($routeName == 'panel') selected-header-item @endif' href="{{ url('/panel') }}">Panel</a>
            <a href="{{ url('/logout') }}">Logout</a>
        @endif
    </div>
</div>
