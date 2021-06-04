<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $guarded = [];
    protected $casts = [
        'image' => 'array',
    ];

    public function entradas()
    {
        return $this->hasMany(Entrada::class);
    }
}
