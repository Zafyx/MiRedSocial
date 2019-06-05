<?php

namespace WhatToWear;

use Illuminate\Database\Eloquent\Model;

class Voto extends Model
{
    protected $table = 'votos';

    public function imagen()
    {
      return $this->belongsTo('App\Imagen');
    }
}
