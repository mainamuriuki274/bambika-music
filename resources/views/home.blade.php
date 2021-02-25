<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Bambika Music') }}</title>

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        list-style: none;
        text-decoration: none;
        font-family: arial
    }

    body {
        background: #f3f5f9
    }

    .wrapper {
        position: relative
    }

    .sidebar {
        position: fixed;
        width: 17%;
        height: 100%;
        background: #000000e0;
        padding: 20px 0;
        background-color: #000000;
    }

    .text-muted {
        color: #adb5bd !important
    }

    ul {
        padding-bottom: 20px
    }

    ul li a img {
        background: #66BB6A;
        top: 0;
        border: none;
        width: 20px
    }

    .sidebar ul li {
        padding: 15px
    }

    .sidebar ul li a {
        color: #fff;
        display: block
    }

    .sidebar ul li a .fas {
        width: 30px;
        color: #bdb8d7 !important
    }

    i.fas.fa-home:hover,
    i.fas.fa-file-invoice:hover,
    i.fas.fa-video:hover,
    i.fas.fa-id-badge:hover,
    i.fas.fa-external-link-alt:hover,
    i.fas.fa-code:hover,
    i.far.fa-calendar-alt:hover,
    i.far.fa-credit-card:hover {
        color: #304FFE !important
    }

    .sidebar ul li a .far {
        width: 30px;
        color: #bdb8d7 !important
    }

    .sidebar ul li:hover {
        background: #000
    }

    .sidebar ul li a:hover {
        text-decoration: none
    }
</style>
</head>
<body>
<div class="wrapper d-flex">
    <div style="" class="sidebar"> <small class="text-muted pl-3"><a style="font-size: 25px; text-align: center; letter-spacing: 2px; font-family: Verdana; background: -webkit-linear-gradient(#00d0ff, #25ffbf); -webkit-background-clip: text; -webkit-text-fill-color: transparent;" class="navbar-brand " href="{{ url('/') }}">
                Bambika Music
            </a></small>
        <ul>
            <li><a href="#"><i class="fas fa-home"></i>Home</a></li>
            <li><a href="#"><i class="far fa-credit-card"></i>Search</a></li>
            <li><a href="#"><i class="fas fa-file-invoice"></i>Your Library</a></li>
        </ul>
        <small class="text-muted px-3">PLAYLISTS</small>
        <ul>
            <li><a href="#"><i class="far fa-calendar-alt"></i>Create Playlist</a></li>
            <li><a href="#"><i class="fas fa-video"></i>Liked Music</a></li>
            <li><a href="#"><i class="fas fa-id-badge"></i>New Music</a></li>
            <li><a href="#"><i class="fas fa-id-badge"></i>Trending Music</a></li>
            <li><a href="#"><i class="fas fa-id-badge"></i>Subscriptions</a></li>

        </ul>
        <small class="text-muted px-3">
            <a class="dropdown-item" style="font-size: 20px;" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>

        </small>
        <ul></ul>
        <small class="text-muted px-3">Bambika Music   &copy;  <script>
                var CurrentYear = new Date().getFullYear()
                document.write(CurrentYear)
            </script></small>
    </div>
</div>
<nav style="width: 83%;float: right; background-color: #000000;" class="navbar">
    <div class="container">
        <ul class="navbar-nav mr-auto">

        </ul>

        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto">
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link grad" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link grad" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item">
                        <a style="font-family: Helvetica Neue, sans-serif; color: white;" id="navbarDropdown" class="nav-link dropdown-toggle " href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Hello, {{ Auth::user()->name }}
                        </a>
                    </li>
                @endguest
            </ul>
        </div>
</nav>
<hr>
</body>
</html>
