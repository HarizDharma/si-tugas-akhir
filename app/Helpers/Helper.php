<?php
use App\Models\File;
use App\Models\HasilSidang;
use App\Models\Mahasiswa;
use App\Models\Status;
use App\Models\TahapSidang;
use App\Models\Verifikasi;

if (!function_exists('isRequestBladeView')) {
    function isRequestBladeView()
    {
        $acceptHeader = request()->header('Accept');

        return !request()->wantsJson() && ! request()->isJson();
    }
}




if (!function_exists('formatLoginResource')) {

    function formatLoginResource($user) {
        return [
            'id' => $user->id,
            'nama' => $user->nama,
            'nomor_identitas' => $user->nomor_identitas,
            'role' => $user->role,
            'username' => $user->username,
            'mahasiswa_id' => $user->when($user->role == 'mahasiswa', function () use ($user) {
                // Pastikan $user disertakan dalam fungsi closure dengan use ($user)
                $mhs = Mahasiswa::find($user->mahasiswa_id);
                return [
                    'prodi' => $mhs->prodi,
                    'judul_skripsi' => $mhs->judul_skripsi,
                    'nama_dosen1' => $mhs->nama_dosen1,
                    'nama_dosen2' => $mhs->nama_dosen2,
                    'jadwal_pengambilan_ijazah' => $mhs->jadwal_pengambilan_ijazah == null ? 'Belum Di Jadwalkan' : $mhs->jadwal_pengambilan_ijazah,
                    'sidang_id' =>  $mhs->sidang_id  == null ? 'Belum Di Jadwalkan' : TahapSidang::find($mhs->sidang_id),
                    'file_id' =>  $mhs->file_id  == null ?  'USER ERROR/TIDAK VALID - MOHON RECREATE AKUN MAHASISWA TERKAIT' : File::find($mhs->file_id),
                    'status_id' =>  $mhs->status_id  == null ? 'USER ERROR/TIDAK VALID - MOHON RECREATE AKUN MAHASISWA TERKAIT' : Status::find($mhs->status_id),
                    'hasil_sidang_id' =>  $mhs->hasil_sidang_id  == null ? 'Belum Ada Hasil Sidang' : HasilSidang::find($mhs->hasil_sidang_id),
                    'verifikasi_id' =>  $mhs->verifikasi_id  == null ?  'USER ERROR/TIDAK VALID - MOHON RECREATE AKUN MAHASISWA TERKAIT' : Verifikasi::find($mhs->verifikasi_id),
                ];
            }),
            'created_at' => $user->created_at,
            'modified_at' => $user->modified_at,
        ];
    }

}

if (!function_exists('formatResponseResource')) {
    function  formatResponseResource($status, $message, $data = []) {

        //  Format Return Response Resource
        return [
            'status' => $status,
            'message' => $message,
            'data' => $data,
        ];

    }
}
if (!function_exists('formatMahasiswaResource')) {
    function  formatMahasiswaResource($user) {
        //  Format Return Response Resource
        return [
            'id' => $user->id,
            'nama' => $user->nama,
            'nomor_identitas' => $user->nomor_identitas,
            'role' => $user->role,
            'username' => $user->username,
            'mahasiswa_id' => $user->when($user->role == 'mahasiswa', function () use ($user) {
                // Pastikan $user disertakan dalam fungsi closure dengan use ($user)
                $mhs = Mahasiswa::find($user->mahasiswa_id);
                return [
                    'prodi' => $mhs->prodi,
                    'judul_skripsi' => $mhs->judul_skripsi,
                    'nama_dosen1' => $mhs->nama_dosen1,
                    'nama_dosen2' => $mhs->nama_dosen2,
                    'jadwal_pengambilan_ijazah' => $mhs->jadwal_pengambilan_ijazah == null ? 'Belum Di Jadwalkan' : $mhs->jadwal_pengambilan_ijazah,
                    'sidang_id' =>  $mhs->sidang_id  == null ? 'Belum Di Jadwalkan' : TahapSidang::find($mhs->sidang_id),
                    'file_id' =>  $mhs->file_id  == null ?  'USER ERROR/TIDAK VALID - MOHON RECREATE AKUN MAHASISWA TERKAIT' : File::find($mhs->file_id),
                    'status_id' =>  $mhs->status_id  == null ? 'USER ERROR/TIDAK VALID - MOHON RECREATE AKUN MAHASISWA TERKAIT' : Status::find($mhs->status_id),
                    'hasil_sidang_id' =>  $mhs->hasil_sidang_id  == null ? 'Belum Ada Hasil Sidang' : HasilSidang::find($mhs->hasil_sidang_id),
                    'verifikasi_id' =>  $mhs->verifikasi_id  == null ?  'USER ERROR/TIDAK VALID - MOHON RECREATE AKUN MAHASISWA TERKAIT' : Verifikasi::find($mhs->verifikasi_id),
                ];
            }),
            'created_at' => $user->created_at,
            'modified_at' => $user->modified_at,
        ];

    }
}



if (!function_exists('formatPanitiaResource')) {
    function  formatPanitiaResource($user) {
        //  Format Return Response Resource
        return [
            'id' => $user->id,
            'nama' => $user->nama,
            'nomor_identitas' => $user->nomor_identitas,
            'role' => $user->role,
            'username' => $user->username,
            'mahasiswa_id' => $user->when($user->role == 'mahasiswa', function () use ($user) {
                // Pastikan $user disertakan dalam fungsi closure dengan use ($user)
                $mhs = Mahasiswa::find($user->mahasiswa_id);
                return [
                    'prodi' => $mhs->prodi,
                    'judul_skripsi' => $mhs->judul_skripsi,
                    'nama_dosen1' => $mhs->nama_dosen1,
                    'nama_dosen2' => $mhs->nama_dosen2,
                    'jadwal_pengambilan_ijazah' => $mhs->jadwal_pengambilan_ijazah == null ? 'Belum Di Jadwalkan' : $mhs->jadwal_pengambilan_ijazah,
                    'sidang_id' =>  $mhs->sidang_id  == null ? 'Belum Di Jadwalkan' : TahapSidang::find($mhs->sidang_id),
                    'file_id' =>  $mhs->file_id  == null ?  'USER ERROR/TIDAK VALID - MOHON RECREATE AKUN MAHASISWA TERKAIT' : File::find($mhs->file_id),
                    'status_id' =>  $mhs->status_id  == null ? 'USER ERROR/TIDAK VALID - MOHON RECREATE AKUN MAHASISWA TERKAIT' : Status::find($mhs->status_id),
                    'hasil_sidang_id' =>  $mhs->hasil_sidang_id  == null ? 'Belum Ada Hasil Sidang' : HasilSidang::find($mhs->hasil_sidang_id),
                    'verifikasi_id' =>  $mhs->verifikasi_id  == null ?  'USER ERROR/TIDAK VALID - MOHON RECREATE AKUN MAHASISWA TERKAIT' : Verifikasi::find($mhs->verifikasi_id),
                ];
            }),
            'created_at' => $user->created_at,
            'modified_at' => $user->modified_at,
        ];

    }
}




if (!function_exists('formatAkademikResource')) {
    function  formatAkademikResource($user) {
        //  Format Return Response Resource
        return [
            'id' => $user->id,
            'nama' => $user->nama,
            'nomor_identitas' => $user->nomor_identitas,
            'role' => $user->role,
            'username' => $user->username,
            'mahasiswa_id' => $user->when($user->role == 'mahasiswa', function () use ($user) {
                // Pastikan $user disertakan dalam fungsi closure dengan use ($user)
                $mhs = Mahasiswa::find($user->mahasiswa_id);
                return [
                    'prodi' => $mhs->prodi,
                    'judul_skripsi' => $mhs->judul_skripsi,
                    'nama_dosen1' => $mhs->nama_dosen1,
                    'nama_dosen2' => $mhs->nama_dosen2,
                    'jadwal_pengambilan_ijazah' => $mhs->jadwal_pengambilan_ijazah == null ? 'Belum Di Jadwalkan' : $mhs->jadwal_pengambilan_ijazah,
                    'sidang_id' =>  $mhs->sidang_id  == null ? 'Belum Di Jadwalkan' : TahapSidang::find($mhs->sidang_id),
                    'file_id' =>  $mhs->file_id  == null ?  'USER ERROR/TIDAK VALID - MOHON RECREATE AKUN MAHASISWA TERKAIT' : File::find($mhs->file_id),
                    'status_id' =>  $mhs->status_id  == null ? 'USER ERROR/TIDAK VALID - MOHON RECREATE AKUN MAHASISWA TERKAIT' : Status::find($mhs->status_id),
                    'hasil_sidang_id' =>  $mhs->hasil_sidang_id  == null ? 'Belum Ada Hasil Sidang' : HasilSidang::find($mhs->hasil_sidang_id),
                    'verifikasi_id' =>  $mhs->verifikasi_id  == null ?  'USER ERROR/TIDAK VALID - MOHON RECREATE AKUN MAHASISWA TERKAIT' : Verifikasi::find($mhs->verifikasi_id),
                ];
            }),
            'created_at' => $user->created_at,
            'modified_at' => $user->modified_at,
        ];

    }
}
