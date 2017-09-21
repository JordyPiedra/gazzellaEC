<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Producto;
use App\User;

class Kardex extends Model
{
      //Relaciones
    use SoftDeletes;
    public function producto()
    {
        return $this->belongsTo(Producto::class);
    } 
    public function usuarios()
    {
        return $this->belongsTo(User::class);
    }
    
    
    const OPERACION_ENTRADA="entrada";
    const OPERACION_SALIDA="salida";
        protected $table = 'kardexes';

     protected $dates = ['delete_at'];
    protected $fillable=[
        'producto_id' ,
        'usuario_id' ,
        'detalle' ,
        'operacion' ,
        'cantidad' ,
        'total',
        'cantidad_contabilizada',
        'valor_unitario' ,
        'saldo_cantidad' ,
        'saldo_valor' ,
    ];
}
