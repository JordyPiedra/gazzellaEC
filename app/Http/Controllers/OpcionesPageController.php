<?php

namespace App\Http\Controllers;
use App\Categoria;
use Illuminate\Http\Request;

class OpcionesPageController extends Controller
{
    public function getNavBarOptions(){
        
          $categorias =  Categoria::whereNull('categoria_padre')->get()->toArray();
          foreach ($categorias as $key => $value) {
            $categorias[$key]['segundoNivel'] =  Categoria::findOrFail($value['id'])->categoriasHijas()->get()->toArray();
                    
                    foreach ( $categorias[$key]['segundoNivel'] as $key2 => $value2) {
                    ($categorias[$key]['segundoNivel'])[$key2]['tercerNivel'] =  Categoria::findOrFail($value2['id'])->categoriasHijas()->get()->toArray();
                    
                    }
          }
          return $categorias;
       //$categoriasSegundoNivel = Categoria::findOrFail($primaria)->categoriasHijas()->get()->toArray();
        
    }
}