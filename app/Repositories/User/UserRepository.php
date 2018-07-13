<?php

namespace App\Repositories\User;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\User\UserResource;
use App\Http\Resources\User\UserCollection;
use App\User;
use Illuminate\Support\Facades\Hash;
use Image;
use Auth;

class UserRepository implements UserRepositoryInterface
{
  protected $user;

  public function __construct(
        User $user
  )
  {
      $this->user = $user;
  }

  public function getInstance()
  {
      return 
      $this->user;
  }

 public function all()
  {
      return $this->user->all();
  }

  public function admin($id)
  {
      $user = $this->find($id);
      $user->admin = true;
      if ($user->save()) {
        return new UserResource($user);
      }
  }

  public function notAdmin($id)
  {
      $user = $this->find($id);
      $user->admin = false;
      if ($user->save()) {
        return new UserResource($user);
      }
  }

  public function store(Request $request){}

  public function update($id, Request $request){}

  public function delete($id)
  {
    $this->user->destroy($id);
  }

  public function find($id)
  {
      return $this->user->findOrFail($id);
  }

  public function where($query)
      {
        return $this->user->where($query);
      }
}
