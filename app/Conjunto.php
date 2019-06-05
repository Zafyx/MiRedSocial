<?php
// https://fernando-gaitan.com.ar/laravel-5-parte-4-modelos-y-relaciones/
namespace WhatToWear;

use Illuminate\Database\Eloquent\Model;

class Conjunto extends Model
{
    public function user()
    {
      return $this->belongsTo('App\User');
    }
    public function imagenes() //imagen_id
    {
      return $this->hasMany('App\Imagen');
    }
}
