<?php

namespace WhatToWear;

use Illuminate\Database\Eloquent\Model;

class Conjunto extends Model
{
    public function user()
    {
      $this->belongsTo(User::class);
    }
    public function imagenes() //imagen_id
    {
      return $this->hasMany(Imagen::class);
    }
}
