<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissionStoreRequest;
use App\Http\Requests\PermissionUpdateRequest;
use App\Repositories\User\PermissionRepositoryInterface;
use App\Http\Resources\Permission\PermissionResource;
use App\Http\Resources\Permission\PermissionCollection;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Permission;

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
       return PermissionCollection::collection($this->permission->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PermissionStoreRequest $request)
    {
        // if ($request->permission_type == 'basic') {
            $permission = new Permission();
            $permission->name = str_slug($request->name);
            $permission->display_name = $request->display_name;
            $permission->description = $request->description;
            $permission->save();
            return response(['data' => new PermissionResource($permission)], Response::HTTP_CREATED);
        //   } elseif ($request->permission_type == 'crud') {
        //     $crud = explode(',', $request->crud_selected);
        //     if (count($crud) > 0) {
        //       foreach ($crud as $x) {
        //         $name = strtolower($x) . '-' . strtolower($request->resource);
        //         $display_name = ucwords($x . " " . $request->resource);
        //         $description = "Allows a user to " . strtoupper($x) . ' a ' . ucwords($request->resource);
    
        //         $permission = new Permission();
        //         $permission->name = $name;
        //         $permission->display_name = $display_name;
        //         $permission->description = $description;
        //         $permission->save();
        //         return response(['data' => new PermissionResource($permission)], Response::HTTP_CREATED);
        //       }
        //   }
        //   }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $permission = $this->permission->find($id);

        return new PermissionResource($permission);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PermissionUpdateRequest $request, $id)
    {
        $permission = Permission::find($id);
        $permission->display_name = $request->display_name;
        $permission->description = $request->description;
        $permission->save();

        return response(['data' => new PermissionResource($permission)], response::HTTP_CREATED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permission = $this->permission->find($id);

        $permission->delete();

        return response(null, response::HTTP_NO_CONTENT);
    }
}
