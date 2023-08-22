<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableHasilSidang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_hasil_sidang', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary(); // Menggunakan unsigned big integer sebagai primary key
            $table->string('dosen_penguji')->nullable();
            $table->string('hasil_sidang')->nullable();
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
        Schema::dropIfExists('table_hasil_sidang');
    }
}
