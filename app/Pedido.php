<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Vendedor; 
use App\Cliente; 
use App\Detalle; 

class Pedido extends Model
{
    //
    const ESTADO=['CREADO','ESPERA DE PAGO','PAGO CONFIRMADO','DESPACHADO','ANULADA'];

    public function vendedor(){
        return $this->belongsTo(Vendedor::class);
    }

    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }
    public function detalles(){
        return $this->hasMany(Detalle::class);
    }


    protected $fillable=[
        'vendedor_id',
        'cliente_id',
        'orden',
        'estado',
        'subtotal',
        'totaliva',
        'totaldescuento',
        'total'
    ];

    public function setTotales(){
        $detalles=$this->detalles;
        $subtotal=0;
        $totaliva=0;
        $totaldescuento=0;
        $total=0;
        foreach ($detalles as $key => $detalle) {
            $subtotal += $detalle->subtotal;
            $totaliva += $detalle->totaliva;
            $total += $detalle->total;
        }
        $this->attributes['subtotal']=$subtotal;
        $this->attributes['totaliva']=$totaliva;
        $this->attributes['total']=$total;
    }
    public static function generarNumeroOrden(){
        //Generar mientras sea diferente a una orden existente
        return 'ORD-'.str_random(5).rand(1,9).rand(1,9) .rand(1,9) .rand(1,9)  ;
    }
}
