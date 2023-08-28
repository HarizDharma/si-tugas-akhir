<?php

namespace App\Repositories\Mahasiswa;

use App\Http\Requests\Mahasiswa\CreateMahasiswaRequest;
use App\Http\Requests\Mahasiswa\UpdateMahasiswaRequest;

interface MahasiswaRepositoryInterface
{
    public function index($platform = 'api');
    public function show($platform = 'api', $id);

    public function store($platform = 'api', CreateMahasiswaRequest $request);
    public function update($platform = 'api', UpdateMahasiswaRequest $request, $id);
    public function destroy($platform = 'api', $id);
    public function getSelf($platform = 'api');
    public function updateSelf($platform = 'api', UpdateMahasiswaRequest $request);


    public function VerifikasiPanitiaSempro($id, $val, $platform='web');
    public function VerifikasiPanitiaSidang($id, $val, $platform='web');
    public function VerifikasiAkademik($id, $val, $platform='web');
    public function jadwalambilijazah($platform = 'api', UpdateMahasiswaRequest $request, $id);
}
