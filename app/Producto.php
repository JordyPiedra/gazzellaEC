<?php

namespace App;

use App\Categoria;
use App\Imagenes;
use App\Detalle;
use App\Kardex;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Producto extends Model
{
    //Relaciones
    use SoftDeletes;
    public function categorias()
    {
        return $this->belongsToMany(Categoria::class)->wherePivot('deleted_at',null);
    }
    public function imagenes()
    {
        return $this->hasMany(Imagenes::class);
    }
    public function detalles()
    {
        return $this->hasMany(Detalle::class);
    }
    public function kardex(){
        return $this->hasMany(Kardex::class);
    }

  
    protected $table = 'productos';
    const PRODUCTO_DISPONIBLE="disponible";
    const PRODUCTO_NO_DISPONIBLE="no disponible";
    protected $dates = ['delete_at'];
    protected $fillable=[
        'nombre' ,
        'codigo' ,
        'descripcion' ,
        'talla' ,
        'stock' ,
        'color' ,
        'estado' ,
        'precio' ,
        'precio_anterior' ,
        'iva' 
    ];
    public function getNombreAttribute()
    {
        return strtoupper($this->attributes['nombre']);
    }
    private function disponlible()
    {
        return $this->status == Producto::PRODUCTO_DISPONIBLE;
    }
}
