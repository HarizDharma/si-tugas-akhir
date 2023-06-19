<?php

namespace App\Repositories\Akademik;

use App\Http\Resources\ResponseResource;
use App\Http\Resources\UserResouces;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AkademikRepository implements AkademikRepositoryInterface
{
    public function index()
    {
        // TODO: Implement getAll() method.
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
        // TODO: Implement get() method.
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


            return new ResponseResource(true, 'Detail User Akademik Id : '.$id, UserResouces::make($akademik));

        } else {
            // Jika pengguna belum terautentikasi, kirim respons error
            return ['status' => false, 'message' => 'Unauthorized, Please Login'];
        }
    }
    public function store()
    {
        // TODO: Implement store() method.

    }
    public function update()
    {
        // TODO: Implement update() method.
    }

    public function destroy()
    {
        // TODO: Implement destroy() method.
    }
}
