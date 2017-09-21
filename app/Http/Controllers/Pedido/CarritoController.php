<?php

namespace App\Http\Controllers\Pedido;

use App\Detalle;
use App\Pedido;
use App\Producto;
use Illuminate\Http\Request;
use App\Http\Controllers\OpcionesPageController;
use Illuminate\Support\Facades\Auth;


class CarritoController extends OpcionesPageController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
           //
        $usuario_id= Auth::id(); 
        $pedido = Pedido:: where('cliente_id','=' , $usuario_id )
                            ->where('estado','=',Pedido::ESTADO[0])->get()->toArray();
        if(count($pedido)>0)
        {
            $detalles = Pedido:: findOrFail($pedido[0]['id'])->detalles()->get();
            
        $subtotal=0;
        foreach ($detalles as $key => $detalle) {
          //  $detalles[$key]['producto'] = Producto:: findOrFail($detalle['producto_id'])->toArray();
            $subtotal+=$detalle['subtotal'];
        }
         return view('cliente.carrito',  
          [
              'subtotal'=>$subtotal,
              'detalles' => $detalles,
              'pedidos' => $pedido,
              'pedido_id' => $pedido[0]['id'],
              'navbar' => $this->getNavBarOptions()
          ]
         
          
          );
       }
       return view('cliente.carrito',  
          [
      
              'navbar' => $this->getNavBarOptions()
          ]
         
          
          );
    }

    
}
