@php
$routeName = Route::currentRouteName();
$loggedAs = Session::get('current_user');
@endphp
<div class="sidebar">
    @if ($routeName == 'home')
        <a class="@if ($routeName == 'home') selected-sidebar-item  @endif">Trending</a>
        <a>Shop<span class="iconify" data-icon="mdi:chevron-down"></a>
        <a>Individual<span class="iconify" data-icon="mdi:chevron-down"></a>
        <a>Category<span class="iconify" data-icon="mdi:chevron-down"></a>
        <a>Location<span class="iconify" data-icon="mdi:chevron-down"></a>
    @endif
    @if ($routeName == 'panel')
        @if ($loggedAs->type == 'vendor')
            <a>Dashboard</a>
            <a>Profile</a>
            <a>Posts</a>
            <a>Products</a>
            <a>Booster</a>
            <a>Favourites</a>
        @endif
        @if ($loggedAs->type == 'member')
            <a>Profile</a>
            <a>Posts</a>
            <a>Shared Posts</a>
            <a>Favourites</a>
            <a>Booster</a>
        @endif
    @endif
</div>
