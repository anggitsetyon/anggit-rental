<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mitras', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_mobil');
            $table->date('tgl_sewa');
            $table->date('tgl_kembali');
            $table->string('nama_mitra', 50);
            $table->integer('biaya');
            $table->timestamps();

            $table->foreign('id_mobil')->references('id')->on('mobils');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mitras');
    }
};
