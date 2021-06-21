@extends('layouts.ticket')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12 col-md-6">
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
                                <a href="{{ $entrada->url() }}" class="w-100 btn btn-primary">
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
    </div>
@endsection
