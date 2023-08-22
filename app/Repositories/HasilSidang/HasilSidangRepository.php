<?php

namespace App\Repositories\HasilSidang;

use App\Http\Requests\HasilSidang\CreateHasilSidangRequest;
use App\Http\Resources\ResponseResource;
use App\Http\Resources\UserResouces;
use App\Http\Resources\HasilSidangResouces;
use App\Models\HasilSidang;
use App\Models\Mahasiswa;
use http\Env\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HasilSidangRepository implements HasilSidangRepositoryInterface
{
    public function index($platform = 'api')
    {
        // TODO: Implement index() method.
    }
    public function store($platform = 'api', $id, $request)
    {
        try {
            DB::beginTransaction();

            // cari mahasiswa berdasarkan id
            $mahasiswa = Mahasiswa::where('id', $id)->first();

            // Create HasilSidang
            $hasilSidang = HasilSidang::create([
                'dosen_penguji' => $request->dosen_penguji,
                'hasil_sidang' => $request->hasil_sidang,
            ]);

            //update data mahasiswa fimana hasil sidang id ke id yang sudah di create
            $mahasiswa->update(['hasil_sidang_id' => $hasilSidang->id]);

            DB::commit();

            return $hasilSidang;

        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

    public function show($idUser, $platform = 'api')
    {
        // TODO: Implement show() method.
    }

    public function update($idUser, $platform = 'api')
    {
        // TODO: Implement update() method.
    }
}
