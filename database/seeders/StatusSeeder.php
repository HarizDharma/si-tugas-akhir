<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $status = Status::create([
            'nama_status' => 'Belum Progress/Proses Mendaftar Sempro'
        ]);
        $status = Status::create([
            'nama_status' => 'Sudah Daftar Sempro'
        ]);
        $status = Status::create([
            'nama_status' => 'Sudah Sidang Sempro dan Mengulangi'
        ]);
        $status = Status::create([
            'nama_status' => 'Sudah Sidang Sempro dan Tidak Mengulangi'
        ]);
        $status = Status::create([
            'nama_status' => 'Sudah Daftar Sidang Akhir'
        ]);
        $status = Status::create([
            'nama_status' => 'Sudah Sidang dan Mengulangi'
        ]);
        $status = Status::create([
            'nama_status' => 'Sudah Sidang dan Tidak Mengulangi'
        ]);
        $status = Status::create([
            'nama_status' => 'Sudah Mengambil Ijazah'
        ]);
    }
}
