<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Pedido;
class Detalle extends Model
{
    //Relaciones
    public function pedido(){
        return $this->hasMany(Pedido::class);
    }
}
