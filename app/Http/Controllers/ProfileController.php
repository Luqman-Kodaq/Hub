<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
    public function index($slug)
    {
        $user = User::where('slug', $slug)->first();
       return view('user.profiles.profile')
                ->with('user', $user)
                ->with('settings', Setting::first());
    }

    public function edit()
    {
        return view('user.profiles.edit')
                ->with('info',  Auth::user()->profile)
                ->with('settings', Setting::first());        
    }

    public function update(ProfileUpdateRequest $r)
    {
        Auth::user()->profile()->update([
            'about' => $r->about,            
            'facebook' => $r->facebook,
            'twitter' => $r->twitter,
            'instagram' => $r->instagram
        ]);

        if($r->hasFile('profile_photo'))
        {
            Auth::user()->update([
                'profile_photo' => $r->profile_photo->store('public/uploads/profile_photo')
            ]);
        }
        
        $redirect_to = $r->has('redirect') ? redirect()->route('profile.index', ['slug' => Auth::user()->slug ]) : back();

        return $redirect_to
                ->with('success', 'Profile updated successfully');
    }
}
