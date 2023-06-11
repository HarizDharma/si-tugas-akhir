<?php

namespace Database\Seeders;

use App\Models\TahapSidang;
use Illuminate\Database\Seeder;

class TahapSidangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TahapSidang::create([
           'nama_sidang' => 'TAHAP 1 - 2023',
            'tanggal_sidang' => '2023-03-02'
        ]);
        TahapSidang::create([
            'nama_sidang' => 'TAHAP 2 - 2023',
            'tanggal_sidang' => '2023-04-02'
        ]);
        TahapSidang::create([
            'nama_sidang' => 'TAHAP 3 - 2023',
            'tanggal_sidang' => '2023-05-02'
        ]);
        TahapSidang::create([
            'nama_sidang' => 'TAHAP 4 - 2023',
            'tanggal_sidang' => '2023-06-02'
        ]);
    }
}
