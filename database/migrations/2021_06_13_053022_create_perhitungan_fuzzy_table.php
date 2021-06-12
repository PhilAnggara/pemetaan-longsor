<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerhitunganFuzzyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perhitungan_fuzzy', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_lokasi');
            $table->double('jenis_tanah');
            $table->double('curah_hujan');
            $table->double('kemiringan_lereng');
            $table->double('ketinggian_lokasi');
            $table->double('penggunaan_lahan');
            $table->double('kelas_kerawanan');
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
        Schema::dropIfExists('perhitungan_fuzzy');
    }
}
