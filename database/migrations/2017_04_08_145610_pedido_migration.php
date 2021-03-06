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
            $table->integer('id_estado');
            $table->integer('pagado');//0 = pagado
            $table->integer('id_valoracion_pedido');
            $table->integer('id_tienda');
            $table->integer('id_cliente');
            $table->integer('id_repartidor')->default(0);
            $table->integer('id_direccion');
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
