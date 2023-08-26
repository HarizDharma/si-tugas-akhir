<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableHasilSidangSempro extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_hasil_sidang_sempro', function (Blueprint $table) {
            $table->id();
            $table->string('dosen_penguji1')->nullable()->default(null);;
            $table->string('dosen_penguji2')->nullable()->default(null);;
            $table->string('dosen_penguji3')->nullable()->default(null);;

            $table->string('hasil_sidang_penguji1')->nullable()->default(null);;
            $table->string('hasil_sidang_penguji2')->nullable()->default(null);;
            $table->string('hasil_sidang_penguji3')->nullable()->default(null);;
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
        Schema::dropIfExists('table_hasil_sidang_sempro');
    }
}
