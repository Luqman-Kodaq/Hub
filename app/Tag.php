<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /**
     * The attributes that are hidden assignable.
     *
     * @var array
     */
    protected $hidden = [
        'id', 'created_at', 'updated_at', 'pivot'
    ];

    public function posts()
    {
    	return $this->belongsToMany('App\Post');
    }
}
