<?php

namespace App\Repositories\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Tag;
use Illuminate\Support\Facades\Hash;

class TagRepository implements TagRepositoryInterface
{
    protected $tag;

    public function __construct(Tag $tag)
    {
          $this->tag = $tag;
    }

    public function getInstance()
    {
        return $this->tag;
    }

    public function all()
    {
        return $this->tag->all();
    }

    public function store(Request $request){}

    public function update($id, Request $request){}

    public function delete($id)
  {
    $this->tag->destroy($id);
  }

  public function find($id)
  {
      return $this->tag->findOrFail($id);
  }
}