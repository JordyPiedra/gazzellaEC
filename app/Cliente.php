<?php

namespace App;
use App\Pedido;

class Cliente extends User
{
    //
    public function pedidos(){
        return $this->hasMany(Pedido::class);
    }
}
