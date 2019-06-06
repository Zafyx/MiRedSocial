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
    //https://medium.com/innohub/create-user-following-system-with-laravel-5-4-5fc47828fb39
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function seguidores()
    {
        return $this->belongsToMany(User::class, 'seguidores', 'users_id_seguido', 'users_id_seguidor')->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function siguiendo()
    {
        return $this->belongsToMany(User::class, 'seguidores', 'users_id_seguidor', 'users_id_seguido')->withTimestamps();
    }

    // public function addFollower(User $user)
    // {
    //     $this->seguidores()->attach($user->id);
    // }
    // public function removeFollower(User $user)
    // {
    //     $this->seguidores()->detach($user->id);
    // }
}
