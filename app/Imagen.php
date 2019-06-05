<?php

namespace WhatToWear;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    protected $table = 'imagenes';

    public function conjunto()
    {
      return $this->belongsTo('App\Conjunto');
    }
    public function votos() //imagen_id
    {
      return $this->hasMany('App\Voto');
    }
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
