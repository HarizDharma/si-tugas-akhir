<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TahapSidang extends Model
{
    use HasFactory;

    protected $table = 'table_tahap_sidang';
    protected $fillable = [
        'nama_sidang',
        'tanggal_sidang'
    ];

    public function mahasiswa() {
        return $this->hasMany(Mahasiswa::class);
    }


}
