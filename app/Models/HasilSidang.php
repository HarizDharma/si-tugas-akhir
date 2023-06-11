<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilSidang extends Model
{
    use HasFactory;
    protected $table = 'table_hasil_sidang';

    protected $fillable = [
        'dosen_penguji',
        'hasil_sidang'
    ];

    public function mahasiswa() {
        return $this->hasMany(Mahasiswa::class);
    }

}
