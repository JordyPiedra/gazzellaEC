<?php

namespace App\Http\Controllers\Pedido;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Cliente;
use App\Pedido;
use App\Producto;
use App\Http\Controllers\OpcionesPageController;
use Illuminate\Support\Facades\Auth;

class PedidoController extends OpcionesPageController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       // $this->middleware('auth');
       $usuario_id= Auth::id(); 
       $pedidos = Cliente:: findOrFail($usuario_id)->pedidos()->get()->toArray();
        return view('cliente.lista-pedidos',  
          [
              'pedidos' => $pedidos,
              'navbar' => $this->getNavBarOptions()
          ]
         
          
          );
    }

   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $cliente= Cliente::findOrFail(Auth::id()); 
        $pedido = Pedido:: findOrFail($id);
        if($pedido->cliente_id==$cliente->id)
        {
           
            $pedido->setTotales();
            $pedido->save();
            $detalles = Pedido:: findOrFail($id)->detalles()->get();

            
            //Si esl pedido ya tiene estado 1
           if($pedido->estado == Pedido::ESTADO[0])
           {
              
              return view('cliente.pedido',  
          [
              'cliente' => $cliente,
              'detalles' => $detalles,
              'pedido' => $pedido,
              'navbar' => $this->getNavBarOptions()
          ] );
           } else
           {
                return view('cliente.mensaje-compra',  
                        [
                            'cliente' => $cliente,
                            'pedido' => $pedido,
                           
                            'navbar' => $this->getNavBarOptions()
                        ]
                        
                        
                        );
         
           }            
       
          
         
            
        }
       
    }

   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cliente= Cliente::findOrFail(Auth::id()); 
        $rules=[
            'estado' => 'required|string',
        ];
        $this->validate($request,$rules);
        $campos = $request->all();

        $pedido = Pedido:: findOrFail($id);

        if($cliente->tipo==Cliente::USUARIO_REGULAR)
        {
            
                   if($pedido->cliente_id==$cliente->id)
                   {
                       $pedido->setTotales();
                       $pedido->estado=Pedido::ESTADO[1];
                       if($pedido->orden==null)
                       $pedido->orden =Pedido::generarNumeroOrden();
                       $pedido->save();
                      return view('cliente.mensaje-compra',  
                        [
                            'cliente' => $cliente,
                            'pedido' => $pedido,
                            'navbar' => $this->getNavBarOptions()
                        ]
                        
                        
                        );
                   }
                
        }
   return redirect('/pedidos/'.$pedido->id);
      
         
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
