<?php

namespace App\Http\Resources\Tag;

use Illuminate\Http\Resources\Json\Resource;

class TagCollection extends Resource
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
            'name' => $this->name
        ];
    }
}
