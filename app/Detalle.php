<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Pedido;
use App\Producto;
use Illuminate\Database\Eloquent\SoftDeletes;
class Detalle extends Model
{
    //Relaciones
    use SoftDeletes;
    protected $dates =['deleted_at'];
    public function pedido(){
        return $this->belongsTo(Pedido::class);
    }
    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
     protected $fillable=[
        'pedido_id',
        'producto_id',
        'cantidad',
        'preciounitario',
        'iva'
    ];

}
