<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TriggerCreate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        DB::unprepared("
            CREATE TRIGGER `productos_AFTER_UPDATE` AFTER UPDATE ON `productos` FOR EACH ROW
            BEGIN
            UPDATE detalles
            SET 
            preciounitario=NEW.precio,
            iva= NEW.iva
            
            WHERE producto_id = NEW.id
            and pedido_id in (select id from pedidos where estado = 'CREADO')
            ;
            END
        ");
         DB::unprepared("
           CREATE  TRIGGER `detalles_BEFORE_UPDATE` BEFORE UPDATE ON `detalles` FOR EACH ROW
            BEGIN
            IF (NEW.deleted_at IS NULL) THEN
            SET NEW.subtotal = (NEW.cantidad*NEW.preciounitario) ;
            SET NEW.totaliva = NEW.subtotal * NEW.iva /100;
            SET NEW.total = NEW.subtotal +NEW.totaliva;

            END IF;
            END
        ");
         DB::unprepared("
          CREATE TRIGGER `detalles_BEFORE_INSERT` BEFORE INSERT ON `detalles` FOR EACH ROW
            BEGIN
            SET NEW.subtotal = (NEW.cantidad*NEW.preciounitario) ;
            SET NEW.totaliva = NEW.subtotal * NEW.iva /100;
            SET NEW.total = NEW.subtotal +NEW.totaliva;
            END
        ");
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
