<?php

namespace WhatToWear;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    protected $table = 'imagenes';

    public function conjunto()
    {
      return $this->belongsTo(Conjunto::class);
    }
    public function votos() //imagen_id
    {
      return $this->hasMany(Voto::class);
    }
}
