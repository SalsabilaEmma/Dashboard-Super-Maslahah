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
        Schema::create('pegawais', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nip');
            $table->string('noKtp');
            $table->string('nama');
            $table->string('jenisKelamin');
            $table->string('ttl');
            $table->string('statusPerkawinan');
            $table->string('alamat');
            $table->string('telepon');
            $table->string('tglMasuk')->nullable();
            $table->string('rekeningTabungan');
            $table->string('penempatan');
            $table->string('statusPegawai');
            $table->string('jabatan');
            $table->string('kantor');
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
        Schema::dropIfExists('pegawais');
    }
};
