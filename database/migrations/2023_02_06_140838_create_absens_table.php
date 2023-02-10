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
        Schema::create('absens', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('tanggal');
            // $table->string('nip');
            // $table->string('namaPegawai');
            $table->string('status');
            $table->time('jamMasuk')->nullable();
            $table->time('jamPulang')->nullable();
            $table->string('long')->nullable();
            $table->string('lat')->nullable();
            $table->unsignedBigInteger('idPegawai');
            $table->foreign('idPegawai')->references('id')->on('pegawais')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('absens');
    }
};
