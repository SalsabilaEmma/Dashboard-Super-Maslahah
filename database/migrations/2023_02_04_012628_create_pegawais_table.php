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
            $table->string('nip',20)->nullable();
            $table->index('nip', 'nip_index')->nullable();
            $table->string('noKtp',20)->nullable();
            $table->string('nama',50)->nullable();
            $table->string('jenisKelamin',20)->nullable();
            $table->date('tglLahir')->nullable();
            $table->string('statusPerkawinan',20)->nullable();
            $table->string('alamat',255)->nullable();
            $table->string('telepon',15)->nullable();
            $table->date('tglMasuk')->nullable();
            $table->string('rekeningTabungan',20)->nullable();
            $table->string('penempatan',50)->nullable();
            $table->string('statusPegawai',20)->nullable();
            $table->string('jabatan',50)->nullable();
            $table->string('kantor',50)->nullable();
            $table->char('aksesAbsensi',1)->default(1);
            $table->char('aksesMpay',1)->default(1);
            $table->char('aksesRatingNasabah',1)->default(1);
            $table->string('kodeAO',10)->nullable();
            $table->string('usernameAO',20)->nullable();
            $table->string('cabang',10)->nullable();
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
