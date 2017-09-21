<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Pedido;
use App\Producto;
use Illuminate\Database\Eloquent\SoftDeletes;
class Imagenes extends Model
{
    //
    public function producto(){
        return $this->belongsTo(Producto::class);
    }
           protected $table = 'imagenes';

     protected $dates = ['delete_at'];
    protected $fillable=[
        
        'producto_id' ,
        'patch' 
    ];
}
