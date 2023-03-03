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
        Schema::create('tickets', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->id('id_ticket');
            $table->unsignedBigInteger('auxiliar_id');
            $table->unsignedBigInteger('cliente_id');
            $table->string('problema');
            $table->string('detalles');
            $table->string('estatus');
            $table->timestamps();

            $table->foreign("auxiliar_id")
            ->references("id_auxiliar")
            ->on("auxiliares")
            ->onDelete("cascade");

            $table->foreign("cliente_id")
            ->references("id_cliente")
            ->on("clientes")
            ->onDelete("cascade");
        });
    }


    public function down()
    {
        //
    }
};
