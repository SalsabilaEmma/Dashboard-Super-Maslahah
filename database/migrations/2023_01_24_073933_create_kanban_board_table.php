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
            $table->increments('id');
            //$table->char('nip')->nullable();
            $table->char('status')->nullable();
            $table->char('judul')->nullable();
            $table->text('issues')->nullable();
            $table->date('due_date')->nullable();
            $table->char('priority')->nullable();
            $table->char('sprintpoint')->nullable();
            $table->unsignedBigInteger('idUser');
            $table->foreign('idUser')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
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
