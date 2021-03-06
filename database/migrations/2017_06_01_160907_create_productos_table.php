<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Producto;
class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo')->nullable();
            $table->string('nombre');
            $table->string('descripcion',1000)->nullable();
            $table->string('talla');
            $table->string('color');
            $table->integer('stock')->default(0);
            $table->string('estado')->default(Producto::PRODUCTO_DISPONIBLE);
            $table->decimal('precio',6,2);
            $table->decimal('precio_anterior',6,2)->nullable();
            $table->decimal('iva',6,2);
            $table->timestamps();
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
        Schema::dropIfExists('productos');
    }
}
