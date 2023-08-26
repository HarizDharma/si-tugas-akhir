<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTableVerifikasi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('table_verifikasi', function (Blueprint $table) {
            $table->dropColumn('verifikasi_panitia');
            $table->tinyInteger('verifikasi_panitia_sempro')->nullable()->default(null);;
            $table->tinyInteger('verifikasi_panitia_sidang_akhir')->nullable()->default(null);;
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
