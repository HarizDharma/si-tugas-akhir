<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Verifikasi extends Model
{
    use HasFactory;

    protected $table = 'table_verifikasi';
    protected $fillable = [
        'verifikasi_panitia',
        'verifikasi_akademik'
    ];

    public function mahasiswa() {
        return $this->hasMany(Mahasiswa::class);
    }
}
