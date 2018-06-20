<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\User\RoleRepositoryInterface;
use App\Repositories\User\SettingRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class UserController extends Controller
{
    private $user;
    private $role;
    private $setting;

    public function __construct(
        UserRepositoryInterface $userRepository,
        RoleRepositoryInterface $roleRepository,
        SettingRepositoryInterface $settingRepository
    )
    {
       $this->user = $userRepository;
       $this->role = $roleRepository;
       $this->setting = $settingRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.users.index')
                ->with('users', $this->user->all())
                ->with('settings', $this->setting->first());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.users.create')
                ->with('roles', $this->role->all())
                ->with('settings', $this->setting->first());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
        $this->user->store($request);

        $redirect_to = $request->has('redirect') ? redirect()->route('user.index') : back();

        return $redirect_to
            ->with('success', 'New user added succesfully');
    }

    public function makeAdmin(Request $request)
    {
        $user = $this->user->admin($request->id);

        return back()
                ->with('success', 'User made admin successfully');
    }

    public function notAdmin(Request $request)
    {
        $user = $this->user->notAdmin($request->id);

        return back()
                ->with('success', 'User removed from admin successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = $this->user->find($id);

        return view('user.users.show')
            ->with('user', $user)
            ->with('settings', $this->setting->first());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $user = $this->user->find($request->id);

        return view('user.users.edit')
            ->with('user', $user)
            ->with('roles', $this->role->all())
            ->with('settings', $this->setting->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request)
    {
        $this->user->update($request->id, $request);

        $redirect_to = $request->has('redirect') ? redirect()->route('user.index') : back();

        return $redirect_to
            ->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $user = $this->user->find($request->id);

        // $user->profile->delete();
        $user->delete();

        return back()
            ->with('success', 'User deleted successfully');
    }
}
