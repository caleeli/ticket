<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{config('app.name')}}</title>

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
                font-family: 'Logo', 'Nunito', sans-serif;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            @font-face {
                font-family: 'Logo';
                src: url(/fonts/logo.ttf?3b59d44a3d364049ab07ea32f0ab31b0) format("truetype");
            }
            @keyframes banner {
                from {
                    width: 100px;
                }

                to {
                    width: 300px;
                }
            }
            div {
                animation-duration: 0.1s;
                animation-name: changewidth;
                animation-iteration-count: infinite;
                animation-direction: alternate;
            }
        </style>
        <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/css/font-awesome.min.css" rel="stylesheet">
        <link href="assets/css/owl.carousel.css" type="text/css" rel="stylesheet">
        <link href="assets/css/owl.theme.css" type="text/css" rel="stylesheet">
        <link href="assets/css/style.min.css" rel="stylesheet">
    </head>
    <body>
        <div id="page" class="site" class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">{{__('Home')}}</a>
                    @else
                        <a href="{{ route('login') }}">{{__('Login')}}</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">{{__('Register')}}</a>
                        @endif
                    @endauth
                </div>
            @endif

            @include('components.slider')

            <div class="content container">
                <div class="title m-b-md">
                    {{config('app.name')}}
                </div>
                <div class="row">
                    <div class="col">
                    @include('components.articles')
                    </div>
                </div>
            </div>
        </div>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="assets/plugins/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/plugins/imagesloaded.pkgd.min.js"></script>
        <script src="assets/plugins/owl.carousel.min.js"></script>
        <script src="assets/plugins/masonry.pkgd.min.js"></script>
        <script src="assets/js/navigation.js"></script>
        <script src="assets/js/skip-link-focus-fix.js"></script>
        <script src="assets/js/script.min.js"></script>
    </body>
</html>
