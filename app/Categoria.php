<?php

namespace App;
use App\Producto;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    //
    protected $fillable=['nombre','descripcion'];

    //Relacion
    public function productos(){
        return $this->belongsToMany(Producto::class);
    }
}