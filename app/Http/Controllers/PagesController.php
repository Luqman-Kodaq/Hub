<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\User\SettingRepositoryInterface;

class PagesController extends Controller
{
    private $settings;

    public function __construct(
        SettingRepositoryInterface $settingRepository
    )
    {
        $this->setting = $settingRepository;
    }

    public function welcome()
    {
        return view('welcome')
        ->with('settings', $this->setting->first());
    }
}
