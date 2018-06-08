<?php

namespace App\Repositories\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Permission;
use Illuminate\Support\Facades\Hash;

class PermissionRepository implements PermissionRepositoryInterface
{
    protected $permission;

    public function __construct(
          Permission  $permission
    )
    {
          $this->permission = $permission;
    }

    public function getInstance()
    {
          return $this->permission;
    }

    public function all()
    {
          return $this->permission->all();
    }

    public function store(Request $request) 
    {
      DB::transaction(function () use ($request) {
        if ($request->permission_type == 'basic') {
        $permission = new $this->permission();
        $permission->name = $request->name;
        $permission->display_name = $request->display_name;
        $permission->description = $request->description;
        $permission->save(); 
      } elseif ($request->permission_type == 'crud') {
        $crud = explode(',', $request->crud_selected);
        if (count($crud) > 0) {
          foreach ($crud as $x) {
            $name = strtolower($x) . '-' . strtolower($request->resource);
            $display_name = ucwords($x . " " . $request->resource);
            $description = "Allows a user to " . strtoupper($x) . ' a ' . ucwords($request->resource);

            $permission = new $this->permission();
            $permission->name = $name;
            $permission->display_name = $display_name;
            $permission->description = $description;
            $permission->save();
          }
      }
      }
      });
    }

        public function update($id, Request $request)
        {
          DB::transaction(function () use ($id, $request)
          {
            $permission = $this->find($id);
            $permission->display_name = $request->display_name;
            $permission->description = $request->description;
            $permission->save();
          });
        }

        public function delete($id)
        {
          $this->permission->destroy($id);
        }

          public function find($id)
          {
              return $this->permission->findOrFail($id);
          }
    }