<?php

namespace App\Http\Controllers;

use App\Repositories\User\RoleRepositoryInterface;
use App\Repositories\User\PostRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    private $user;
    private $role;
    private $post;

    public function __construct(
        UserRepositoryInterface $userRepository,
        RoleRepositoryInterface $roleRepository,
        PostRepositoryInterface $postRepository
    )
    {
       $this->user = $userRepository;
       $this->role = $roleRepository;
       $this->post = $postRepository;
    }
    
    public function dashboard()
    {
        return view('user.dashboard.index')
            ->with('users', $this->user->all())
            ->with('roles', $this->role->all())
            ->with('posts', $this->post->all());
    }
}
