<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilSidangAkhir extends Model
{
    use HasFactory;
    protected $table = 'table_hasil_sidang_akhir';
    protected $fillable = [
        'dosen_penguji1',
        'hasil_sidang_penguji1',
        'dosen_penguji2',
        'hasil_sidang_penguji2',
        'dosen_penguji3',
        'hasil_sidang_penguji3',

    ];

    public function mahasiswa() {
        return $this->hasMany(Mahasiswa::class);
    }
}
