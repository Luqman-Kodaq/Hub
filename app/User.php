<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use HasApiTokens, LaratrustUserTrait, Notifiable;

    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'gender', 'slug', 'profile_photo',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'api_token', 'remember_token',
    ];

    public function posts()
    {
        return $this->hasMany('App\Post', 'user_id');
    }

    public function comments()
    {
        return $this->hasManyThrough('App\Comment', 'App\Post', 'user_id', 'post_id');
    }

    public function profile()
    {
        return $this->hasOne('App\Profile');
    }

    public function scopeOfStatusActive($query)
    {
        return $query->where('active', true);
    }
}
