<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ValoracionPedidoMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('valoracion_pedido', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nota');
            $table->text('motivos');
            $table->integer('id_pedido');
            $table->integer('id_tienda'); //id tienda es el id user de la tienda (no borrar)
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
        Schema::dropIfExists('valoracion_pedido');
    }
}
