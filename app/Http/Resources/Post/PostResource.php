<?php

namespace App\Http\Resources\Post;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'slug' => $this->slug,
            'image' => $this->image,
            'title' => $this->title,
            'excerpt' => $this->excerpt,
            'contents' => $this->contents,
            'like' => $this->like,
            'dislike' => $this->dislike,
            'user_id' => $this->user_id,
            'category' => $this->category_id,
            'tag' => $this->tags
        ];
    }
}
