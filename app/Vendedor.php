<?php

namespace App;
use App\Pedido;

class Vendedor extends User
{
    //
    public function pedidos(){
        return $this->hasMany(Pedido::class);
    }
}
