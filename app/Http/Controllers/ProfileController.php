<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Profile\ProfileResource;
use App\Http\Resources\Profile\ProfileCollection;
use Carbon\Carbon;
use App\Profile;
use App\Setting;
use App\User;
use Auth;

class ProfileController extends Controller
{
         /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            return ProfileCollection::collection(Profile::first()->get());
    }

    public function update(Profile $profile, Request $r)
    {
           $r['about'] = $r->bio;
           unset($r['bio']);

           $profile->update($r->all());

            if($r->hasFile('profile_photo'))
            {
                Auth::user()->update([
                    'profile_photo' => $r->profile_photo->store('public/uploads/profile_photo')
                ]);
            }
            $profile->save();        
            return response(['data' => new ProfileResource($profile)], Response::HTTP_CREATED);
    }
}
