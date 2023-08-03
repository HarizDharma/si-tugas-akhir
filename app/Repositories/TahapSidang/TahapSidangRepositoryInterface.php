<?php

namespace App\Repositories\TahapSidang;

use Illuminate\Http\Request;

interface TahapSidangRepositoryInterface
{
    public function index($platform = 'api');
    public function update($id, Request $request,$platform = 'api');
}
