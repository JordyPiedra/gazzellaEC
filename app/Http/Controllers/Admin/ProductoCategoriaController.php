<?php

namespace App\Http\Controllers\Admin;

use App\Producto;
use App\Categoria;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ProductoCategoria;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductoCategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Producto $producto)
    {
        return view('admin.lista-categorias',  
          [
              'producto'=>$producto,
              'categorias' => Categoria::all(),
          ]
          
          );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Producto $producto)
    {
         $rules =[
            
            'categoria_id' => 'integer|required',
        ];
        //$this->validate($request,$rules);
        $campos=$request->only([
            'categoria_id' ,
            ]);
        $campos['producto_id'] = $producto->id;
        $productoCategoria = ProductoCategoria::withTrashed()->where('categoria_id',$campos['categoria_id'])
                                ->where('producto_id',$campos['producto_id'])->first();
         //dd($productoCategoria);                               
        if(count($productoCategoria)>0)
        {
            if ($productoCategoria->trashed())
                {
                   $productoCategoria->restore();
                }else
                $productoCategoria->delete();

        }else
      ProductoCategoria::create($campos);
       return redirect('/producto/'.$producto->id.'/categorias');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        //
    }
}
