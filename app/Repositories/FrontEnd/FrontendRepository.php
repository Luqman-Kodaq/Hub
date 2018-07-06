<?php

namespace App\Repositories\FrontEnd;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Post;
use Auth;

class FrontendRepository implements FrontendRepositoryInterface
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
        $posts = $this->post->all();
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