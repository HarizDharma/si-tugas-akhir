<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;
    protected $table = 'table_status';

    protected $fillable = [
        'nama_status'
    ];

    public function mahasiswa() {
        return $this->hasMany(Mahasiswa::class);
    }

}
