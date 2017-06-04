<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Vendedor; 
use App\Cliente; 
use App\Detalle; 

class Pedido extends Model
{
    //
    const ESTADO=['CREADO','ESPERA DE PAGO','PAGO CONFIRMADO','DESPACHADO'];

    public function vendedor(){
        return $this->belongsTo(Vendedor::class);
    }

    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }
    public function detalles(){
        return $this->belongsTo(Detalle::class);
    }


    protected $fillable=[
        'vendedor_id',
        'cliente_id',
        'producto_id',
    ];
}
