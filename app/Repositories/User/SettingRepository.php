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
    }

    public function getInstance()
    {
      return $this->setting;
    }

    public function all()
    {
        $setting = $this->setting->all();
    }

    public function update(Request $request)
    {
        // DB::transaction(function () use ($request) {
           
        // });
    }

    public function find($id)
	{
		return $this->setting->findOrFail($id);
	}

    public function first()
    {
        return $this->setting->first();
    }
}