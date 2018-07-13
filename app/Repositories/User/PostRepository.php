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

    public function paginate()
    {
        return $this->post->paginate(1);
    }

    public function latest()
    {
        return $this->post->latest()->get();
    }

    public function with($post)
    {
        return $this->post->with($post);
    }

    public function store(Request $request)
  {
    //   $post = DB::transaction(function () use ($request) {
        

    //   });
    }

    public function update($id, Request $request)
    {
        //   DB::transaction(function () use ($id, $request) {
            
        //   });
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