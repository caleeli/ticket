<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property \App\Entrada $entrada
 */
class Reserva extends Model
{
    protected $guarded = [];

    public function entrada()
    {
        return $this->belongsTo(Entrada::class);
    }
}
