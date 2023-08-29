<?php

namespace App\Repositories\HasilSidang;

use App\Http\Requests\HasilSidang\CreateHasilSidangRequest;
use App\Http\Resources\ResponseResource;
use App\Http\Resources\UserResouces;
use App\Http\Resources\HasilSidangResouces;
use App\Models\HasilSidangAkhir;
use App\Models\HasilSidangSempro;
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
            $hasilSidang = HasilSidangSempro::create([
                'dosen_penguji1' => $request->dosen_penguji1,
                'dosen_penguji2' => $request->dosen_penguji2,
                'dosen_penguji3' => $request->dosen_penguji3,
                'hasil_sidang_penguji1' => $request->hasil_sidang_penguji1,
                'hasil_sidang_penguji2' => $request->hasil_sidang_penguji2,
                'hasil_sidang_penguji3' => $request->hasil_sidang_penguji3,
            ]);

            //update data mahasiswa fimana hasil sidang id ke id yang sudah di create
            $mahasiswa->update(['hasil_sidang_sempro_id' => $hasilSidang->id]);

            DB::commit();

            return $hasilSidang;

        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

    public function storeAkhir($platform = 'api', $id, $request)
    {
        try {
            DB::beginTransaction();

            // cari mahasiswa berdasarkan id
            $mahasiswa = Mahasiswa::where('id', $id)->first();

            // Create HasilSidang
            $hasilSidang = HasilSidangAkhir::create([
                'dosen_penguji1' => $request->dosen_penguji1,
                'dosen_penguji2' => $request->dosen_penguji2,
                'dosen_penguji3' => $request->dosen_penguji3,
                'hasil_sidang_penguji1' => $request->hasil_sidang_penguji1,
                'hasil_sidang_penguji2' => $request->hasil_sidang_penguji2,
                'hasil_sidang_penguji3' => $request->hasil_sidang_penguji3,
            ]);

            //update data mahasiswa fimana hasil sidang id ke id yang sudah di create
            $mahasiswa->update(['hasil_sidang_akhir_id' => $hasilSidang->id]);

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

    public function update($platform = 'api', $id, $request)
    {
        try {
            DB::beginTransaction();

            // Cari mahasiswa berdasarkan id
            $mahasiswa = Mahasiswa::find($id);
            $hasilsempro = HasilSidangSempro::find($mahasiswa->hasil_sidang_sempro_id);

            // Buat atau update HasilSidang
//            $hasilSidang = $mahasiswa->hasilSidang;
            $hasilsempro->update([
                'dosen_penguji1' => $request->dosen_penguji1,
                'dosen_penguji2' => $request->dosen_penguji2,
                'dosen_penguji3' => $request->dosen_penguji3,
                'hasil_sidang_penguji1' => $request->hasil_sidang_penguji1,
                'hasil_sidang_penguji2' => $request->hasil_sidang_penguji2,
                'hasil_sidang_penguji3' => $request->hasil_sidang_penguji3,
            ]);

            DB::commit();

            return $hasilsempro;

        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

    public function updateAkhir($platform = 'api', $id, $request)
    {
        try {
            DB::beginTransaction();

            // Cari mahasiswa berdasarkan id
            $mahasiswa = Mahasiswa::find($id);
            $hasilakhir = HasilSidangAkhir::find($mahasiswa->hasil_sidang_akhir_id);

            // Buat atau update HasilSidang
//            $hasilSidang = $mahasiswa->hasilSidang;
            $hasilakhir->update([
                'dosen_penguji1' => $request->dosen_penguji1,
                'dosen_penguji2' => $request->dosen_penguji2,
                'dosen_penguji3' => $request->dosen_penguji3,
                'hasil_sidang_penguji1' => $request->hasil_sidang_penguji1,
                'hasil_sidang_penguji2' => $request->hasil_sidang_penguji2,
                'hasil_sidang_penguji3' => $request->hasil_sidang_penguji3,
            ]);

            DB::commit();

            return $hasilakhir;

        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }
}
