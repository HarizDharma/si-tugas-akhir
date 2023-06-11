<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;


    protected $table = 'table_file';

    protected $fillable = [
        'laporan_pkl',
        'bebas_pkl',
        'kartu_kendali_skripsi',
        'skla',
        'bukti_jurnal',
        'sertifikat_toeic',
        'skkm',
        'pengumpulan_alat'
    ];

    public function mahasiswa() {
        return $this->hasMany(Mahasiswa::class);
    }

}
