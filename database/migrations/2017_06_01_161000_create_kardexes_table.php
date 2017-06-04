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
            $table->integer('vendedor_id')->unsigned();
            $table->string('operacion')->default(Kardex::OPERACION_ENTRADA);
            $table->integer('cantidad')->unsigned();
            $table->integer('saldo')->unsigned();
            $table->timestamps();

            $table->foreign('producto_id')->references('id')->on('productos');
            $table->foreign('vendedor_id')->references('id')->on('usuarios');
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
