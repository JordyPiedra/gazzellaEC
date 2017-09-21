<?php

namespace App\Http\Controllers\Pedido;

use Illuminate\Http\Request;
use App\Http\Controllers\OpcionesPageController;
use App\Pedido;
use App\Detalle;
use App\Producto;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class DetalleController extends OpcionesPageController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $usuario_id= Auth::id();   
        $rules=[
            'producto_id' => 'required|integer',
        ];
        $this->validate($request,$rules);

        $campos = $request->all();

        $producto = Producto::findOrFail($campos['producto_id'])->toArray();
        $detalle['producto_id'] = $producto['id'];
        $detalle['cantidad'] = 1;
        $detalle['preciounitario']=$producto['precio'];
        $detalle['iva']=$producto['iva'];

        $pedido = Pedido::where('cliente_id','=',$usuario_id)->
                           where('estado','=',Pedido::ESTADO[0])->first();
        if(count($pedido)==0){
            $pedido['cliente_id']=$usuario_id;
            $pedido['estado']  = Pedido::ESTADO[0];
            $pedido['subtotal']=0;
            $pedido['totaliva']=0;
            $pedido['totaldescuento'] = 0;
            $pedido['total']= 0;
            $pedido = Pedido::create($pedido);
        }
        $detalle['pedido_id'] = $pedido['id'];
        $detalle_=Detalle::create($detalle);
        return redirect()->action('Pedido\CarritoController@index');

    }

  

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $usuario_id= Auth::id();   
        $rules=[
            'cantidad' => 'integer',
        ];
        $this->validate($request,$rules);
        $detalle = Detalle::findOrFail($id);
        if($request->has('cantidad'))
        {
            $detalle->cantidad=$request->cantidad;
            $detalle->save();
        }
         return redirect()->action('Pedido\CarritoController@index');
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
