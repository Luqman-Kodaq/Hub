<?php

namespace App\Http\Resources\Profile;

use Illuminate\Http\Resources\Json\Resource;

class ProfileCollection extends Resource
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
            'author' => $this->user_id,
            'bio' => $this->about,
            'facebook' => $this->facebook,
            'twitter' => $this->twitter,
            'instagram' => $this->instagram
        ];
    }
}
