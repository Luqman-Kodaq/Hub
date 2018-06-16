<?php

namespace App\Repositories\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Image;
use Auth;

class ProfileRepository implements ProfileRepositoryInterface
{
    protected $profile;

   public function getInstance()
    {
        return $this->profile;
    }

    public function update($id, Request $request)
    {
      DB::transaction(function () use ($id, $request) {
          $user = Auth::user();
          // Save the Image
          if ($request->hasFile('profile_photo')) 
          {
            $image = $request->file('profile_photo');
            $filename = time(). '.' . $image->getClientOriginalExtension();
            $location = public_path('uploads/profile_photo/' . $filename);
            Image::make($image)->resize(70, 70)->save($location);

            $user->profile_photo = $filename;
          }

          $user->name = $request->name;
          $user->email = $request->email;
          $user->profile->facebook = $request->facebook;
          $user->profile->twitter = $request->twitter;
          $user->profile->instagram = $request->instagram;
          $user->profile->about = $request->about;

          $user->save();
          $user->profile->save();

      });
    }

    public function find($id)
    {
        return $this->profile->findOrFail($id);
    }

    public function where($query)
      {
        return $this->post->where($query);
      }
}