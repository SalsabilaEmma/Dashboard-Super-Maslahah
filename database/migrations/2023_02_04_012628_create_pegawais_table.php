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
            $table->engine = 'MyISAM';
            $table->id();
            $table->string('nip', 100);
            $table->index('nip', 'nip_index');
            $table->string('noKtp');
            $table->string('nama');
            $table->string('jenisKelamin');
            $table->date('tglLahir');
            $table->string('statusPerkawinan');
            $table->string('alamat');
            $table->string('telepon');
            $table->date('tglMasuk')->nullable();
            $table->string('rekeningTabungan');
            $table->string('penempatan');
            $table->string('statusPegawai');
            $table->string('jabatan');
            $table->string('kantor');
            $table->timestamps();
        });
        // DB::statement('ALTER TABLE pegawais ADD INDEX nip_index (nip);');
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
