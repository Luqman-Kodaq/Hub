<?php

namespace App\Repositories\User;

class BaseRepository implements BaseRepositoryInterface
{
  public function getCurrentUser()
  {
    $this->middleware('auth');
  }
}
