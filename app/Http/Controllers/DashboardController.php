<?php

namespace App\Http\Controllers;

use App\Repositories\User\PermissionRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    private $user;
    private $permission;

    public function __construct(
        UserRepositoryInterface $userRepository,
        PermissionRepositoryInterface $permissionRepository
    )
    {
       $this->user = $userRepository;
       $this->permission = $permissionRepository;
    }
    
    public function dashboard()
    {
        return view('user.dashboard.index')
            ->with('users', $this->user->all())
            ->with('permissions', $this->permission->all());
    }
}
