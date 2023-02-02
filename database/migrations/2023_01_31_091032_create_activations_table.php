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
            $table->string('nip', 500)->nullable();
            $table->string('ttl', 500)->nullable();
            $table->string('noHp', 500)->nullable();
            $table->string('noKtp', 500)->nullable();
            $table->string('tipeHp', 500)->nullable();
            $table->string('statusAktivasi', 500)->nullable();
            $table->string('kodeUnik', 500)->nullable();
            $table->string('aksesAbsen', 500)->nullable();
            $table->string('aksesMpay', 500)->nullable();
            $table->string('aksesKpai', 500)->nullable();
            $table->string('aksesKunKer', 500)->nullable();
            $table->string('aksesListPekerjaan', 500)->nullable();
            // $table->dateTime('datetime');
            // $table->string('userAccess', 500)->nullable();
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
