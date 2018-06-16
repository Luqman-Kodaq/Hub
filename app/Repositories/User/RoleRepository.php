<?php

namespace App\Repositories\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Role;
use Illuminate\Support\Facades\Hash;

class RoleRepository implements RoleRepositoryInterface
{
  protected $role;

  public function __construct(
          Role $role
  )
  {
          $this->role = $role;
  }

  public function getInstance()
  {
        return $this->role;
  }

  public function all()
  {
        return $this->role->all();
  }

  public function store(Request $request)
  {
    DB::transaction(function () use ($request) {
            $role = new $this->role();
            $role->display_name = $request->display_name;
            $role->name = $request->name;
            $role->description = $request->description;
            $role->save();

            if ($request->permissions){
              $role->syncPermissions($request->permissions);
            }
        });
  }

  public function update($id, Request $request)
  {
    DB::transaction(function () use ($id, $request) {
            $role = $this->find($id);
            $role->display_name = $request->display_name;
            $role->description = $request->description;
            $role->save();

            if ($request->permissions) {
                $role->syncPermissions($request->permissions);
            }
    });
  }

  public function delete($id)
  {
    $this->role->destroy($id);
  }

  public function find($id)
  {
      return $this->role->findOrFail($id);
  }
}