<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Bambika Music</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <!-- Styles -->
        <style>
            .pulse-button {
                position: relative;
                border: none;
                box-shadow: 0 0 0 0 #25ffbf;
                background-color: #00d0ff;
                background-image: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/173024/jonathanlarradet_copy.png);
                background-size:cover;
                background-repeat: no-repeat;
                cursor: pointer;
                -webkit-animation: pulse 1.25s infinite cubic-bezier(0.66, 0, 0, 1);
                -moz-animation: pulse 1.25s infinite cubic-bezier(0.66, 0, 0, 1);
                -ms-animation: pulse 1.25s infinite cubic-bezier(0.66, 0, 0, 1);
                animation: pulse 1.25s infinite cubic-bezier(0.66, 0, 0, 1);
            }
            .pulse-button:hover
            {
                -webkit-animation: none;-moz-animation: none;-ms-animation: none;animation: none;
            }

            @-webkit-keyframes pulse {to {box-shadow: 0 0 0 45px rgba(232, 76, 61, 0);}}
            @-moz-keyframes pulse {to {box-shadow: 0 0 0 45px rgba(232, 76, 61, 0);}}
            @-ms-keyframes pulse {to {box-shadow: 0 0 0 45px rgba(232, 76, 61, 0);}}
            @keyframes pulse {to {box-shadow: 0 0 0 45px rgba(232, 76, 61, 0);}}

            .btn-primary {
                border: solid;
                border-image-source: linear-gradient(45deg, #00d0ff, #25ffbf);
                border-image-slice: 1;
                background: -webkit-linear-gradient(#00d0ff, #25ffbf);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                text-align: center;
                font-family: Verdana;
                padding: 10px;
                font-size: 20px;
            }
            .btn-primary:hover{
                border: solid;
                border-image-source: linear-gradient(180deg, #00d0ff, #25ffbf);
                border-image-slice: 1;
                background: -webkit-linear-gradient(#00d0ff, #25ffbf);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                text-align: center;
                font-family: Verdana;
                padding: 12px;
                font-size: 20px;

            }

            html, body {
                margin: 0;
                padding: 0;
                width: 100%;
            }

            body {
                font-family: "Helvetica Neue",sans-serif;
                font-weight: lighter;
            }

            header {
                width: 100%;
                height: 100vh;
                background: url(http://127.0.0.1:8000/Images/bambika_background.png) no-repeat 50% 50%;
                background-size: cover;
            }
            .centered {
                position: absolute;
                top: 50%;
                left: 50%;
                width: 100%;
                text-align: center;
                transform: translate(-50%, -50%);

            }
            .content {
                width: 94%;
                margin: 4em auto;
                font-size: 20px;
                line-height: 30px;
                text-align: justify;
            }

            .logo {
                line-height: 60px;
                position: fixed;
                float: left;
                margin: 16px 46px;
                font-size: 35px;
                letter-spacing: 2px;
                font-family: Verdana;
                background: -webkit-linear-gradient(#00d0ff, #25ffbf);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
            }

            nav {
                position: fixed;
                width: 100%;
                line-height: 60px;
            }

            nav ul {
                line-height: 60px;
                list-style: none;
                background: rgba(0, 0, 0, 0);
                overflow: hidden;
                color: #fff;
                padding: 0;
                text-align: right;
                margin: 0;
                padding-right: 40px;
                transition: 1s;
            }

            nav.black ul {
                background: #000;
            }

            nav ul li {
                display: inline-block;
                padding: 16px 40px;;
            }

            nav ul li a {
                text-decoration: none;
                color: #fff;
                font-size: 16px;
            }

            .menu-icon {
                line-height: 60px;
                width: 100%;
                background: #000;
                text-align: right;
                box-sizing: border-box;
                padding: 15px 24px;
                cursor: pointer;
                color: #fff;
                display: none;
            }

            @media(max-width: 786px) {

                .logo {
                    position: fixed;
                    top: 0;
                    margin-top: 16px;
                }

                nav ul {
                    max-height: 0px;
                    background: #000;
                }

                nav.black ul {
                    background: #000;
                }

                .showing {
                    max-height: 34em;
                }

                nav ul li {
                    box-sizing: border-box;
                    width: 100%;
                    padding: 24px;
                    text-align: center;
                }

                .menu-icon {
                    display: block;
                }

            }
            .site-footer
            {
                background-color:#000000;
                padding:45px 0 20px;
                font-size:15px;
                line-height:24px;
                color:#737373;
            }
            .site-footer hr
            {
                border-top-color:#bbb;
                opacity:0.5
            }
            .site-footer hr.small
            {
                margin:20px 0
            }
            .site-footer h6
            {
                color:#fff;
                font-size:16px;
                text-transform:uppercase;
                margin-top:5px;
                letter-spacing:2px
            }
            .site-footer a
            {
                color:#737373;
            }
            .site-footer a:hover
            {
                color:#3366cc;
                text-decoration:none;
            }
            .footer-links
            {
                padding-left:0;
                list-style:none
            }
            .footer-links li
            {
                display:block
            }
            .footer-links a
            {
                color:#737373
            }
            .footer-links a:active,.footer-links a:focus,.footer-links a:hover
            {
                color:#3366cc;
                text-decoration:none;
            }
            .footer-links.inline li
            {
                display:inline-block
            }
            .site-footer .social-icons
            {
                text-align:right
            }
            .site-footer .social-icons a
            {
                width:40px;
                height:40px;
                line-height:40px;
                margin-left:6px;
                margin-right:0;
                border-radius:100%;
                background-color:#33353d
            }
            .copyright-text
            {
                margin:0
            }
            @media (max-width:991px)
            {
                .site-footer [class^=col-]
                {
                    margin-bottom:30px
                }
            }
            @media (max-width:767px)
            {
                .site-footer
                {
                    padding-bottom:0
                }
                .site-footer .copyright-text,.site-footer .social-icons
                {
                    text-align:center
                }
            }
            .social-icons
            {
                padding-left:0;
                margin-bottom:0;
                list-style:none
            }
            .social-icons li
            {
                display:inline-block;
                margin-bottom:4px
            }
            .social-icons li.title
            {
                margin-right:15px;
                text-transform:uppercase;
                color:#96a2b2;
                font-weight:700;
                font-size:13px
            }
            .social-icons a{
                background-color:#eceeef;
                color:#818a91;
                font-size:16px;
                display:inline-block;
                line-height:44px;
                width:44px;
                height:44px;
                text-align:center;
                margin-right:8px;
                border-radius:100%;
                -webkit-transition:all .2s linear;
                -o-transition:all .2s linear;
                transition:all .2s linear
            }
            .social-icons a:active,.social-icons a:focus,.social-icons a:hover
            {
                color:#fff;
                background-color:#29aafe
            }
            .social-icons.size-sm a
            {
                line-height:34px;
                height:34px;
                width:34px;
                font-size:14px
            }
            .social-icons a.facebook:hover
            {
                background-color:#3b5998
            }
            .social-icons a.twitter:hover
            {
                background-color:#00aced
            }
            .social-icons a.linkedin:hover
            {
                background-color:#007bb6
            }
            .social-icons a.dribbble:hover
            {
                background-color:#ea4c89
            }
            @media (max-width:767px)
            {
                .social-icons li.title
                {
                    display:block;
                    margin-right:0;
                    font-weight:600
                }
            }

        </style>

        <style>
            body {
                font-family: 'Nunito';
            }
        </style>
        <script>
            $(document).ready(function() {
                $(".menu-icon").on("click", function() {
                    $("nav ul").toggleClass("showing");
                });
            });

            // Scrolling Effect

            $(window).on("scroll", function() {
                if($(window).scrollTop()) {
                    $('nav').addClass('black');
                }

                else {
                    $('nav').removeClass('black');
                }
            })
        </script>
    </head>
    <body class="antialiased">
    <div class="wrapper">
        <header>
            <nav>
                <div class="menu-icon">
                    <i class="fa fa-bars fa-2x"></i>
                </div>
                <div class="logo">
                    <a href="/" class="text-sm text-gray-700 underline">Bambika Music</a>
                </div>
                <div class="menu">
                    <ul>
                        @if (Route::has('login'))
                                @auth
                                <li><a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Discover</a></li>
                                @else
                                <li><a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a></li>

                                    @if (Route::has('register'))
                                    <li><a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a></li>
                                    @endif
                                @endauth
                        @endif
                    </ul>
                </div>
            </nav>
        </header>
        <div class="centered pt-5">
            <h1 style="font-family: mountains;font-size:120px;color: darkgrey;">Give in to the Groove</h1>
            <h2 style="color: darkgrey;"><i><b>"One good thing about music, when it hits you, you feel no pain"</b></i> -Bob Marley</h2>
            @if (Route::has('register'))
                @auth
                    <a href="{{ url('/home') }}"><button class="btn btn-primary pulse-button">Discover</button></a>
                @else
                    <a href="{{ route('register') }}"><button class="btn btn-primary">Get Bambika Music for Free</button></a>
                @endauth
            @endif
        </div>
    </div>
    <footer class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <h6>About</h6>

                </div>

                <div class="col-xs-6 col-md-3">
                    <h6>Categories</h6>
                    <ul class="footer-links">
                    </ul>
                </div>

                <div class="col-xs-6 col-md-3">
                    <h6>Quick Links</h6>
                    <ul class="footer-links">
                    </ul>
                </div>
            </div>
            <hr>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-6 col-xs-12">
                    <p class="copyright-text">Copyright &copy; 2021 All Rights Reserved by
                        <a href="#">Bambika</a>.
                    </p>
                </div>

                <div class="col-md-4 col-sm-6 col-xs-12">
                    <ul class="social-icons">
                        <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a></li>
                        <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    </body>
</html>
