<?php

namespace App\Repositories\File;

use Illuminate\Http\Request;
interface FileRepositoryInterface
{
    public function index($platform='api');

    public function show($id, $platform='api');

    public function update($id, Request $request, $platform='api');



}
