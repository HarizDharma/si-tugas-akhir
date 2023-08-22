<?php

namespace App\Repositories\HasilSidang;

use App\Http\Requests\HasilSidang\CreateHasilSidangRequest;
use http\Env\Request;

interface HasilSidangRepositoryInterface
{
    public function index($platform = 'api');
    public function store($platform = 'api', $id, $request);
    public function show($idUser, $platform = 'api');
    public function update($idUser, $platform = 'api');
}
