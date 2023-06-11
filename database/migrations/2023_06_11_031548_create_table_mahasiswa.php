<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableMahasiswa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_mahasiswa', function (Blueprint $table) {
            $table->id();
            $table->string('prodi')->nullable();
            $table->string('judul_skripsi')->nullable();
            $table->string('nama_dosen1')->nullable();
            $table->string('nama_dosen2')->nullable();
            $table->dateTime('jadwal_pengambilan_ijazah')->nullable();
            $table->unsignedInteger('status_id')->nullable();
            $table->unsignedInteger('sidang_id')->nullable();
            $table->unsignedInteger('file_id')->nullable();
            $table->unsignedInteger('hasil_sidang_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_mahasiswa');
    }
}
