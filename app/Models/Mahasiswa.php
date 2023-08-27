<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'table_mahasiswa';
    protected $fillable = [
        'prodi',
        'judul_skripsi',
        'nama_dosen1',
        'nama_dosen2',
        'jadwal_pengambilan_ijazah',
        'verifikasi_id',
        'status_id',
//        'sidang_id',
        'file_id',
        'hasil_sidang_akhir_id',
        'hasil_sidang_sempro_id'

    ];
    protected $hidden = [
        'status_id',
//        'sidang_id',
        'file_id',
        'hasil_sidang_id'
    ];
    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }
    public function tahapsidang()
    {
        return $this->belongsTo(TahapSidang::class);
    }
    public function file()
    {
        return $this->belongsTo(File::class);
    }
    public function hasilsidang()
    {
        return $this->belongsTo(HasilSidang::class);
    }
    public function verif()
    {
        return $this->belongsTo(Verifikasi::class, 'verifikasi_id');
    }
}
