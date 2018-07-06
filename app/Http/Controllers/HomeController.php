<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\User\SettingRepositoryInterface;

class HomeController extends Controller
{
    private $settings;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        SettingRepositoryInterface $settingRepository
    )
    {
        $this->middleware('auth');
        $this->setting = $settingRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home')
            ->with('settings', $this->setting->first());
    }
}
