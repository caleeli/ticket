<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property Event $event
 */
class Entrada extends Model
{
    protected $guarded = [];
    protected $appends = [
        'reserved',
    ];

    public function getReservedAttribute()
    {
        return $this->reservas()->sum('quantity');
    }

    public function setReservedAttribute()
    {
    }

    public function url()
    {
        return url("ticket/{$this->event_id}/reserva/{$this->id}");
    }

    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function asistentes()
    {
        return $this->reservas()->sum('quantity');
    }

    public function disponibles()
    {
        return $this->available - $this->asistentes();
    }

    public function cleanReservations()
    {
        $this->reservas()->delete();
    }
}
