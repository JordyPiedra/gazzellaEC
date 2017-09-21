<?php

namespace App\Http\Controllers\Admin;

use App\Producto;
use App\Imagenes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductoImagenesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Producto $producto)
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
    $rules=[
        'image'=>'required|image'
    ];
  // dd($request->file('image'));
    $this->validate($request,$rules);
   
		//obtenemos el campo file definido en el formulario
    $data=[
        'producto_id'=>$producto->id,
        'patch'=> $request->image->store('')
    ];
    Imagenes::create($data);
    return redirect('/adminproductos/'.$producto->id);
        
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
    public function destroy(Producto $producto,Imagenes $imagene)
    {
        dd($imagene);
       $imagene->delete();
     //dd($producto->id);
    // header ("Location: ".'/adminproductos/'.$producto->id);
     //return redirect()->guest('/adminproductos/'.$producto->id)->with('_method', session('url.entended.method', 'GET'));
     return redirect('/adminproductos/'.$producto->id);
    }
}
