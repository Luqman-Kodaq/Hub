<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['site_name', 'address', 'contact_us', 'contact_number', 'contact_email', 'about_us', 'our_services'];
}
