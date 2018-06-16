<?php

namespace App\Repositories\User;

use Illuminate\Http\Request;

interface ProfileRepositoryInterface
{
  public function getInstance();

  public function all();

  public function update($id, Request $request); 

  public function find($id);

  public function where($query);
}