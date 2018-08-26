<?php

namespace App\Http\Resources\Post;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Tag\TagResource;

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
            'id' => $this->id,
            'slug' => $this->slug,
            'image' => $this->image,
            'title' => $this->title,
            'excerpt' => $this->excerpt,
            'contents' => $this->contents,
            'like' => $this->like,
            'dislike' => $this->dislike,
            'user_id' => $this->user,
            'category' => $this->category->name,
            'tag' => $this->whenPivotLoaded('post_tag', function() {
                return $this->pivot->name;
            }),
            'created_at' => (string)$this->created_at
        ];
    }
}
