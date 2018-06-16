<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Profile;
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
                ->with('user', $user);
    }

    public function edit()
    {
        $user = Auth::user();
        return view('user.profiles.edit')
                ->with('user',  $user->profile);        
    }
}
