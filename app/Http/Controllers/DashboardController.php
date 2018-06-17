<?php

namespace App\Http\Controllers;

use App\Repositories\User\RoleRepositoryInterface;
use App\Repositories\User\PostRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\User\SettingRepositoryInterface;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    private $user;
    private $role;
    private $post;
    private $setting;

    public function __construct(
        UserRepositoryInterface $userRepository,
        RoleRepositoryInterface $roleRepository,
        PostRepositoryInterface $postRepository,
        SettingRepositoryInterface $settingRepository
    )
    {
       $this->user = $userRepository;
       $this->role = $roleRepository;
       $this->post = $postRepository;
       $this->setting = $settingRepository;
    }
    
    public function dashboard()
    {
        return view('user.dashboard.index')
            ->with('users', $this->user->all())
            ->with('roles', $this->role->all())
            ->with('posts', $this->post->all())
            ->with('settings', $this->setting->first());
    }
}
