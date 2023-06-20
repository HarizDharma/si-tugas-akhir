<?php

namespace App\Http\Resources;

use App\Models\File;
use App\Models\HasilSidang;
use App\Models\Status;
use App\Models\TahapSidang;
use App\Models\Verifikasi;
use Illuminate\Http\Resources\Json\JsonResource;

class MahasiswaResources extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'prodi' => $this->prodi,
            'judul_skripsi' => $this->judul_skripsi,
            'nama_dosen1' => $this->nama_dosen1,
            'nama_dosen2' => $this->nama_dosen2,
            'jadwal_pengambilan_ijazah' => $this->jadwal_pengambilan_ijazah == null ? 'Belum Di Jadwalkan' : $this->jadwal_pengambilan_ijazah,
            'sidang_id' =>  $this->sidang_id  == null ? 'Belum Di Jadwalkan' : TahapSidang::find( $this->sidang_id ),
            'file_id' =>  $this->file_id  == null ?  'USER ERROR/TIDAK VALID - MOHON RECREATE AKUN MAHASISWA TERKAIT' : File::find( $this->file_id ),
            'status_id' =>  $this->status_id  == null ? 'USER ERROR/TIDAK VALID - MOHON RECREATE AKUN MAHASISWA TERKAIT' : Status::find( $this->status_id ),
            'hasil_sidang_id' =>  $this->hasil_sidang_id  == null ? 'Belum Ada Hasil Sidang' : HasilSidang::find( $this->hasil_sidang_id ),
            'verifikasi_id' =>  $this->verifikasi_id  == null ?  'USER ERROR/TIDAK VALID - MOHON RECREATE AKUN MAHASISWA TERKAIT' : Verifikasi::find( $this->verifikasi_id ),
        ];
    }
}
