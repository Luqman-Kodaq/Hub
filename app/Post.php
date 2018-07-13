<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    protected $fillable = ['user_id', 'slug', 'title', 'excerpt', 'contents', 'category_id'];

    protected $dates = ['deleted_at'];

    // public function getFeaturedAttribute($image)
    // {
    //     return asset($image);
    // }

    public function tags()
    {
    	return $this->belongsToMany('App\Tag', 'post_tag');
    }
    
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment', 'post_id', 'id');
    }

    public function scopePublish($query)
    {
        return $query->where('published', true);
    }

    public function scopeUnpublish($query)
    {
        return $query->where('published', false);
    }
}