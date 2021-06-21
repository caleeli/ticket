<table style="width:80%;font-family: Inter, system-ui, -apple-system, Roboto, Ubuntu, Cantarell, sans-serif;">
    <tr>
        <td>
            <a href="{{ $event->url() }}">
                <img src="{{ $event->image['url'] }}" alt="{{ $event->name }}" style="width:100%">
            </a>
        </td>
    </tr>
    <tr>
        <td>
            <p>Hola,</p>
            <p>
                Gracias por reservar <b>{{ $reserva->quantity }}</b> ticket(s) para el evento
                <i>"{{ $event->name }}"</i>.
            </p>
            <p>Saludos,</p>
            <p><a href="{{ $event->url() }}">ticket.com.bo</p>
        </td>
    </tr>
</table>