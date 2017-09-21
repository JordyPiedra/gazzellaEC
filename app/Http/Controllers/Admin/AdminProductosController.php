<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Producto;

class AdminProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
         $codigo=$request->input('codigo');
         if (!$codigo)
         $codigo='%';

          $productos=Producto::where('codigo','like',$codigo)->get();
         return view('admin.lista-productos',  
          [
              'productos'=>$productos,
          ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $producto = new Producto; 
        return view('admin.producto',  
          [
              
          ]);
   

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $rules =[
            'nombre' => 'max:30|required',
            'codigo' => 'max:30|required',
            'descripcion' => 'max:300',
            'talla' => 'string|required',
            'color' => 'string|required',
            'estado' => 'required|in:'.Producto::PRODUCTO_DISPONIBLE.','.Producto::PRODUCTO_NO_DISPONIBLE,
            'precio' => 'numeric|required',
            'precio_anterior' => 'numeric|nullable',
            'iva' => 'numeric|required',
        ];
        //$this->validate($request,$rules);
        
        $campos=$request->only([
            'nombre' ,
            'codigo' ,
            'descripcion' ,
            'talla' ,
            'color' ,
            'stock' ,
            'estado' ,
            'precio' ,
             'precio_anterior' ,
            'iva' ,
        ]);
        $campos['stock'] = 0;

        $producto=Producto::create($campos);
        
      //  return redirect('/adminproductos/'.$producto->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
         $producto = Producto::findOrFail($id);
         
          return view('admin.producto',  
          [
              'producto' => $producto,
          ]
         
          
          );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $adminproducto)
    {
       // die();
        $rules =[
            'nombre' => 'max:30',
            'codigo' => 'max:30',
            'descripcion' => 'max:300',
            'estado' => 'in:'.Producto::PRODUCTO_DISPONIBLE.','.Producto::PRODUCTO_NO_DISPONIBLE,
            'precio' => '',
            'iva' => '',
            'color'=>'',
            'talla'=>'numeric'
            
//Pendiente Validar nùmeros 
        ];
        
        
       // $this->validate($request,$rules);
        
        $adminproducto->fill($request->intersect([
            'nombre' ,
            'descripcion' ,
            'estado' ,
            'talla' ,
            'color' ,
            'precio' ,
            'precio_anterior' ,
            'iva' ,
        ]));
        if( $request->talla == 0 )
        $adminproducto->talla=0;
         
        $adminproducto->save();
        
       
          return redirect('/adminproductos/'.$adminproducto->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
