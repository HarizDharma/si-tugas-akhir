<?php

namespace App\Repositories\Status;

interface StatusRepositoryInterface
{
    public function index($platform = 'api');
    public function show($idUser, $platform = 'api');
    public function update($idUser, $platform = 'api');

}
