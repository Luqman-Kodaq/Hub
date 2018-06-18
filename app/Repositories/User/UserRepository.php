<?php

namespace App\Repositories\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\User;
use Illuminate\Support\Facades\Hash;
use Image;
use Auth;

class UserRepository implements UserRepositoryInterface
{
  protected $user;

  public function __construct
  (
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
      return $this->user->paginate(8);
  }

  public function allActive()
  {
    return $this->user->ofStatusActive()->get();
  }

  public function admin($id)
  {
      $user = $this->find($id);
      $user->admin = 1;
      $user->save();
  }

  public function notAdmin($id)
  {
      $user = $this->find($id);
      $user->admin = 0;
      $user->save();
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
          Image::make($image)->resize(70, 70)->save($location);
  
          $user->profile_photo = $filename;
        }
      
      $user->save();

      if ($request->roles) {
        $user->syncRoles(explode(',', $request->roles));
      }

    });
  }

  public function update($id, Request $request)
  {
    DB::transaction(function () use ($id, $request) {
      $user = $this->find($id);
      $user->name = $request->name;
      $user->email = $request->email;
      $user->password = Hash::make($request->password);

       // Save the Image
       if ($request->hasFile('profile_photo')) {
        $image = $request->file('profile_photo');
        $filename = time(). '.' . $image->getClientOriginalExtension();
        $location = public_path('uploads/profile_photo/' . $filename);
        Image::make($image)->resize(70, 70)->save($location);

        $user->profile_photo = $filename;
      }

      $user->save();

      if ($request->roles) {
        $user->syncRoles(explode(',', $request->roles));
      }
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

  public function where($query)
      {
        return $this->user->where($query);
      }
}
