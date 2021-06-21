@extends('layouts.ticket')

@section('content')
<div class="row justify-content-center">
    <div class="col-6">
        <div class="card">
            <img src="{{ $event->image['url'] }}" class="card-img-top" alt="{{ $event->name }}">
            <div class="card-body">
                <div class="row">
                    <form method="post" class="w-100 p-3">
                        <h5 class="card-title">{{ $event->name }}</h5>
                        <p class="card-text">
                            <i class="fas fa-calendar-day"></i>
                            {{ $event->start_at->format('Y-m-d H:i') }}
                            {{ $event->start_at->format('Y-m-d') == $event->end_at->format('Y-m-d') ?
                            $event->end_at->format('- H:i') : $event->end_at->format('- Y-m-d H:i') }}
                        </p>
                        <p class="card-text">
                        <h2>{{ $entrada->name }}</h2>
                        <dl>
                            <dt>Precio</dt>
                            <dd>{{ $entrada->price }}</dd>
                            <dt>Cantidad Entradas</dt>
                            <dd><input id="cantidad" name="requested" value="0" type="number" min="1"
                                    max="{{ $entrada->available }}" onchange="updatePrice(this.value)">
                            </dd>
                            <dt>Correo electrónico</dt>
                            <dd>
                                <input name="email" required type="email" class="w-50">
                            </dd>
                        </dl>
                        </p>
                        <div class="text-right">
                            <b id="totalPrice"></b>
                            <button class="btn btn-primary">Siguiente</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
function updatePrice(cantidad) {
    var value = @json($entrada->price);
    var total = Math.round(cantidad * value);
    var totalStr = (total).toLocaleString('es-BO', {
        style: 'currency',
        currency: 'BOB',
    });

    window.document.getElementById('totalPrice').innerHTML = "Total: " + (totalStr);
}
</script>
@endsection