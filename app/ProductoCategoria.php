<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Producto;
use App\Categoria;

class ProductoCategoria extends Model
{

    use SoftDeletes;
    
    protected $table='categoria_producto';
    protected $dates =['deleted_at'];
    protected $fillable=[
        'producto_id',
        'categoria_id'
    ];
    
    public function producto(){
        return $this->belongsTo(Producto::class);
    }
    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }
}
