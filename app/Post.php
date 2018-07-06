<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    protected $post_photo = './uploads/post_photo/';

    protected $fillable = ['user_id', 'slug', 'title', 'excerpt', 'contents', 'category_id'];

    protected $dates = ['deleted_at'];

    public function getPhotoAttribute()
    {
        return $this->post_photo . $image;
    }

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
        return $this->belongsTo('App\Comment');
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