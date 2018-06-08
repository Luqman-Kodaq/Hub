<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissionStoreRequest;
use App\Http\Requests\PermissionUpdateRequest;
use App\Repositories\User\PermissionRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PermissionController extends Controller
{

    private $permission;

    public function __construct(
        PermissionRepositoryInterface $permissionRepository
    )
    {
        $this->permission = $permissionRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.permissions.index')
            ->with('permissions', $this->permission->all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PermissionStoreRequest $request)
    {
        $this->permission->store($request);

        $redirect_to = $request->has('redirect') ? redirect()->route('permission.index') : back();

        return $redirect_to
                ->with('success', 'New permission added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $permission = $this->permission->find($request->id);

        return view('user.permissions.show')
            ->with('permission', $permission);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $permission = $this->permission->find($request->id);

        return view('user.permissions.edit')->with('permission', $permission);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PermissionUpdateRequest $request)
    {
        $this->permission->update($request->id, $request);

        $redirect_to = $request->has('redirect') ? redirect()->route('permission.index') : back();

        return $redirect_to
                        ->with('success', 'Permission updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $permission = $this->permission->find($request->id);

        $permission->delete();

        return back()
                ->with('success', 'Permission deleted successfully');
    }
}
