<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\Resource;

class UserCollection extends Resource
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
            'name' => $this->name,
            'email' => $this->email,
            'posts' => [
                'counts' => $this->posts->count(),
                'explore' => route('posts.index', $this->id),
            ],
            'profile' => route('profile.index', $this->id),
        ];
    }
}
