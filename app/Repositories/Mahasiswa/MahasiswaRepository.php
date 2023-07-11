<?php

namespace App\Repositories\Mahasiswa;

use App\Http\Requests\Mahasiswa\CreateMahasiswaRequest;
use App\Http\Requests\Mahasiswa\UpdateMahasiswaRequest;
use App\Http\Resources\ResponseResource;
use App\Http\Resources\UserResouces;
use App\Models\File;
use App\Models\HasilSidang;
use App\Models\Mahasiswa;
use App\Models\User;
use App\Models\Verifikasi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MahasiswaRepository implements MahasiswaRepositoryInterface
{


    public function index($platform = 'api')
    {
        // Mengecek apakah pengguna sudah terautentikasi
        if (Auth::check()) {
            $user = Auth::user();

            // Return Jika Role bukan akademik atau Panita (ROLE == MAHASISWA)
            if($user->hasRole('mahasiswa')) {
                return $platform == 'web' ?
                    formatResponseResource(false, 'Unauthorized, Please Login' )
                    : new ResponseResource(false, 'Unauthorized, Please Login');
            }

            $mahasiswa = User::whereHas('roles', function ($query) {
                $query->where('role', 'mahasiswa');
            })->get();

            return $platform == 'web' ?
                formatResponseResource(true, 'List User Mahasiswa',  formatMahasiswaResource($mahasiswa), $user->token )
                : new ResponseResource(true, 'List User Mahasiswa', UserResouces::collection($mahasiswa));

        } else {
            // Jika pengguna belum terautentikasi, kirim respons error
            return $platform == 'web' ?
                formatResponseResource(false, 'Unauthorized, Please Login' )
                : new ResponseResource(false, 'Unauthorized, Please Login');
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
            if(!$user->hasRole('mahasiswa')) {
                return $platform == 'web' ?
                    formatResponseResource(false, 'Tidak Mempunyai Hak Akses' )
                    : new ResponseResource(false, 'Tidak Mempunyai Hak Akses');
            }

            // Cari pengguna dengan peran akademik berdasarkan ID
            $mahasiswa = User::whereHas('roles', function ($query) {
                $query->where('name', 'mahasiswa');
            })->find($id);

            // Jika pengguna dengan ID yang diberikan tidak ditemukan, kirim respons error
            if (!$mahasiswa) {
                return $platform == 'web' ?
                    formatResponseResource(false, 'Pengguna tidak ditemukan' )
                    : new ResponseResource(false, 'Pengguna tidak ditemukan');
            }
            return $platform == 'web' ?
                formatResponseResource(true, 'Detail User Mahasiswa ',  formatMahasiswaResource($mahasiswa), $user->token)
                : new ResponseResource(true, 'Detail User Mahasiswa ', UserResouces::make($mahasiswa));
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

            // Return Jika Role bukan akademik (Panitia/Mahasiswa)
            if($user->hasRole('mahasiswa')) {
                return $platform == 'web' ?
                    formatResponseResource(false, 'Tidak Mempunyai Hak Akses' )
                    : new ResponseResource(false, 'Tidak Mempunyai Hak Akses');
            }

            // Cari pengguna dengan peran akademik berdasarkan ID
            $mahasiswa = User::whereHas('roles', function ($query) {
                $query->where('name', 'mahasiswa');
            })->find($id);

            // Jika pengguna dengan ID yang diberikan tidak ditemukan, kirim respons error
            if (!$mahasiswa) {
                return $platform == 'web' ?
                    formatResponseResource(false, 'Pengguna tidak ditemukan' )
                    : new ResponseResource(false, 'Pengguna tidak ditemukan');
            }
            return $platform == 'web' ?
                formatResponseResource(true, 'Detail User Mahasiswa ',  $mahasiswa, $user->token)
                : new ResponseResource(true, 'Detail User Mahasiswa ', UserResouces::make($mahasiswa));
        }
        else {
            // Jika pengguna belum terautentikasi, kirim respons error
            return $platform == 'web' ?
                formatResponseResource(false, 'Unauthorized, Please Login' )
                : new ResponseResource(false, 'Unauthorized, Please Login');
        }
    }
    public function store($platform = 'api', CreateMahasiswaRequest $request)
    {
        if (Auth::check()) {
            $user = Auth::user();

            // Return Jika Role bukan akademik (Panitia/Mahasiswa)
            if($user->hasRole('mahasiswa')) {
                return $platform == 'web' ?
                    formatResponseResource(false, 'Tidak Mempunyai Hak Akses' )
                    : new ResponseResource(false, 'Tidak Mempunyai Hak Akses');
            }
            try {
                DB::beginTransaction();

                // Validasi input telah dilakukan oleh CreateMahasiswaRequest

                $file = File::create([
                    'laporan_pkl' => null,
                    'bebas_pkl' => null,
                    'kartu_kendali_skripsi' => null,
                    'skla' => null,
                    'bukti_jurnal' => null,
                    'sertifikat_toeic' => null,
                    'skkm' => null,
                    'pengumpulan_alat' => null,
                ]);
                $verifikasi = Verifikasi::create([
                    'verifikasi_panitia' => false,
                    'verifikasi_akademik' => false
                ]);
                $mahasiswa = Mahasiswa::create([
                    'prodi' => $request->prodi,
                    'judul_skripsi' =>  $request->judul_skripsi,
                    'nama_dosen1' => $request->nama_dosen1 ,
                    'nama_dosen2' => $request->nama_dosen2 ,
                    'jadwal_pengambilan_ijazah' => null,
                    'status_id' => (string) 1,
                    'sidang_id' => null,
                    'file_id' => (string) $file->id,
                    'hasil_sidang_id' => null,
                    'verifikasi_id' => $verifikasi->id,

                ]);

                $user = User::create([
                    'username' => $request->username,
                    'password' => bcrypt($request->password),
                    'nama' => $request->nama,
                    'nomor_identitas' => $request->nomor_identitas,
                    'role' => 'mahasiswa',
                    'mahasiswa_id' => $mahasiswa->id,
                ])->attachRole('mahasiswa');

                DB::commit();

                return $platform == 'web' ?
                    formatResponseResource(true, 'Create User Mahasiswa', formatMahasiswaResource($user))
                    : new ResponseResource(true, 'Create User Mahasiswa', UserResouces::make($user));


            } catch (\Exception $e) {
                DB::rollback();

                return $platform == 'web' ?
                    formatResponseResource(false, 'Gagal membuat user Mahasiswa: ' . $e->getMessage())
                    : new ResponseResource(false, 'Gagal membuat user Mahasiswa: ' . $e->getMessage());

            }
        }
        else {
            // Jika pengguna belum terautentikasi, kirim respons error
            return $platform == 'web' ?
                formatResponseResource(false, 'Unauthorized, Please Login' )
                : new ResponseResource(false, 'Unauthorized, Please Login');
        }
    }
    public function update($platform = 'api', UpdateMahasiswaRequest $request, $id)
    {
        if (Auth::check()) {
            $user = Auth::user();

            // Return Jika Role bukan akademik (Panitia/Mahasiswa)
            if($user->hasRole('mahasiswa')) {
                return new ResponseResource(false, 'Tidak Mempunyai Hak Akses');
            }

            try {
                DB::beginTransaction();

                // Validasi input telah dilakukan oleh UpdateAkademikRequest

                $mahasiswa = User::findOrFail($id);

//                $mahasiswa->username = $request->username;
//                $mahasiswa->password = bcrypt($request->password);
//                $mahasiswa->nama = $request->nama;
//                $mahasiswa->nomor_identitas = $request->nomor_identitas;
//
//                $mahasiswa->save();

                DB::commit();

                //  Format Return Response Resource
                //  return [
                //      'status' => $this->status,
                //      'message' => $this->message,
                //      'data' => $data,
                //  ];
                return new ResponseResource(true, 'Update User Mahasiswa ',$mahasiswa );

            } catch (\Exception $e) {
                DB::rollback();

                // Tangani kesalahan dan berikan respons yang sesuai
                //  Format Return Response Resource
                //  return [
                //      'status' => $this->status,
                //      'message' => $this->message,
                //      'data' => $data,
                //  ];
                return $platform == 'web' ?
                    formatResponseResource(false, 'Gagal update Mahasiswa: ' . $e->getMessage())
                    : new ResponseResource(false, 'Gagal update Mahasiswa: ' . $e->getMessage());
            }
        }
        else {
            // Jika pengguna belum terautentikasi, kirim respons error
            return $platform == 'web' ?
                formatResponseResource(false, 'Unauthorized, Please Login' )
                : new ResponseResource(false, 'Unauthorized, Please Login');
        }
    }
    public function updateSelf($platform = 'api', UpdateMahasiswaRequest $request)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $id = $user->id;

            // Return Jika Role bukan akademik (Panitia/Mahasiswa)
            if(!$user->hasRole('mahasiswa')) {
                return new ResponseResource(false, 'Tidak Mempunyai Hak Akses');
            }

            try {
                DB::beginTransaction();

                // Validasi input telah dilakukan oleh UpdateAkademikRequest

                $mahasiswa = User::findOrFail($id);

//                $mahasiswa->username = $request->username;
//                $mahasiswa->password = bcrypt($request->password);
//                $mahasiswa->nama = $request->nama;
//                $mahasiswa->nomor_identitas = $request->nomor_identitas;
//
//                $mahasiswa->save();

                DB::commit();

                //  Format Return Response Resource
                //  return [
                //      'status' => $this->status,
                //      'message' => $this->message,
                //      'data' => $data,
                //  ];
                return new ResponseResource(true, 'Update User Mahasiswa ',$mahasiswa );

            } catch (\Exception $e) {
                DB::rollback();

                // Tangani kesalahan dan berikan respons yang sesuai
                //  Format Return Response Resource
                //  return [
                //      'status' => $this->status,
                //      'message' => $this->message,
                //      'data' => $data,
                //  ];
                return new ResponseResource(false, 'Gagal mengupdate user Mahasiswa: ' . $e->getMessage());
            }
        }
        else {
            // Jika pengguna belum terautentikasi, kirim respons error
            return $platform == 'web' ?
                formatResponseResource(false, 'Unauthorized, Please Login' )
                : new ResponseResource(false, 'Unauthorized, Please Login');
        }
    }

    public function destroy($platform = 'api', $id)
    {
        if (Auth::check()) {
            $user = Auth::user();

            // Return Jika Role mahasiswa
            if($user->hasRole('mahasiswa')) {
                return $platform == 'web' ?
                    formatResponseResource(false, 'Tidak Mempunyai Hak Akses' )
                    : new ResponseResource(false, 'Tidak Mempunyai Hak Akses');
            }

            try {

                DB::beginTransaction();
                $user = User::findOrFail($id);
                $mahasiswa = Mahasiswa::findOrFail($user->mahasiswa_id);
                $verif = Verifikasi::findOrFail($mahasiswa->verifikasi_id);
                $file = File::findOrFail($mahasiswa->file_id);
                $hasil_sidang = HasilSidang::find($mahasiswa->hasil_sidang_id);

                if ($hasil_sidang)   $hasil_sidang->delete();
                if ($file)          $file->delete();
                if ($verif) $verif->delete();
                if ($mahasiswa)  $mahasiswa->delete();
                if ($user) $user->delete();

                DB::commit();
                return $platform == 'web' ?
                    formatResponseResource(true, 'User Mahasiswa berhasil dihapus', formatMahasiswaResource($user) )
                    :  new ResponseResource(true, 'User Mahasiswa berhasil dihapus', UserResouces::make($user) );


            } catch (\Exception $e) {
                DB::rollback();

                // Tangani kesalahan dan berikan respons yang sesuai
                return $platform == 'web' ?
                    formatResponseResource(false, 'Gagal menghapus user Mahasiswa: ' . $e->getMessage())
                    : new ResponseResource(false, 'Gagal menghapus user Mahasiswa: ' . $e->getMessage());
            }
        }
        else {
            // Jika pengguna belum terautentikasi, kirim respons error
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
