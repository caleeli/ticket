<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $guarded = [];
    protected $casts = [
        'image' => 'array',
        'start_at' => 'datetime:Y-m-d H:i',
        'end_at' => 'datetime:Y-m-d H:i',
    ];

    public function entradas()
    {
        return $this->hasMany(Entrada::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function url()
    {
        return url("ticket/{$this->id}");
    }

    public function asistentes()
    {
        return 0;
    }
}
