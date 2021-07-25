<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLokasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lokasi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')->nullable();
            $table->string('nama_lokasi');
            $table->string('kecamatan');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('jenis_tanah');
            $table->string('curah_hujan');
            $table->string('kemiringan_lereng');
            $table->string('ketinggian_lokasi');
            $table->string('penggunaan_lahan');
            $table->string('tingkat_kerawanan');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lokasi');
    }
}
