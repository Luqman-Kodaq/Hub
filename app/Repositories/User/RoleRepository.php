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

  public function store(Request $request){}

  public function update($id, Request $request){}

  public function delete($id)
  {
    $this->role->destroy($id);
  }

  public function find($id)
  {
      return $this->role->findOrFail($id);
  }
}