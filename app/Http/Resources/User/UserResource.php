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
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'admin' => $this->admin ? 'Admin' : 'User',
            'gender' => $this->gender ? 'Male' : 'Female',
            'posts' => $this->posts->count(),
            'profile' => $this->profile,
            'profile_photo' => $this->profile_photo
        ];
    }
}
