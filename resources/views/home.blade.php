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
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<style>
    #wrapper {
        overflow-x: hidden;
    }

    #sidebar-wrapper {
        min-height: 100vh;
        margin-left: -15rem;
        -webkit-transition: margin .25s ease-out;
        -moz-transition: margin .25s ease-out;
        -o-transition: margin .25s ease-out;
        transition: margin .25s ease-out;

    }

    #sidebar-wrapper .sidebar-heading {
        padding: 0.875rem 1.25rem;
        font-size: 1.2rem;
    }

    #sidebar-wrapper .list-group {
        width: 15rem;
    }

    #page-content-wrapper {
        min-width: 100vw;
    }

    #wrapper.toggled #sidebar-wrapper {
        margin-left: 0;
    }
    .white_icons_text{
        background: transparent;
        color: darkgray;
    }
    .music_card{
        background-color: #202326;
        display:inline-block;
        width: 200px;
        margin-left: 10px;
        margin-right: 10px;
    }
    .music_card:hover{
        background-color: #282d30;
    }

    .music_card_body{
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    .music_player{
        position: fixed;
        bottom: 0;
        width: 100%;
        height: 100px;
        background-color: #202020;
        z-index: 1;
    }
    a:active{
        background: darkgray;
        color: lightgray;
    }
    @media (min-width: 768px) {
        #sidebar-wrapper {
            margin-left: 0;
        }

        #page-content-wrapper {
            min-width: 0;
            width: 100%;
        }

        #wrapper.toggled #sidebar-wrapper {
            margin-left: -15rem;
        }
        .img_container .play_button{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            background: transparent;
            color: white;
            font-size: 40px;
            padding: 12px 24px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            text-align: center;
        }
        .play_button{
            display: none;
        }
        .music_card:hover .play_button {
            display: block;
        }

    }
</style>
</head>
<body>
<div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div style="background-color: black;"  id="sidebar-wrapper">
        <div class="sidebar-heading">
            <small class="text-muted">
                <a style="font-size: 25px; text-align: center; letter-spacing: 2px; font-family: Verdana; background: -webkit-linear-gradient(#00d0ff, #25ffbf); -webkit-background-clip: text; -webkit-text-fill-color: transparent;" class="navbar-brand " href="{{ url('/') }}">
                    Bambika Music
                </a>
            </small>
        </div>
        <div class="list-group list-group-flush">
            <a href="#"  class="list-group-item list-group-item-action white_icons_text"><span class="fa fa-home"> &nbsp; Home</span></a>
            <a href="#" class="list-group-item list-group-item-action white_icons_text"><span class="fa fa-search"> &nbsp; Search</span></a>
            <a href="#" class="list-group-item list-group-item-action white_icons_text"><span class="fa fa-book"> &nbsp; Your Library</span></a>


            <a href="#" class="list-group-item list-group-item-action white_icons_text"><span class="fa fa-bars"> &nbsp; Create Playlist</span></a>
            <a href="#" class="list-group-item list-group-item-action white_icons_text"><span class="fa fa-heart"> &nbsp; Liked Music</span></a>
            <a href="#" class="list-group-item list-group-item-action white_icons_text"><span class="fa fa-fire"> &nbsp; Trending Music</span></a>
            <div style="text-align: center;position: fixed;bottom: 0;">
                <small class="text-muted px-3">Bambika Music   &copy;
                    <script>
                        var CurrentYear = new Date().getFullYear()
                        document.write(CurrentYear)
                    </script>
                </small>
            </div>
        </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div style="background: #141414; color: lightgray;" id="page-content-wrapper">

        <nav style="background: transparent" class="navbar navbar-expand-lg">
            <button class="btn white_icons_text" id="menu-toggle"><i class="fa fa-bars"></i> Menu</button>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                    <li class="nav-item dropdown">
                        <a  class="nav-link dropdown-toggle white_icons_text" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Hello, {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <hr style="background-color: lightgray;">
        <div class="music_player">
            <div class="container d-flex">
                <img style="height: 100px; float: left;" class="p-3" src="/storage/Album_Art/culture.png">

            </div>
        </div>
        <div class="align-content-center container-fluid">
            <div class="recents">
                <h3 class="mt-4">Recent Plays</h3>
            <div class="card music_card">
                <div class="card-body music_card_body">
                    <img style="width: 100%; margin: 0; padding: 0;" src="/storage/Album_Art/culture.png">
                    <h6 style="color: white;" class="pt-3">Walk It Talk It </h6>
                    <h7 style="color: lightgray;">Artist: <a style="color: lightgray;" href="#">Migos</a></h7><br>
                    <h7 style="color: lightgray;">Album: <a style="color: lightgray;" href="#">Culture</a></h7>
                </div>
            </div>

            <div class="card music_card">
                <div class="card-body music_card_body">
                    <img style="width: 100%; margin: 0; padding: 0;" src="/storage/Album_Art/culture.png">
                    <h6 style="color: white;" class="pt-3">Walk It Talk It </h6>
                    <h7 style="color: lightgray;">Artist: <a style="color: lightgray;" href="#">Migos</a></h7><br>
                    <h7 style="color: lightgray;">Album: <a style="color: lightgray;" href="#">Culture</a></h7>
                </div>
            </div>


            <div class="card music_card">
                <div class="card-body music_card_body">
                    <img style="width: 100%; margin: 0; padding: 0;" src="/storage/Album_Art/culture.png">
                    <h6 style="color: white;" class="pt-3">Walk It Talk It </h6>
                    <h7 style="color: lightgray;">Artist: <a style="color: lightgray;" href="#">Migos</a></h7><br>
                    <h7 style="color: lightgray;">Album: <a style="color: lightgray;" href="#">Culture</a></h7>
                </div>
            </div>

            <div class="card music_card">
                <div class="card-body music_card_body">
                    <img style="width: 100%; margin: 0; padding: 0;" src="/storage/Album_Art/drive.png">
                    <h6 style="color: white;" class="pt-3">Hard drive</h6>
                    <h7 style="color: lightgray;">Artist: <a style="color: lightgray;" href="#">Shenseea</a></h7><br>
                    <h7 style="color: lightgray;">Album: <a style="color: lightgray;" href="#">Hard drive</a></h7>
                </div>
            </div>

            <div class="card music_card">
                <div class="card-body music_card_body">
                    <img style="width: 100%; margin: 0; padding: 0;" src="/storage/Album_Art/cover.jpg">
                    <h6 style="color: white;" class="pt-3">Red bone</h6>
                    <h7 style="color: lightgray;">Artist: <a style="color: lightgray;" href="#">Childish Gambino</a></h7><br>
                    <h7 style="color: lightgray;">Album: <a style="color: lightgray;" href="#">Red bone</a></h7>
                </div>
            </div>
            </div>
            <div class="Trending">
                <h3 class="mt-4">Trending Music</h3>
                <a style="float: right;color: lightgray;" class="pr-5" href="#">See all</a><br><br>
                @foreach($songs as $song)
                    <a href="/song/{{$song->id}}">
                    <div class="card music_card">
                        <div class="card-body music_card_body">
                            <div class="img_container container">
                                <img style="width: 100%; margin: 0; padding: 0;" src="/storage/{{$song->album_art}}">
                                <button class="play_button btn" id="menu-toggle"><i style="background: -webkit-linear-gradient(#00d0ff, #25ffbf); -webkit-background-clip: text; -webkit-text-fill-color: transparent;" class="fa fa-play"></i></button>
                            </div>
                            <h6 style="color: white;" class="pt-3">{{$song->song_name}}</h6>
                            <h7 style="color: lightgray;">Artist: <a style="color: lightgray;" href="/song/{{$song->artist}}">{{$song->artist}}</a></h7><br>
                            <h7 style="color: lightgray;">Album: <a style="color: lightgray;" href="#/song/{{$song->album_name}}">{{$song->album_name}}</a></h7>
                        </div>
                    </div>
                    </a>
                @endforeach

                </div>
            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Menu Toggle Script -->
<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>
</body>
</html>
