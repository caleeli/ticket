@extends('layouts.ticket')

@section('content')
<div class="row justify-content-center">
    <div class="col-6">
        <div class="card">
            <img src="{{ $event->image['url'] }}" class="card-img-top" alt="{{ $event->name }}">
            <div class="card-body">
                <div>
                    <h5 class="card-title">{{ $event->name }}</h5>
                    <p class="card-text">
                        <i class="fas fa-calendar-day"></i>
                        {{ $event->start_at->format('Y-m-d H:i') }}
                        {{ $event->start_at->format('Y-m-d') == $event->end_at->format('Y-m-d') ?
                        $event->end_at->format('- H:i') : $event->end_at->format('- Y-m-d H:i') }}
                    </p>
                    <hr>
                    <p class="card-text">
                        Gracias por su reserva.
                        Sus recibos y entradas serán enviados a este correo electrónico:
                    </p>
                    <p>
                        <b><u>{{ $reserva->email }}</u></b>
                    </p>
                    <p>
                        <a href="{{ $event->url() }}">{{ $event->name }}</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection