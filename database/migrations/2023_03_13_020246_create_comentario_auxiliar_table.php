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
        Schema::create('comentarioAuxiliar', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->id('id_comentario');
            $table->unsignedBigInteger('ticket_id');
            $table->string('comentario');
            $table->timestamps();
            $table->foreign("ticket_id")
            ->references("id_ticket")
            ->on("tickets")
            ->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comentario_auxiliar');
    }
};
