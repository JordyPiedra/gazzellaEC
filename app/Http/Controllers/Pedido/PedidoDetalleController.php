<?php

namespace App\Http\Controllers\Pedido;

use App\Pedido;
use App\Detalle;
use App\Cliente;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PedidoDetalleController extends Controller
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
         var_dump($campos = $request->all());
    }


    public function destroy($pedido, $detalle)
    {
        $cliente= Cliente::findOrFail(Auth::id()); 
        $pedido= Pedido::findOrFail($pedido);
        $detalle= Detalle::findOrFail($detalle);

        if($pedido->cliente_id==$cliente->id)
        {
            if($detalle->pedido_id==$pedido->id)
            {
                if($pedido->estado == Pedido::ESTADO[0])
                {
                  $detalle->delete();  
                  return redirect('/carrito');

                }
            }
        }
    }
}
