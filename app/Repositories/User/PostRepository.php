<?php

namespace App\Repositories\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Post;
use Image;

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
      return $this->post->published()->paginate();
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

        $post->image = $filename;
      }
      $post->save();

      $post->tags()->sync($request->tags, false);

      });
    }

    public function update($id, Request $request)
    {
          DB::transaction(function () use ($id, $request) {
             $post = $this->find($id);
             $post->slug = $request->slug;
             $post->title = $request->title;
             $post->excerpt = $request->excerpt;
             $post->contents = $request->contents;
             $post->category_id = $request->category_id;
             $post->user_id = $request->user();

             if ($request->hasFile('image')) {
              $image = $request->file('image');
              $filename = time(). '.' . $image->getClientOriginalExtension();
              $location = public_path('uploads/post_photo/' . $filename);
              Image::make($image)->resize(800, 400)->save($location);
      
              $post->image = $filename;
            }

            $post->save();

            if (isset($request->tags)) {
              $post->tags()->sync($request->tags);
          } else {
              $post->tags()->sync(array());
          }
          });
    }

    public function publish($id)
    {
          $this->post->published = $post;
          $post->save();          
    }

    public function drafts()
    {
        $postsQuery = $this->post->unpublished();
        // if (Gate::denies('see-all-drafts')) {
        //   $postsQuery = $postsQuery->where('user_id', Auth::user()->id);
        // }
        // $posts = $postsQuery->paginate();
    }

         public function delete($id)
      {
          $this->post->delete($id);
      }

      public  function withTrashed()
      {
          return $this->post->onlyTrashed()->get();
      }

      public function forceDelete($id)
      {
          $post = $this->post->withTrashed()->where('id', $id)->first();

          $post->forceDelete();          
      }

      public function restore($id)
      {
        $post = $this->post->withTrashed()->where('id', $id)->first();

        $post->restore();
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