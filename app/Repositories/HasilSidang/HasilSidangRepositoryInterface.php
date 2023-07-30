<?php

namespace App\Repositories\HasilSidang;

interface HasilSidangRepositoryInterface
{
    public function index($platform = 'api');
    public function show($idUser, $platform = 'api');
    public function update($idUser, $platform = 'api');
}
