<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingsUpdateRequest;
use App\Http\Resources\Settings\SettingResource;
use App\Http\Resources\Settings\SettingCollection;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Setting;

class SettingController extends Controller
{
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
    public function update(SettingsUpdateRequest $r, Setting $setting)
    {
        // $setting->update($r->all());

            $setting = Setting::first();
            $setting->update($r->all());

            $setting->save();

            return response(['data' => new SettingResource($setting)], response::HTTP_CREATED);
    }
}
