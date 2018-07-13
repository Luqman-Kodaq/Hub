<?php

namespace App\Repositories\User;

use Illuminate\Http\Request;

interface PostRepositoryInterface
{
  public function getInstance();

  public function all();

  public function paginate();

  public function latest();

  public function store(Request $request);

  public function update($id, Request $request); 

  public function published($id);

  public function allPublished();

  public function where($query);

  public function temporaryDelete($id);

  public function onlyTrashed();

  public function forceDelete($id);

  public function restore($id);

  public function with($post);

  public function find($id);
}
