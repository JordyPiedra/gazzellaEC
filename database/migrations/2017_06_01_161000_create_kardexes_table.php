<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Kardex;

class CreateKardexesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kardexes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('producto_id')->unsigned();
            $table->integer('usuario_id')->unsigned()->nullable();
            $table->string('detalle')->nullable();
            $table->string('operacion')->default(Kardex::OPERACION_ENTRADA);
            $table->integer('cantidad')->unsigned();
            $table->decimal('valor_unitario',6,2);
            $table->decimal('total',6,2);
            $table->integer('saldo_cantidad')->unsigned();
            $table->decimal('saldo_valor',6,2);
            $table->integer('cantidad_contabilizada');
            $table->timestamps();

            $table->foreign('producto_id')->references('id')->on('productos');
            $table->foreign('usuario_id')->references('id')->on('usuarios');
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
        Schema::dropIfExists('kardexes');
    }
}
