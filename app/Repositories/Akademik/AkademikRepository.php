<?php

namespace App\Repositories\Akademik;

use App\Http\Requests\Akademik\CreateAkademikRequest;
use App\Http\Requests\Akademik\UpdateAkademikRequest;
use App\Http\Resources\ResponseResource;
use App\Http\Resources\UserResouces;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\AuthRequest\LoginRequest;
use App\Http\Resources\LoginResources;
use App\Http\Resources\MahasiswaResources;
use App\Models\File;
use App\Models\HasilSidang;
use App\Models\Mahasiswa;
use App\Models\Status;
use App\Models\TahapSidang;
use App\Models\Verifikasi;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;

class AkademikRepository implements AkademikRepositoryInterface
{
    public function index($platform = 'api')
    {
        // Mengecek apakah pengguna sudah terautentikasi

        if (Auth::check()) {
            // Auth berhasil
            $user = Auth::user();
            $token = $this->generateSanctumToken($user);
            $user->token = $token;

            // Return Jika Role bukan akademik (Panitia/Mahasiswa)
            if(!$user->hasRole('akademik')) {
                //  Format Return Response Resource
                return $platform == 'web' ?
                    formatResponseResource(false, 'Unauthorized, Please Login' )
                    : new ResponseResource(false, 'Unauthorized, Please Login');
            }

            $akademik = User::whereHas('roles', function ($query) {
                $query->where('role', 'akademik');
            })->get();

            return $platform == 'web' ?
                formatResponseResource(true, 'List User Akademik',  formatAkademikResource($akademik), $user->token)
                : new ResponseResource(true, 'List User Akademik', UserResouces::make($akademik));
        }
        else {
            // Jika pengguna belum terautentikasi, kirim respons error
            return $platform == 'web' ?
                formatResponseResource(false, 'Unauthorized, Please Login' )
                : new ResponseResource(false, 'Unauthorized, Please Login');
        }
    }
    public function show($platform = 'api', $id)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $token = $this->generateSanctumToken($user);
            $user->token = $token;

            // Return Jika Role bukan akademik (Panitia/Mahasiswa)
            if(!$user->hasRole('akademik')) {
                //  Format Return Response Resource
                return $platform == 'web' ?
                    formatResponseResource(false, 'Unauthorized, Please Login' )
                    : new ResponseResource(false, 'Unauthorized, Please Login');
            }

            // Cari pengguna dengan peran akademik berdasarkan ID
            $akademik = User::whereHas('roles', function ($query) {
                $query->where('name', 'akademik');
            })->find($id);

            // Jika pengguna dengan ID yang diberikan tidak ditemukan, kirim respons error
            if (!$akademik) {
                return $platform == 'web' ?
                    formatResponseResource(false, 'Pengguna tidak ditemukan' )
                    : new ResponseResource(false, 'Pengguna tidak ditemukan');
            }

            return $platform == 'web' ?
                formatResponseResource(true, 'Detail User Akademik',  $akademik, $user->token )
                : new ResponseResource(true, 'Detail User Akademik', UserResouces::make($akademik));

        }
        else {
            // Jika pengguna belum terautentikasi, kirim respons error
            return $platform == 'web' ?
                formatResponseResource(false, 'Unauthorized, Please Login' )
                : new ResponseResource(false, 'Unauthorized, Please Login');
        }
    }
    public function store($platform = 'api', CreateAkademikRequest  $request)
    {
        if (Auth::check()) {
            $user = Auth::user();

            // Return Jika Role bukan akademik (Panitia/Mahasiswa)
            if(!$user->hasRole('akademik')) {
                //  Format Return Response Resource
                    //  return [
                    //      'status' => $this->status,
                    //      'message' => $this->message,
                    //      'data' => $data,
                    //  ];
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

                //  Format Return Response Resource
                    //  return [
                    //      'status' => $this->status,
                    //      'message' => $this->message,
                    //      'data' => $data,
                    //  ];
                return new ResponseResource(true, 'Create User Akademik', $akademik);
            } catch (\Exception $e) {
                DB::rollback();

                // Tangani kesalahan dan berikan respons yang sesuai
                //  Format Return Response Resource
                    //  return [
                    //      'status' => $this->status,
                    //      'message' => $this->message,
                    //      'data' => $data,
                    //  ];
                return new ResponseResource(false, 'Gagal membuat user akademik: ' . $e->getMessage());
            }
        }
        else {
            // Jika pengguna belum terautentikasi, kirim respons error
            return ['status' => false, 'message' => 'Unauthorized, Please Login'];
        }
    }
    public function update($platform = 'api', UpdateAkademikRequest $request, $id)
    {
        if (Auth::check()) {
            $user = Auth::user();

            // Return Jika Role bukan akademik (Panitia/Mahasiswa)
            if(!$user->hasRole('akademik')) {
                //  Format Return Response Resource
                    //  return [
                    //      'status' => $this->status,
                    //      'message' => $this->message,
                    //      'data' => $data,
                    //  ];
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

                //  Format Return Response Resource
                    //  return [
                    //      'status' => $this->status,
                    //      'message' => $this->message,
                    //      'data' => $data,
                    //  ];
                return new ResponseResource(true, 'Update User Akademik ',$akademik );

            } catch (\Exception $e) {
                DB::rollback();

                // Tangani kesalahan dan berikan respons yang sesuai
                //  Format Return Response Resource
                    //  return [
                    //      'status' => $this->status,
                    //      'message' => $this->message,
                    //      'data' => $data,
                    //  ];
                return new ResponseResource(false, 'Gagal mengupdate user akademik: ' . $e->getMessage());
            }
        }
        else {
            // Jika pengguna belum terautentikasi, kirim respons error
            return ['status' => false, 'message' => 'Unauthorized, Please Login'];
        }
    }
    public function updateSelf($platform = 'api', UpdateAkademikRequest $request)
    {
        // TODO: Implement updateSelf() method.
    }

    public function destroy($platform = 'api', $id)
    {
        if (Auth::check()) {
            $user = Auth::user();

            // Return Jika Role bukan akademik (Panitia/Mahasiswa)
            if(!$user->hasRole('akademik')) {
                //  Format Return Response Resource
                    //  return [
                    //      'status' => $this->status,
                    //      'message' => $this->message,
                    //      'data' => $data,
                    //  ];
                return new ResponseResource(false, 'Tidak Mempunyai Hak Akses');
            }

            try {
                DB::beginTransaction();

                $akademik = User::findOrFail($id);
                $akademik->delete();

                DB::commit();

                //  Format Return Response Resource
                    //  return [
                    //      'status' => $this->status,
                    //      'message' => $this->message,
                    //      'data' => $data,
                    //  ];
                return new ResponseResource(true, 'User Akademik berhasil dihapus', $akademik);

            } catch (\Exception $e) {
                DB::rollback();

                // Tangani kesalahan dan berikan respons yang sesuai
                //  Format Return Response Resource
                    //  return [
                    //      'status' => $this->status,
                    //      'message' => $this->message,
                    //      'data' => $data,
                    //  ];
                return new ResponseResource(false, 'Gagal menghapus user akademik: ' . $e->getMessage());
            }
        }
        else {
            // Jika pengguna belum terautentikasi, kirim respons error
            return ['status' => false, 'message' => 'Unauthorized, Please Login'];
        }
    }

    public function getSelf($platform = 'api')
    {
        if (Auth::check()) {
            $user = Auth::user();
            $id = $user->id;
            $token = $this->generateSanctumToken($user);
            $user->token = $token;

            // Return Jika Role bukan akademik (Panitia/Mahasiswa)
            if(!$user->hasRole('akademik') ) {
                return $platform == 'web' ?
                    formatResponseResource(false, 'Tidak Mempunyai Hak Akses' )
                    : new ResponseResource(false, 'Tidak Mempunyai Hak Akses');
            }

            // Cari pengguna dengan peran akademik berdasarkan ID
            $akademik = User::whereHas('roles', function ($query) {
                $query->where('name', 'akademik');
            })->find($id);

            // Jika pengguna dengan ID yang diberikan tidak ditemukan, kirim respons error
            if (!$akademik) {
                return $platform == 'web' ?
                    formatResponseResource(false, 'Pengguna tidak ditemukan' )
                    : new ResponseResource(false, 'Pengguna tidak ditemukan');
            }

            return $platform == 'web' ?
                formatResponseResource(true, 'Detail User Akademik ',  formatAkademikResource($akademik), $user->token)
                : new ResponseResource(true, 'Detail User Akademik  ', UserResouces::make($akademik));
        }
        else {
            return $platform == 'web' ?
                formatResponseResource(false, 'Unauthorized, Please Login' )
                : new ResponseResource(false, 'Unauthorized, Please Login');
        }
    }
    protected function generateSanctumToken($user)
    {
        $token = $user->createToken('api-token')->plainTextToken;
        return $token;
    }
}
