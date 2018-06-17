<?php

namespace App\Repositories\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Setting;

class SettingRepository implements SettingRepositoryInterface
{
    protected $setting;

    public function __construct(Setting $setting)
    {
        $this->setting = $setting;
        // $this->setting->firstOrCreate(['id' => 1]);
    }

    public function getInstance()
    {
      return $this->setting;
    }

    public function update(Request $request)
    {
        DB::transaction(function () use ($request) {
            $setting = $this->first();
            $setting->site_name = $request->site_name;
            $setting->address = $request->address;
            $setting->contact_us = $request->contact_us;
            $setting->contact_email = $request->contact_email;
            $setting->about_us = $request->about_us;
            $setting->our_services = $request->our_services;

            $setting->save();
        });
    }

    public function find($id)
	{
		return $this->systemSettings->findOrFail($id);
	}

    public function first()
    {
        return $this->setting->first();
    }
}