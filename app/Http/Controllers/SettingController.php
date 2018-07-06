<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingsUpdateRequest;
use App\Repositories\User\SettingRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class SettingController extends Controller
{

    private $setting;

    public function __construct(
        SettingRepositoryInterface $settingRepository
    )
    {
        $this->setting = $settingRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting = $this->setting->first();
        return response()->json($setting);
    }

    public function edit()
    {
        return view('user.settings.setting')
        	->with('settings', $this->setting->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(SettingsUpdateRequest $request)
    {
        $this->setting->update($request);

        $redirect_to = $request->has('redirect') ? redirect()->route('setting.edit') : back();

        return $redirect_to
            ->with('success', 'Settings updated successfully');
    }
}
