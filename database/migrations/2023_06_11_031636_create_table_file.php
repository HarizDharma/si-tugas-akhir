<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableFile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_file', function (Blueprint $table) {
            $table->id();
            $table->string('laporan_pkl')->nullable();
            $table->string('bebas_pkl')->nullable();
            $table->string('kartu_kendali_skripsi')->nullable();
            $table->string('skla')->nullable();
            $table->string('bukti_jurnal')->nullable();
            $table->string('sertifikat_toeic')->nullable();
            $table->string('skkm')->nullable();
            $table->string('pengumpulan_alat')->nullable();
            $table->string('laporan_skripsi')->nullable();
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
        Schema::dropIfExists('table_file');
    }
}
