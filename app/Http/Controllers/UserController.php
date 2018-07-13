<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Repositories\User\UserRepositoryInterface;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\User\UserResource;
use App\Http\Resources\User\UserCollection;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserController extends Controller
{
    private $user;

    public function __construct(
        UserRepositoryInterface $userRepository
    )
    {
       $this->user = $userRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return UserCollection::collection($this->user->all());
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->gender = $request->gender;
        $user->password = Hash::make($request->password);
    
        // Save the Image
            if ($request->hasFile('profile_photo')) {
            $image = $request->file('profile_photo');
            $filename = time(). '.' . $image->getClientOriginalExtension();
            $location = public_path('uploads/profile_photo/' . $filename);
            Image::make($image)->resize(70, 70)->save($location);
    
            $user->profile_photo = asset("uploads/profile_photo/$filename");
            }
            
            if ($request->roles) {
            $user->syncRoles(explode(',', $request->roles));
            }
    
            $user->save();
            return response(['data' => new UserResource($user)], Response::HTTP_CREATED);
    }

    public function makeAdmin(Request $request)
    {
        $user = $this->user->admin($request->id);
    }

    public function notAdmin(Request $request)
    {
        $user = $this->user->notAdmin($request->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = $this->user->find($id);
        return new UserResource($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
      $user = User::find($id);
      $user->name = $request->name;
      $user->email = $request->email;
      $user->password = Hash::make($request->password);

       // Save the Image
       if($request->hasFile('profile_photo'))
       {
           Auth::user()->update([
               'profile_photo' => $request->profile_photo->store('public/uploads/profile_photo')
           ]);
       }

       if ($request->roles) {
        $user->syncRoles(explode(',', $request->roles));
      }

       $user->save();
       return response(['data' => new UserResource($user)], Response::HTTP_CREATED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = $this->user->find($id);

        $user->delete();

        return response('Data Removed Successfully', Response::HTTP_NO_CONTENT);
    }
}
