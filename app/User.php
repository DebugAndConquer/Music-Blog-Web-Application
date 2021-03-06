<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * Return the list of posts written by the user.
     */
    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    /**
     * Return the list of comments written by the user.
     */
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
    /**
     * Establishes a 1-1 relationship with the OneToOneModel just for the demonstration purposes
     */
    public function oneToOneModel() {
        return $this->belongsTo('App\OneToOneModel');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'api_token',
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
}
