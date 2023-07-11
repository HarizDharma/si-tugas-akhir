<?php

namespace App\Repositories\Panitia;

use App\Http\Requests\Panitia\CreatePanitiaRequest;
use App\Http\Requests\Panitia\UpdatePanitiaRequest;
use App\Http\Resources\ResponseResource;
use App\Http\Resources\UserResouces;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PanitiaRepository implements PanitiaRepositoryInterface
{
    public function index($platform = 'api')
    {
        // Mengecek apakah pengguna sudah terautentikasi
        if (Auth::check()) {
            $user = Auth::user();

            // Return Jika Role bukan akademik atau Panita (ROLE == MAHASISWA)
            if ($user->hasRole('mahasiswa')) {
                return $platform == 'web' ?
                    formatResponseResource(false, 'Unauthorized, Please Login')
                    : new ResponseResource(false, 'Unauthorized, Please Login');
            }

            $panitia = User::whereHas('roles', function ($query) {
                $query->where('role', 'panitia');
            })->get();

            return $platform == 'web' ?
                formatResponseResource(true, 'List User Panitia', formatPanitiaResource($panitia), $user->token)
                : new ResponseResource(true, 'List User Panitia', UserResouces::collection($panitia));

        } else {
            // Jika pengguna belum terautentikasi, kirim respons error
            return $platform == 'web' ?
                formatResponseResource(false, 'Unauthorized, Please Login')
                : new ResponseResource(false, 'Unauthorized, Please Login');
        }
    }

    public function show($platform = 'api', $id)
    {
        if (Auth::check()) {
            $user = Auth::user();

            // Return Jika Role bukan akademik (Panitia/Panitia)
            if ($user->hasRole('mahasiswa')) {
                return $platform == 'web' ?
                    formatResponseResource(false, 'Tidak Mempunyai Hak Akses')
                    : new ResponseResource(false, 'Tidak Mempunyai Hak Akses');
            }

            // Cari pengguna dengan peran akademik berdasarkan ID
            $panitia = User::whereHas('roles', function ($query) {
                $query->where('name', 'panitia');
            })->find($id);

            // Jika pengguna dengan ID yang diberikan tidak ditemukan, kirim respons error
            if (!$panitia) {
                return $platform == 'web' ?
                    formatResponseResource(false, 'Pengguna tidak ditemukan')
                    : new ResponseResource(false, 'Pengguna tidak ditemukan');
            }
            return $platform == 'web' ?
                formatResponseResource(true, 'Detail User Panitia ', $panitia, $user->token)
                : new ResponseResource(true, 'Detail User Panitia ', UserResouces::make($panitia));
        } else {
            // Jika pengguna belum terautentikasi, kirim respons error
            return $platform == 'web' ?
                formatResponseResource(false, 'Unauthorized, Please Login')
                : new ResponseResource(false, 'Unauthorized, Please Login');
        }
    }

    public function store($platform = 'api', CreatePanitiaRequest $request)
    {
        if (Auth::check()) {
            $user = Auth::user();

            if ($user->hasRole('mahasiswa')) {
                //  Format Return Response Resource
                return $platform == 'web' ?
                    formatResponseResource(false, 'Unauthorized, Please Login')
                    : new ResponseResource(false, 'Unauthorized, Please Login');
            }
            try {
                DB::beginTransaction();

                // Validasi input telah dilakukan oleh CreatePanitiaRequest

                $panitia = User::create([
                    'username' => $request->username,
                    'password' => bcrypt($request->password),
                    'nama' => $request->nama,
                    'nomor_identitas' => $request->nomor_identitas,
                    'role' => 'panitia',
                    'mahasiswa_id' => '0',
                ]);
                $panitia->attachRole('panitia');

                DB::commit();
                return $platform == 'web' ?
                    formatResponseResource(true, 'Create User Panitia', $panitia, $user->token)
                    : new ResponseResource(true, 'Create User Panitia', UserResouces::make($panitia));

            } catch (\Exception $e) {
                DB::rollback();

                return $platform == 'web' ?
                    formatResponseResource(false, 'Gagal membuat user panitia: ' . $e->getMessage())
                    : new ResponseResource(false, 'Gagal membuat user panitia: ' . $e->getMessage());
            }
        } else {
            // Jika pengguna belum terautentikasi, kirim respons error
            return $platform == 'web' ?
                formatResponseResource(false, 'Unauthorized, Please Login')
                : new ResponseResource(false, 'Unauthorized, Please Login');
        }
    }

    public function update($platform = 'api', UpdatePanitiaRequest $request, $id)
    {
        if (Auth::check()) {
            $user = Auth::user();

            if ($user->hasRole('mahasiswa')) {
                return $platform == 'web' ?
                    formatResponseResource(false, 'Unauthorized, Please Login')
                    : new ResponseResource(false, 'Unauthorized, Please Login');
            }

            try {
                DB::beginTransaction();

                // Validasi input telah dilakukan oleh Request Panitia

                $panitia = User::findOrFail($id);

                $panitia->username = $request->username;
                $panitia->password = bcrypt($request->password);
                $panitia->nama = $request->nama;
                $panitia->nomor_identitas = $request->nomor_identitas;

                $panitia->save();

                DB::commit();

                return $platform == 'web' ?
                    formatResponseResource(true, 'Update User Panitia ', $panitia, $user->token)
                    : new ResponseResource(true, 'Update User Panitia ', UserResouces::make($panitia));

            } catch (\Exception $e) {
                DB::rollback();

                return $platform == 'web' ?
                    formatResponseResource(false, 'Gagal mengupdate user Panitia: ' . $e->getMessage())
                    : new ResponseResource(false, 'Gagal mengupdate user Panitia: ' . $e->getMessage());
            }
        } else {
            return $platform == 'web' ?
                formatResponseResource(false, 'Unauthorized, Please Login')
                : new ResponseResource(false, 'Unauthorized, Please Login');
        }
    }

    public function getSelf($platform = 'api')
    {
        if (Auth::check()) {
            $user = Auth::user();
            $id = $user->id;
            // Return Jika Role bukan akademik (Panitia/Panitia)
            if (!$user->hasRole('panitia')) {
                return $platform == 'web' ?
                    formatResponseResource(false, 'Tidak Mempunyai Hak Akses')
                    : new ResponseResource(false, 'Tidak Mempunyai Hak Akses');
            }

            // Cari pengguna dengan peran akademik berdasarkan ID
            $panitia = User::whereHas('roles', function ($query) {
                $query->where('name', 'panitia');
            })->find($id);

            // Jika pengguna dengan ID yang diberikan tidak ditemukan, kirim respons error
            if (!$panitia) {
                return $platform == 'web' ?
                    formatResponseResource(false, 'Pengguna tidak ditemukan')
                    : new ResponseResource(false, 'Pengguna tidak ditemukan' );
            }
            return $platform == 'web' ?
                formatResponseResource(true, 'Detail User Panitia ', $panitia, $user->token)
                : new ResponseResource(true, 'Detail User Panitia ', UserResouces::make($panitia));
        } else {
            // Jika pengguna belum terautentikasi, kirim respons error
            return $platform == 'web' ?
                formatResponseResource(false, 'Unauthorized, Please Login')
                : new ResponseResource(false, 'Unauthorized, Please Login');
        }
    }

    public function updateSelf($platform = 'api', UpdatePanitiaRequest $request)
    {
        if(Auth::check()) {
            $user = Auth::user();
            $id = $user->id;
            if (!$user->hasRole('panitia')) {
                return $platform == 'web' ?
                    formatResponseResource(false, 'Unauthorized, Please Login' )
                    : new ResponseResource(false, 'Unauthorized, Please Login');
            }

            try{
                DB::beginTransaction();

                // Validasi input telah dilakukan oleh Request Panitia

                $panitia = User::findOrFail($id);

                $panitia->username = $request->username;
                $panitia->password = bcrypt($request->password);
                $panitia->nama = $request->nama;
                $panitia->nomor_identitas = $request->nomor_identitas;

                $panitia->save();

                DB::commit();

                return $platform == 'web' ?
                    formatResponseResource(true, 'Update User Panitia ', $panitia, $user->token )
                    : new ResponseResource(true, 'Update User Panitia ', UserResouces::make($panitia) );

            } catch (\Exception $e) {
                DB::rollback();

                return $platform == 'web' ?
                    formatResponseResource(false, 'Gagal mengupdate user Panitia: ' . $e->getMessage())
                    :  new ResponseResource(false, 'Gagal mengupdate user Panitia: ' . $e->getMessage());
            }
        }
        else {
            return $platform == 'web' ?
                formatResponseResource(false, 'Unauthorized, Please Login' )
                : new ResponseResource(false, 'Unauthorized, Please Login');
        }
    }

    public function destroy($platform = 'api', $id)
    {
        if(Auth::check()) {
            $user = Auth::user();
            if($user->hasRole('mahasiswa')) {
                return $platform == 'web' ?
                    formatResponseResource(false, 'Unauthorized, Please Login' )
                    : new ResponseResource(false, 'Unauthorized, Please Login');
            }

            try{
                DB::beginTransaction();

                // Validasi input telah dilakukan oleh Request Panitia

                $panitia = User::findOrFail($id);
                $panitia->delete();

                DB::commit();

                return $platform == 'web' ?
                    formatResponseResource(true, 'Delete User Panitia ', $panitia, $user->token )
                    : new ResponseResource(true, 'Delete User Panitia ', UserResouces::make($panitia) );

            } catch (\Exception $e) {
                DB::rollback();

                return $platform == 'web' ?
                    formatResponseResource(false, 'Gagal Menghapus user Panitia: ' . $e->getMessage())
                    :  new ResponseResource(false, 'Gagal Menghapus user Panitia: ' . $e->getMessage());
            }
        }
        else {
            return $platform == 'web' ?
                formatResponseResource(false, 'Unauthorized, Please Login' )
                : new ResponseResource(false, 'Unauthorized, Please Login');
        }
    }

    //TODO: buat counting mahasiswa yang belum terverifikasi
    //TODO: buat counting mahasiswa yang sudah lolos verifikasi sempro
    //TODO: buat counting data panitia
}
