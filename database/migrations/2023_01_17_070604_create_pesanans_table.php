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
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_mobil');
            $table->foreignId('id_user');
            $table->date('tgl_sewa');
            $table->date('tgl_kembali');
            $table->string('tambahan')->nullable();
            $table->string('status', 20)->default('menunggu');
            $table->timestamps();

            $table->foreign('id_mobil')->references('id')->on('mobils');
            $table->foreign('id_user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pesanans');
    }
};
