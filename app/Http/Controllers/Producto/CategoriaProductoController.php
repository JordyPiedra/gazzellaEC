<?php

namespace App\Http\Controllers\Producto;

use App\Categoria;
use App\Producto;
use Illuminate\Http\Request;
use App\Http\Controllers\OpcionesPageController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CategoriaProductoController extends OpcionesPageController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,$primaria,$subcategoria)
    {
        ///Auth::loginUsingId(1);
       $categoriaPrimerNivel =  Categoria::findOrFail($primaria)->toArray();
       $categoriasSegundoNivel = Categoria::findOrFail($primaria)->categoriasHijas()->get()->toArray();
       
       foreach ($categoriasSegundoNivel as $key => $value) {
           $categoriasTercerNivel = Categoria::findOrFail($value['id'])->categoriasHijas()->get()->toArray();
           $categoriasSegundoNivel[$key]['categoriasTercerNivel']=$categoriasTercerNivel;
       }
        $talla=$request->input('talla','%');
        $search=$request->input('search','%');
        $productos =   Categoria::findOrFail($subcategoria)->productos()->where('talla','like',$talla)->where('nombre','like',$search)->get();
          return view('cliente.lista-producto',  
          [
              'categoriaPrimerNivel' => $categoriaPrimerNivel,
              'categoriasSegundoNivel' => $categoriasSegundoNivel  ,
              'productos'=>$productos,
              'categoria' => $subcategoria,
              'navbar' => $this->getNavBarOptions(),
              'talla'=>$talla
          ]
         
          
          );
    

   }
}
