<?php

namespace App\Http\Controllers\Admin;

use App\Pedido;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
class FacturasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $f1=$request->input('fechainicio',Carbon::today());
        $f2=$request->input('fechafin', Carbon::today());
        if($f1 =="" || $f2=="")
        {
            $f1=Carbon::today();
            $f2=Carbon::today();
        }
        
          $pedidos = Pedido::whereIn('estado',[Pedido::ESTADO[2],Pedido::ESTADO[3],Pedido::ESTADO[4]])
          ->whereDate('created_at', '>=', $f1)
          ->whereDate('created_at', '<=', $f2)
          ;
       $estados= Pedido::ESTADO;
       unset($estados[0]);
        return view('admin.lista-facturas',  
          [
              'pedidos' => $pedidos,
              'estados' => $estados,
              'f1'=>$f1,
              'f2'=>$f2
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
     * @param  \App\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function show(Pedido $pedido)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pedido  $pedido
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
     * @param  \App\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pedido $pedido)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pedido $pedido)
    {
        //
    }
}
