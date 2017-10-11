<?php

namespace App;

use Illuminate\Notifications\Notifiable;
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

    public function user_request(){
        return $this->hasMany('App\UserRequest');
    }

    public function announcement(){
        return $this->hasMany('App\Announcement');
    }

    public function missing(){
        return $this->hasMany('App\UserMissing');
    }

    public function blotter(){
        return $this->hasMany('App\UserBlotter');
    }
}
