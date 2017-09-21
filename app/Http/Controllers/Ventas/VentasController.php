<?php

namespace App\Http\Controllers\Ventas;

use App\Pedido;
use Illuminate\Http\Request;
use App\Http\Controllers\OpcionesPageController;
use App\Cliente;
use Illuminate\Support\Facades\Auth;


class VentasController extends OpcionesPageController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
       $pedidos = Pedido::whereIn('estado',[Pedido::ESTADO[2],Pedido::ESTADO[3]]);
        return view('admin.lista-ventas',  
          [
              'pedidos' => $pedidos,
              'navbar' => $this->getNavBarOptions()
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function show(Pedido $venta)
    {
       
         return view('admin.pedido',  
          [
            
              'pedido' => $venta,
             
              'navbar' => $this->getNavBarOptions()
          ]
         
          
          );
            
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function edit(Pedido $pedido)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pedido $venta)
    {
        //
        $usuario_id= Auth::id();   
        $rules=[
            'estado' => 'in:'.implode(",",Pedido::ESTADO)
        ];
        $this->validate($request,$rules);
          

        $venta->fill($request->intersect([
            'estado' 
        ]));
        $venta->vendedor_id=$usuario_id;
        $venta2=$venta->save();
        
        return redirect('/controlfacturas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pedido $pedido)
    {
        //
    }
}
