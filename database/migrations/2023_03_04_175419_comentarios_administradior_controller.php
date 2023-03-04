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
        Schema::create('cometarioAdministrador', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->id('id_comentario');
            $table->unsignedBigInteger('ticket_id');
            $table->integer('tipo'); // 1 = comentario para auxiliar, 2 = comentario para cliente
            $table->string('comentario');
            $table->timestamps();
            $table->foreign("ticket_id")
            ->references("id_ticket")
            ->on("tickets")
            ->onDelete("cascade");
        });
    }
    public function down()
    {
        //
    }
};
