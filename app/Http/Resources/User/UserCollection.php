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
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'status' => $this->admin ? 'Admin' : 'User',
            'gender' => $this->gender ? 'Male' : 'Female',
            'posts' => $this->posts->count(),
            'slug' => $this->slug,
            'profile' => $this->profile,
            'profile_photo' => $this->profile_photo,
            'created_at' => (string)$this->created_at->format('d/m/Y'),
        ];
    }
}
