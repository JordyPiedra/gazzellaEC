<?php

namespace App;
use App\Producto;
use App\Categoria;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    //
    protected $fillable=['nombre','descripcion','categoria_padre'];

    //Relacion
    public function productos(){
        return $this->belongsToMany(Producto::class)->wherePivot('deleted_at',null);
    }
    public function categoriaPadre(){
        return $this->hasOne(Categoria::class, 'categoria_padre');
    }
    public function categoriasHijas(){
        return $this->hasMany(Categoria::class, 'categoria_padre');
    }
    public function productos_disponibles(){
        //return $this->productos()->where();
    }

}
