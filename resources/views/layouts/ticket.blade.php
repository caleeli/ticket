<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $event->name }}</title>

    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <style>
        html,
        body {
            margin: 0px;
            padding: 0px;
            overflow-x: hidden;
        }

        .card-img-top {
        }

        .jdd-avatar-circle {
            width: 1em;
            height: 1em;
            display: inline-block;
            border-radius: 50%;
            background: white;
            overflow: hidden;
            position: relative;
        }

        .jdd-avatar-circle .jdd-avatar-circle-image {
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0px;
            left: 0px;
        }
    </style>

    <meta property="og:url" content='{{ url("ticket/{$event->id}") }}' />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="{{ $event->name }}" />
    <meta property="og:description" content="{{ $event->description }}" />
    <meta property="og:image" content="{{ $event->image['url'] }}" />

</head>

<body>
    <!-- Load Facebook SDK for JavaScript -->
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous"
        src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v10.0&appId=751646398900722&autoLogAppEvents=1"
        nonce="mMpbBIKX"></script>

    <!-- As a heading -->
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">{{ $event->user->name }}</span>
            <form class="d-flex">
                <span class="jdd-avatar-circle" style="font-size: 3em;">
                    <img src="{{ $event->user->avatar['url'] }}" class="jdd-avatar-circle-image">
                </span>
            </form>
        </div>
    </nav>

    @yield('content')

</body>

</html>