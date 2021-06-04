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
            max-height: 30vw;
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

    <div class="row justify-content-center">
        <div class="col-6">
            <div class="card">
                <img src="{{ $event->image['url'] }}" class="card-img-top" alt="{{ $event->name }}">
                <div class="card-body">
                    <div class="row">
                        <div class="col-9">
                            <h5 class="card-title">{{ $event->name }}</h5>
                            <p class="card-text">
                                <a><i class="fas fa-map-marker-alt"></i> {{ $event->place }}</a>
                            </p>
                            <p class="card-text">
                                <i class="fas fa-calendar-day"></i>
                                {{ $event->start_at->format('Y-m-d H:i') }}
                                {{ $event->start_at->format('Y-m-d') == $event->end_at->format('Y-m-d') ?
                                $event->end_at->format('- H:i') : $event->end_at->format('- Y-m-d H:i') }}
                            </p>
                            <p class="card-text">
                                <i class="fas fa-user"></i>
                                {{ $event->user->name }}
                            </p>
                            <p class="card-text">{{ $event->description }}</p>
                        </div>
                        <div class="col-3">
                            <div class="mb-2">
                                <div class="fb-share-button" data-href='{{ url("ticket/{$event->id}") }}'
                                    data-layout="button" data-size="large"><a target="_blank"
                                        href="https://www.facebook.com/sharer/sharer.php?u='{{ \urlencode(url("
                                        ticket/{$event->id}")) }}'&amp;src=sdkpreparse"
                                        class="fb-xfbml-parse-ignore">Compartir</a></div>
                            </div>
                            @foreach($event->entradas as $entrada)
                            <div>
                                <a href="#" class="w-100 btn btn-primary">
                                    <i class="fas fa-ticket-alt"></i>
                                    {{ $entrada->name }}
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>