<?php

namespace WhatToWear;

use Illuminate\Database\Eloquent\Model;

class Voto extends Model
{
    protected $table = 'likes';

    public function imagen()
    {
      $this->belongsTo(Imagen::class);
    }
}
