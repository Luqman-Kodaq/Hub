<?php

namespace App\Http\Controllers\Auth;

use App\Profile;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Repositories\User\SettingRepositoryInterface;

class RegisterController extends Controller
{
    private $settings;

    public function __construct(
        SettingRepositoryInterface $settingRepository
    )
    {
        $this->middleware('guest');
        $this->setting = $settingRepository;
    }

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'gender' => 'required|string'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        if($data['gender' == 'Male'])
        {
            $profile_photo = 'public/defaults/male.png';
        }else{
            $profile_photo = 'public/defaults/female.png';
        }
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'gender' => $data['gender'],
            'slug' => str_slug($data['name']),
            'profile_photo' => $profile_photo
        ]);

        Profile::create([
            'user_id' => $user->id
        ]);

        return $user;
    }

     /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('auth.register')
                ->with('settings', $this->setting->first());
    }
}
