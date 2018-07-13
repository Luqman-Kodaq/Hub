<?php

namespace App\Http\Resources\Post;

use Illuminate\Http\Resources\Json\Resource;

class PostCollection extends Resource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'title' => $this->title,
            'excerpt' => $this->excerpt,
            'image' => $this->image,
            'explore' => [
                'links' => route('posts.show', $this->id),
            ],
        ];
    }
}
