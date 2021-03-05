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
    <link rel="stylesheet" href="{{ URL::asset('css/homestyles.css') }}">
</head>
<body>
<div style="background: #141414; position: fixed; bottom: 0; z-index: 1; max-width: 100% " class="container w-100 pt-1 pb-3">
    <div class="row">
        <div class="col-3">
            <div class="row h-100">
                <div class="col-4  mt-3 song_art">
                    <img src="/storage/Album_Art/2XTEmbbYusQ1qYJtm5zipudXiNJksOK6NYV8vykD.png" class="playing_art" id="track_image">
                </div>
                <div class="col-8">
                    <div class="song_details">
                        <a id="title" href="#">Narcos</a>
                        <div class="w-100 h-100 d-flex">
                            <a id="artist" href="#">Migos</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-6">

            <!---- middle part --->
            <div class="middle d-flex align-items-center justify-content-center w-100">
                <button onclick="shuffle()" id="shuffle"><i class="fa fa-random"></i></button>
                <button onclick="previous_song()" id="pre"><i class="fa fa-step-backward" aria-hidden="true"></i></button>
                <button onclick="justplay()" id="play"><i class="fa fa-play" aria-hidden="true"></i></button>
                <button onclick="next_song()" id="next"><i class="fa fa-step-forward" aria-hidden="true"></i></button>
                <button onclick="next_song()" id="repeat"><i class="fa fa-repeat"></i></button>
            </div>

            <!--- song duration part --->
            <div class="duration w-100 mt-5">
                <input type="range" min="0" max="100" value="0" id="duration_slider" onchange="change_duration()">
            </div>
        </div>
        <div class="col-3">
            <button id="auto" class="auto mt-3 mr-3 p-1 ml-5" onclick="autoplay_switch()">Auto play</button>
            <div class="volume">
                <p id="volume_show">100</p>
                <i class="fa fa-volume-up" aria-hidden="true" onclick="mute_sound()" id="volume_icon"></i>
                <input type="range" min="0" max="100" value="100" onchange="volume_change()" id="volume">
            </div>
        </div>
    </div>
</div>

<div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div style="background-color: black;"  id="sidebar-wrapper">
        <div class="sidebar-heading">
            <small class="text-muted">
                <a style="font-size: 25px; text-align: left; letter-spacing: 2px; font-family: Verdana; background: -webkit-linear-gradient(#00d0ff, #25ffbf); -webkit-background-clip: text; -webkit-text-fill-color: transparent;" class="navbar-brand " href="{{ url('/') }}">
                    Bambika <br>Music
                </a>
            </small>
        </div>
        <div class="list-group list-group-flush">
            <a href="#"  class="list-group-item list-group-item-action white_icons_text"><span class="fa fa-home"> &nbsp; Home</span></a>
            <a href="#" class="list-group-item list-group-item-action white_icons_text"><span class="fa fa-search"> &nbsp; Search</span></a>
            <a href="#" class="list-group-item list-group-item-action white_icons_text"><span class="fa fa-book"> &nbsp; Your Library</span></a>


            <a href="#" class="list-group-item list-group-item-action white_icons_text"><span class="fa fa-bars"> &nbsp; Create Playlist</span></a>
            <a href="#" class="list-group-item list-group-item-action white_icons_text"><span class="fa fa-heart"> &nbsp; Liked Music</span></a>
            <a href="#" class="list-group-item list-group-item-action white_icons_text"><span class="fa fa-fire"> &nbsp; Trending</span></a>
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
        <div class="align-content-center container-fluid">
        <!--    <div class="recents">
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
                    <img style="width: 100%; margin: 0; padding: 0;" src="/storage/Album_Art/2XTEmbbYusQ1qYJtm5zipudXiNJksOK6NYV8vykD.png">
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
            -->
            <div class="Trending">
                <div style="max-width: 100%;" class="container">
                    <div class="row">
                        <div class="col-10">
                            <h3 style="text-align: left;" class="mt-4">Trending Music</h3>
                        </div>
                        <div class="pt-4 col-2 pr-4 text-right">
                            <a style="color: lightgray;" href="#">See all</a>
                        </div>
                    </div>
                </div>

                @foreach($songs as $song)
                    <a href="/song/{{$song->id}}">
                    <div class="card m-1 music_card">
                        <div class="card-body music_card_body">
                            <div style="max-width: 100%;" class="img_container">
                                <img style="max-width: 100%;" src="/storage/{{$song->album_art}}">
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

<!-- /#wrapper -->

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="{{ URL::asset('js/script.js') }}"></script>
<script>
</script>
</body>
</html>
