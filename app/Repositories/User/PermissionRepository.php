<?php

namespace App\Repositories\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Permission;

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

    public function store(Request $request){}

        public function update($id, Request $request){}

        public function delete($id)
        {
          $this->permission->destroy($id);
        }

        public function find($id)
        {
            return $this->permission->findOrFail($id);
        }
    }