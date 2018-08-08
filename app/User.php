<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use LaratrustUserTrait, Notifiable;

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
        return $this->hasMany('App\Post');
    }

    // public function getAvatarPathAttribute()
    // {
    //     return asset('public/uploads/profile_photo/male.png');
    // }

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

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
