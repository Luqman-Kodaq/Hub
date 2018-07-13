<?php

namespace App\Http\Resources\Settings;

use Illuminate\Http\Resources\Json\Resource;

class SettingCollection extends Resource
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
            'site_name' => $this->site_name,
            'contact_us' => $this->contact_us,
            'contact_email' => $this->contact_email,
            'about_us' => $this->about_us,
            'our_services' => $this->our_services
        ];
    }
}
