<?php

namespace WhatToWear;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function conjuntos() //conjunto_id
    {
      return $this->hasMany('App\Conjunto');
    }
    public function imagenes()
    {
      return $this->belongsToMany('App\Imagen');
    }
    public function users() //seguido_id
    {
      return $this->belongsToMany('User', 'seguidores', 'users_id_seguidor', 'users_id_seguido');
    }
    public function addFollower(User $user)
    {
        $this->seguidores()->attach($user->id);
    }
    public function removeFollower(User $user)
    {
        $this->seguidores()->detach($user->id);
    }
}
