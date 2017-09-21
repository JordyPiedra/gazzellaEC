<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Pedido;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cliente_id')->unsigned();
            $table->integer('vendedor_id')->nullable()->unsigned();
            $table->string('orden')->nullable();
            $table->string('estado')->default(Pedido::ESTADO[0]);
            $table->decimal('subtotal',6,2);
            $table->decimal('totaliva',6,2);
            $table->decimal('totaldescuento',6,2);
            $table->decimal('total',6,2);
            $table->timestamps();

            $table->foreign('cliente_id')->references('id')->on('usuarios');
            $table->foreign('vendedor_id')->references('id')->on('usuarios');
            $table->softDeletes();
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
