<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRegisterRequest;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use App\User;

class AuthController extends Controller
{
    public function register(UserRegisterRequest $request)
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
        $user->save();

        $http = new Client;

        $response = $http->post(url('oauth/token'), [
            'form_params' => [
                'grant_type' => 'password',
                'client_id' => '6',
                'client_secret' => 'FFgKSlV47xK6ixEa5G7tL84NYEsAVSolBeEN1Iqx',
                'username' => $request->email,
                'password' => $request->password,
                'scope' => '',
            ],
        ]);

        return response(['data' => json_decode((string) $response->getBody(), true)]);
    }

    public function login()
    {

    }
}
