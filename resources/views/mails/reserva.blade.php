<table>
    <tr>
        <td>
            <a href="{{ $event->url() }}"><img src="{{ $event->image['url'] }}" alt="{{ $event->name }}"></a>
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