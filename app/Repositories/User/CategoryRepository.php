<?php

namespace App\Repositories\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Category;
use Illuminate\Support\Facades\Hash;

class CategoryRepository implements CategoryRepositoryInterface
{
    private $category;

    public function __construct(Category $category)
    {
          $this->category = $category;
    }

    public function getInstance()
    {
        return $this->category;
    }

    public function all()
    {
        return $this->category->orderBy('created_at', 'desc')->paginate(5);
    }

    public function store(Request $request){}

    public function update($id, Request $request){}

    public function delete($id)
    {
        $this->category->destroy($id);
    }

    public function find($id)
    {
        return $this->category->findOrFail($id);
    }
}