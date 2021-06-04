<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{$event->name}}</title>

    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <style>
        .card-img-top {
            max-height: 30vw;
        }
    </style>
</head>

<body>
    <!-- As a heading -->
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">{{ $event->user->name }}</span>
        </div>
    </nav>

    <div class="row justify-content-center">
        <div class="col-6">
            <div class="card">
                <img src="{{ $event->image['url'] }}" class="card-img-top" alt="{{ $event->name }}">
                <div class="card-body">
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
                    <a href="#" class="btn btn-primary">Reservar</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>