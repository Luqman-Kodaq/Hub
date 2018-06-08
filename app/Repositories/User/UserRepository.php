<?php

namespace App\Repositories\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\User;
use Illuminate\Support\Facades\Hash;
use Image;

class UserRepository implements UserRepositoryInterface
{
  protected $user;

  public function __construct(User $user)
  {
      $this->user = $user;
  }

  public function getInstance()
  {
      return $this->user;
  }

 public function all()
  {
      return $this->user->all();
  }

  public function allActive()
  {
    return $this->user->ofStatusActive()->get();
  }

  public function store(Request $request)
  {
    DB::transaction(function () use ($request) {
      $user = new $this->user();
      $user->name = $request->name;
      $user->email = $request->email;
      $user->password = Hash::make($request->password);

      // Save the Image
      if ($request->hasFile('profile_photo')) {
        $image = $request->file('profile_photo');
        $filename = time(). '.' . $image->getClientOriginalExtension();
        $location = public_path('uploads/profile_photo/' . $filename);
        Image::make($image)->resize(150, 150)->save($location);

        $user->profile_photo = $filename;
      }
      $user->save();

    });
  }

  public function update($id, Request $request)
  {
    DB::transaction(function () use ($id, $request) {
      $user = $this->find($id);
      $user->name = $request->name;
      $user->email = $request->email;
      $user->password = Hash::make($request->password);
      $user->save();
    });
  }

  public function delete($id)
  {
    $this->user->destroy($id);
  }

  public function find($id)
  {
      return $this->user->findOrFail($id);
  }
}
