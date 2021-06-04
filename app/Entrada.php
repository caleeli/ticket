<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
    protected $guarded = [];

    public function url()
    {
        return url("ticket/{$this->event_id}/reserva/{$this->id}");
    }

    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }

    public function asistentes()
    {
        return $this->reservas()->sum('quantity');
    }

    public function disponibles()
    {
        return $this->available - $this->asistentes();
    }
}
