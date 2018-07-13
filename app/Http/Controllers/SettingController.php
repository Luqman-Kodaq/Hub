<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingsUpdateRequest;
use App\Http\Resources\Settings\SettingResource;
use App\Http\Resources\Settings\SettingCollection;
use Symfony\Component\HttpFoundation\Response;
use App\Repositories\User\SettingRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Setting;

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
        return SettingCollection::collection(Setting::first()->get());      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(SettingsUpdateRequest $r)
    {
        $setting = Setting::first();
            $setting->site_name = $r->site_name;
            $setting->address = $r->address;
            $setting->contact_us = $r->contact_us;
            $setting->contact_email = $r->contact_email;
            $setting->about_us = $r->about_us;
            $setting->our_services = $r->our_services;

            $setting->save();

            return response(['data' => new SettingResource($setting)], response::HTTP_CREATED);
    }
}
