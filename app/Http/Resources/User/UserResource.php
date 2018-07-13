<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'name' => $this->name,
            'email' => $this->email,
            'posts' => [
                'counts' => PostResource::collection($this->whenLoaded('posts')),
                'explore' => route('posts.index', $this->id),
            ],
            'profile' => route('profile.index', $this->id),
        ];
    }
}
