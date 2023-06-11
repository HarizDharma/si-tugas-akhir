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
            'nama_status' => 'Belum Progress'
        ]);
        $status = Status::create([
            'nama_status' => 'Sudah Sempro'
        ]);
        $status = Status::create([
            'nama_status' => 'Sudah Sidang dan Mengulangi'
        ]);
        $status = Status::create([
            'nama_status' => 'Sudah Sidang dan Tidak Mengulangi'
        ]);
    }
}
