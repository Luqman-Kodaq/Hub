<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Controller;
use App\User;
use Tymon\JWTAuth\Facades\JWTAuth;
use Auth;

class AuthController extends Controller
{

    public function register(RegisterRequest $request)
    {
        if($request->gender)
        {
            $profile_photo = 'public/defaults/male.png';
        }else{
            $profile_photo = 'public/defaults/female.png';
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->gender = $request->gender;
        $user->slug = str_slug($request->name);
        $user->profile_photo = $profile_photo;
        $user->remember_token = str_random(60);
        $user->admin = 0;
        $user->save();
                
        return response()->json(['data' => $user], Response::HTTP_CREATED);
    }

      public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password', 'remember_token');

        if($token=JWTAuth::attempt($credentials)) {
            $response = [
                'token' => $token,
                'credentials' => Auth::user(),
            ];

                return response()->json(['data' =>$response], Response::HTTP_CREATED);
        } else {
            return response()->json(['error' => "Not Authenticated"], Response::HTTP_UNAUTHORIZED);
        }
    }
}
