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
        Schema::create('activations', function (Blueprint $table) {
            $table->engine = 'MyISAM';
            $table->bigIncrements('id');
            $table->string('cif', 500)->nullable();
            $table->string('tipeHp', 500)->nullable();
            $table->string('statusAktivasi', 500)->nullable();
            $table->string('kodeUnik', 500)->nullable();
            $table->string('aksesAbsen', 500)->nullable();
            $table->string('aksesMpay', 500)->nullable();
            $table->string('aksesKpai', 500)->nullable();
            $table->string('aksesKunKer', 500)->nullable();
            $table->string('aksesListPekerjaan', 500)->nullable();
            $table->string('nip',50)->nullable();
            // $table->string('userAccess', 500)->nullable();
            // $table->unsignedBigInteger('idPegawai');
            // $table->foreign('idPegawai', 'aktivasi_pegawai_fk')->references('id')->on('pegawais')->onUpdate('cascade')->onDelete('cascade');
            // $table->string('nipPegawai', 100);
            // $table->foreign('nipPegawai')->references('nip')->on('pegawais')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('activations');
    }
};
