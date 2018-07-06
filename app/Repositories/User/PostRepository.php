<?php

namespace App\Repositories\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Post;
use Image;
use Auth;

class PostRepository implements PostRepositoryInterface
{
  protected $post;

  public function __construct(Post $post)
  {
      $this->post = $post;
  }

  public function getInstance()
  {
      return $this->post;
  }

    public function all()
    {
        return $this->post->all();
    }

    public function latest()
    {
        return $this->post->latest()->get();
    }

    public function store(Request $request)
  {
      $post = DB::transaction(function () use ($request) {
        $post = new $this->post();
        $post->slug = $request->slug;
        $post->title = $request->title;
        $post->excerpt = $request->excerpt;
        $post->contents = $request->contents;
        $post->category_id = $request->category_id;
        $post->user_id = Auth::user()->id;
        
        // Save the Image
       if ($request->hasFile('image')) {
        $image = $request->file('image');
        $filename = time(). '.' . $image->getClientOriginalExtension();
        $location = public_path('uploads/post_photo/' . $filename);
        Image::make($image)->resize(800, 400)->save($location);

      }
      $post->image = asset("uploads/post_photo/$filename");

      // return response()->json(asset("$location"), 201);

      $post->save();

      $post->tags()->sync($request->tags, false);

      });
    }

    public function update($id, Request $request)
    {
          DB::transaction(function () use ($id, $request) {
             $post = $this->find($id);
            //  $post->slug = $request->slug;
             $post->title = $request->title;
             $post->excerpt = $request->excerpt;
             $post->contents = $request->contents;
             $post->category_id = $request->category_id;

             if ($request->hasFile('image')) {
              $image = $request->file('image');
              $filename = time(). '.' . $image->getClientOriginalExtension();
              $location = public_path('uploads/post_photo/' . $filename);
              Image::make($image)->resize(800, 400)->save($location);
      
            $post->image = asset("uploads/post_photo/$filename");              
            }

            $post->save();

            if (isset($request->tags)) {
              $post->tags()->sync($request->tags);
          } else {
              $post->tags()->sync(array());
          }
          });
    }

        public function allPublished()
        {
            return $this->post->publish()->get();
        }

      public function published($id)
      {
        $post = $this->find($id);
        $post->published = true;
        $post->save();
      }

      public function temporaryDelete($id)
      {
          $this->post->delete($id);
      }

      public  function onlyTrashed()
      {
          return $this->post->onlyTrashed()->get();
      }

      public function forceDelete($id)
      {
           return $this->post->withTrashed()->find($id);
      }

      public function restore($id)
      {
       return $this->post->withTrashed()->find($id);
      }

      public function find($id)
      {
      return $this->post->findOrFail($id);
      }

    public function where($query)
      {
        return $this->post->where($query);
      }
}