<?php

namespace Database\Seeders;

use App\Models\File;
use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Dummy 10 Mahasiswa
        for($i = 0; $i < 20; $i++) {
            $file = File::create([
                'laporan_pkl' => null,
                'bebas_pkl' => null,
                'kartu_kendali_skripsi' => null,
                'skla' => null,
                'bukti_jurnal' => null,
                'sertifikat_toeic' => null,
                'skkm' => null,
                'pengumpulan_alat' => null,
            ]);

            $mahasiswa = Mahasiswa::create([
                'prodi' => 'D4 Jaringan Telekomunikasi Digital',
                'judul_skripsi' =>  $faker->sentence(),
                'nama_dosen1' => $faker->name(),
                'nama_dosen2' => $faker->name(),
                'jadwal_pengambilan_ijazah' => null,
                'status_id' => 1,
                'sidang_id' => null,
                'file_id' => $file->id,
                'hasil_sidang_id' => null,
            ]);

            User::create([
                'username' => $faker->userName,
                'password' => bcrypt('mahasiswa'),
                'nama' => $faker->name(),
                'nomor_identitas' => $faker->unique()->numerify('##########'),
                'role' => 'mahasiswa',
                'mahasiswa_id' => $mahasiswa->id,
            ])->attachRole('mahasiswa');

        }

        // dumy 1 panitia
        User::create([
            'username' => $faker->userName,
            'password' => bcrypt('panitia'),
            'nama' => $faker->name(),
            'nomor_identitas' => $faker->unique()->numerify('#####################'),
            'role' => 'panitia',
            'mahasiswa_id' => 0,
        ])->attachRole('panitia');
// dumy 1 akademik
        User::create([
            'username' => $faker->userName,
            'password' => bcrypt('akademik'),
            'nama' => $faker->name(),
            'nomor_identitas' => $faker->unique()->numerify('#####################'),
            'role' => 'akademik',
            'mahasiswa_id' => 0,
        ])->attachRole('akademik');
    }
}
