<?php

namespace App\Repositories\Akademik;

use App\Http\Requests\Akademik\CreateAkademikRequest;
use App\Http\Requests\Akademik\UpdateAkademikRequest;
use App\Http\Resources\ResponseResource;
use App\Http\Resources\UserResouces;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AkademikRepository implements AkademikRepositoryInterface
{
    public function index()
    {
        // Mengecek apakah pengguna sudah terautentikasi
        if (Auth::check()) {
            $user = Auth::user();

            // Return Jika Role bukan akademik (Panitia/Mahasiswa)
            if(!$user->hasRole('akademik')) {
                return new ResponseResource(false, 'Tidak Mempunyai Hak Akses');
            }

            $akademik = User::whereHas('roles', function ($query) {
                $query->where('role', 'akademik');
            })->get();

            return new ResponseResource(true, 'List User Akademik', UserResouces::collection($akademik));

        } else {
            // Jika pengguna belum terautentikasi, kirim respons error
            return ['status' => false, 'message' => 'Unauthorized, Please Login'];
        }
    }
    public function show($id)
    {
        if (Auth::check()) {
            $user = Auth::user();

            // Return Jika Role bukan akademik (Panitia/Mahasiswa)
            if(!$user->hasRole('akademik')) {
                return new ResponseResource(false, 'Tidak Mempunyai Hak Akses');
            }

            // Cari pengguna dengan peran akademik berdasarkan ID
            $akademik = User::whereHas('roles', function ($query) {
                $query->where('name', 'akademik');
            })->find($id);

            // Jika pengguna dengan ID yang diberikan tidak ditemukan, kirim respons error
            if (!$akademik) {
                return new ResponseResource(false, 'Pengguna tidak ditemukan');
            }


            return new ResponseResource(true, 'Detail User Akademik ', UserResouces::make($akademik));

        }
        else {
            // Jika pengguna belum terautentikasi, kirim respons error
            return ['status' => false, 'message' => 'Unauthorized, Please Login'];
        }
    }
    public function store(CreateAkademikRequest  $request)
    {
        if (Auth::check()) {
            $user = Auth::user();

            // Return Jika Role bukan akademik (Panitia/Mahasiswa)
            if(!$user->hasRole('akademik')) {
                return new ResponseResource(false, 'Tidak Mempunyai Hak Akses');
            }
            try {
                DB::beginTransaction();

                // Validasi input telah dilakukan oleh CreateAkademikRequest

                $akademik = User::create([
                    'username' => $request->username,
                    'password' => bcrypt($request->password),
                    'nama' => $request->nama,
                    'nomor_identitas' => $request->nomor_identitas,
                    'role' => 'akademik',
                    'mahasiswa_id' => '0',
                ]);
                $akademik->attachRole('akademik');

                DB::commit();

                return new ResponseResource(true, 'Create User Akademik', $akademik);
            } catch (\Exception $e) {
                DB::rollback();

                // Tangani kesalahan dan berikan respons yang sesuai
                return new ResponseResource(false, 'Gagal membuat user akademik: ' . $e->getMessage());
            }
        }
        else {
            // Jika pengguna belum terautentikasi, kirim respons error
            return ['status' => false, 'message' => 'Unauthorized, Please Login'];
        }
    }
    public function update(UpdateAkademikRequest $request, $id)
    {
        if (Auth::check()) {
            $user = Auth::user();

            // Return Jika Role bukan akademik (Panitia/Mahasiswa)
            if(!$user->hasRole('akademik')) {
                return new ResponseResource(false, 'Tidak Mempunyai Hak Akses');
            }

            try {
                DB::beginTransaction();

                // Validasi input telah dilakukan oleh UpdateAkademikRequest

                $akademik = User::findOrFail($id);

                $akademik->username = $request->username;
                $akademik->password = bcrypt($request->password);
                $akademik->nama = $request->nama;
                $akademik->nomor_identitas = $request->nomor_identitas;

                $akademik->save();

                DB::commit();

                return new ResponseResource(true, 'Update User Akademik Id: ' . $akademik->id);

            } catch (\Exception $e) {
                DB::rollback();

                // Tangani kesalahan dan berikan respons yang sesuai
                return new ResponseResource(false, 'Gagal mengupdate user akademik: ' . $e->getMessage());
            }
        }
        else {
            // Jika pengguna belum terautentikasi, kirim respons error
            return ['status' => false, 'message' => 'Unauthorized, Please Login'];
        }
    }
    public function destroy($id)
    {
        if (Auth::check()) {
            $user = Auth::user();

            // Return Jika Role bukan akademik (Panitia/Mahasiswa)
            if(!$user->hasRole('akademik')) {
                return new ResponseResource(false, 'Tidak Mempunyai Hak Akses');
            }

            try {
                DB::beginTransaction();

                $akademik = User::findOrFail($id);
                $akademik->delete();

                DB::commit();

                return new ResponseResource(true, 'User Akademik berhasil dihapus');

            } catch (\Exception $e) {
                DB::rollback();

                // Tangani kesalahan dan berikan respons yang sesuai
                return new ResponseResource(false, 'Gagal menghapus user akademik: ' . $e->getMessage());
            }
        }
        else {
            // Jika pengguna belum terautentikasi, kirim respons error
            return ['status' => false, 'message' => 'Unauthorized, Please Login'];
        }
    }
}
