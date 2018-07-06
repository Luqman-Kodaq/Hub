<?php

namespace App\Repositories\FrontEnd;

use Illuminate\Http\Request;

interface FrontendRepositoryInterface
{
  public function getInstance();

  public function all();

  public function where($query);

  public function find($id);
}
