<?php

namespace App\Repositories\User;

use Illuminate\Http\Request;

interface PostRepositoryInterface
{
  public function getInstance();

  public function all();

  public function store(Request $request);

  public function update($id, Request $request); 

  public function drafts();

  public function publish($id);

  public function where($query);

  public function delete($id);

  public function withTrashed();

  public function forceDelete($id);

  public function restore($id);

  public function find($id);
}
