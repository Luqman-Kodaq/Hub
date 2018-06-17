<?php

namespace App\Repositories\User;

use Illuminate\Http\Request;

interface SettingRepositoryInterface
{
  public function getInstance();

  public function update(Request $request);

  public function find($id);

    public function first();
}