<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleStoreRequest;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\RoleUpdateRequest;
use App\Repositories\User\RoleRepositoryInterface;
use App\Repositories\User\PermissionRepositoryInterface;
use App\Http\Resources\Role\RoleResource;
use App\Http\Resources\Role\RoleCollection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use App\Role;

class RoleController extends Controller
{
    private $role;
    private $permission;

    public function __construct(
            RoleRepositoryInterface $roleRepository,
            PermissionRepositoryInterface $permissionRepository
    )
    {
        $this->role = $roleRepository;
        $this->permission = $permissionRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return RoleCollection::collection($this->role->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleStoreRequest $request)
    {
        $role = new Role();
        $role->display_name = $request->display_name;
        $role->name = $request->name;
        $role->description = $request->description;
        $role->save();

       return response(['data' => new RoleResource($role)], Response::HTTP_CREATED);
        if ($request->permissions){
          $role->syncPermissions($request->permissions);
        }
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

        return new RoleResource($role);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoleUpdateRequest $request, $id)
    {
        $role = Role::find($id);
        $role->display_name = $request->display_name;
        $role->description = $request->description;
        $role->save();

       return response(['data' => new RoleResource($role)], Response::HTTP_CREATED);
        if ($request->permissions) {
            $role->syncPermissions($request->permissions);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
            $role = $this->role->find($id);

            $role->delete();

            return response(null, response::HTTP_NO_CONTENT);
    }
}
