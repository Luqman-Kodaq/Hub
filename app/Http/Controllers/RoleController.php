<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleStoreRequest;
use App\Http\Requests\RoleUpdateRequest;
use App\Repositories\User\RoleRepositoryInterface;
use App\Repositories\User\PermissionRepositoryInterface;
use App\Repositories\User\SettingRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    private $role;
    private $permission;
    private $setting;

    public function __construct(
            RoleRepositoryInterface $roleRepository,
            PermissionRepositoryInterface $permissionRepository,
            SettingRepositoryInterface $settingRepository
    )
    {
        $this->role = $roleRepository;
        $this->permission = $permissionRepository;
        $this->setting = $settingRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            return view('user.roles.index')
                ->with('roles', $this->role->all())
                ->with('settings', $this->setting->first());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            return view('user.roles.create')
                        ->with('permissions', $this->permission->all())
                        ->with('settings', $this->setting->first());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleStoreRequest $request)
    {
            $this->role->store($request);

            $redirect_to = $request->has('redirect') ? redirect()->route('role.index') : back();

            return $redirect_to
                    ->with('success', 'New role added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = $this->role->find($id);

        return view('user.roles.show')
                ->with('role', $role)
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
            $role = $this->role->find($request->id);

            return view('user.roles.edit')
                    ->with('role', $role)
                    ->with('permissions', $this->permission->all())
                    ->with('settings', $this->setting->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoleUpdateRequest $request)
    {
            $this->role->update($request->id, $request);

            $redirect_to = $request->has('redirect') ? redirect()->route('role.index') : back();

            return $redirect_to
                ->with('success', 'Role updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
            $role = $this->role->find($request->id);

            $role->delete();

            return back()
                    ->with('success', 'Role deleted successfully');
    }
}
