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
        Schema::create('kanban_board', function (Blueprint $table) {
            $table->engine = 'MyISAM';
            $table->increments('id');
            $table->string('nip',50)->nullable();
            $table->char('status',100)->nullable();
            $table->char('judul',255)->nullable();
            $table->text('issues')->nullable();
            $table->date('tanggal')->nullable();
            $table->date('due_date')->nullable();
            $table->char('priority',25)->nullable();
            $table->char('sprintpoint',25)->nullable();
            $table->string('userRequest',100)->nullable();
            $table->string('namaUserRequest',100)->nullable();
            // $table->unsignedBigInteger('idUser');
            // $table->foreign('idUser')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('kanban_board');
    }
};
