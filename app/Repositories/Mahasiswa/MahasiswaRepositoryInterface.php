<?php

namespace App\Repositories\Mahasiswa;

use App\Http\Requests\Mahasiswa\CreateMahasiswaRequest;
use App\Http\Requests\Mahasiswa\UpdateMahasiswaRequest;

interface MahasiswaRepositoryInterface
{
    public function index();
    public function show($id);

    public function store(CreateMahasiswaRequest $request);
    public function update(UpdateMahasiswaRequest $request, $id);
    public function destroy($id);
    public function getSelf();
    public function updateSelf(UpdateMahasiswaRequest $request);
}
