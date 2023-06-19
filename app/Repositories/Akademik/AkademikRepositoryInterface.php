<?php

namespace App\Repositories\Akademik;

interface AkademikRepositoryInterface
{
    public function index();
    public function show($id);

    public function store();
    public function update();
    public function destroy();
}
