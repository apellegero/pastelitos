<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PedidoMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedido', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha_entrega');
            $table->double('precio_total', 7,2);
            $table->double('precio_iva', 7,2);
            $table->datetime('fecha_pedido');
            $table->integer('id_estado');
            $table->boolean('pagado_ha_nosotros');
            $table->integer('id_valoracion_pedido');
            $table->integer('id_usuario');
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
        Schema::dropIfExists('pedido');
    }
}
