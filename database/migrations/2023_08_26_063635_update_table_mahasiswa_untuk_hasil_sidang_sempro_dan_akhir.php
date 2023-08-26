<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTableMahasiswaUntukHasilSidangSemproDanAkhir extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('table_mahasiswa', function (Blueprint $table) {
            $table->dropColumn('hasil_sidang_id');
            $table->unsignedInteger('hasil_sidang_sempro_id')->nullable()->default(null);;
            $table->unsignedInteger('hasil_sidang_akhir_id')->nullable()->default(null);;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
