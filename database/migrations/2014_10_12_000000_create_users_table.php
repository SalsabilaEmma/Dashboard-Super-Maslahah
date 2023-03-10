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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name',50);

            // Tambahan
            $table->enum('role', ['Admin', 'Super Admin'])->default('Admin');
            $table->enum('status', ['0', '1'])->default(1);
            // $table->unsignedBigInteger('nipPegawai', 100);
            $table->string('nip',20)->nullable();
            $table->string('telepon',20)->nullable();
            // End Tambahan

            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
