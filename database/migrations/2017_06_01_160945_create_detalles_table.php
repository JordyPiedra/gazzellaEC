<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pedido_id')->unsigned();
            $table->integer('producto_id')->unsigned();
            $table->integer('cantidad')->unsigned();
            $table->decimal('preciounitario',6,2);
            $table->decimal('subtotal',6,2);
            $table->decimal('iva',6,2);
            $table->decimal('totaliva',6,2);
            $table->decimal('total',6,2);
            $table->timestamps();

            $table->foreign('pedido_id')->references('id')->on('pedidos');
            $table->foreign('producto_id')->references('id')->on('productos');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle');
    }
}
