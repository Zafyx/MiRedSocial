<?php

namespace WhatToWear;

use Illuminate\Database\Eloquent\Model;

class Seguidor extends Model
{
    protected $table = 'seguidores';

    public function users() //seguido_id
    {
      return $this->belongsTo('App\User')->withTimestamps();
    }
}
