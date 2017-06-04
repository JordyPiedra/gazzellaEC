<?php

namespace App;
use App\Categoria;
use App\Imagenes;
use App\Pedido;
use Illuminate\Database\Eloquent\Model;


class Producto extends Model
{
    //Relaciones
    public function categorias(){
        return $this->belongsToMany(Categoria::class);
    }
    public function imagenes(){
        return $this->hasMany(Imagenes::class);
    }
    public function pedidos(){
        return $this->hasMany(Pedido::class);
    }
  

    const PRODUCTO_DISPONIBLE="disponible";
    const PRODUCTO_NO_DISPONIBLE="no disponible";
    protected $fillable=[
        'precio',
        'codigo',
        'nombre',
        'descripcion',
        'stock',

    ];

    private function disponlible(){
        return $this->status == Producto::PRODUCTO_DISPONIBLE;
    }
}
