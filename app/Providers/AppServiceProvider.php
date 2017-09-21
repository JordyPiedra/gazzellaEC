<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Mail;
use App\User;
use App\Producto;
use App\Pedido;
use App\Detalle;
use App\Kardex;
use App\Mail\UserCreate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);

        User::created(function($user){
            
            Mail::to($user->email)->send(new UserCreate($user));
        });

        Pedido::updated(function($pedido){
            if($pedido->estado==Pedido::ESTADO[2]){
                foreach ($pedido->detalles as $key => $detalle) {
                     $campos=[
                     'producto_id' => $detalle->producto_id,
                     'operacion'   => Kardex::OPERACION_SALIDA,
                     'cantidad'    => $detalle->cantidad,
                     'detalle'     => 'VENTA SEGÚN ORDEN NRO:'.$pedido->orden,
                     'valor_unitario' => 0,
                     'saldo_cantidad' => 0,
                     'saldo_valor'=>0,
                     'total'=>0,
                     'cantidad_contabilizada'=>0
                     ];
                     Kardex::create($campos);
                }
            }
            

        });

        Producto::created(function($producto){
            
            $campos=['producto_id' => $producto->id,
                     'operacion'   => Kardex::OPERACION_ENTRADA,
                     'cantidad'    => $producto->stock,
                     'valor_unitario' => $producto->precio,
                     'saldo_cantidad' => 0,
                     'saldo_valor'=>0,
                     'total'=>0,
                     'cantidad_contabilizada'=>0
            ];
           // Kardex::create($campos);
        });
        Kardex::created(function($kardex){
        $this->calculaKardex($kardex);
        });

        
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
    private function calculaKardex($kardex){
            $lastKardex = Kardex::where('producto_id',$kardex->producto_id)
                                 ->where('id','!=',$kardex->id)
                                 ->orderBy('created_at', 'desc')->first();
            if(count($lastKardex)==0)
            {
                $saldo_cantidad=0;
                $saldo_valor=0;
               
            }
            else
            {
                 $saldo_cantidad=$lastKardex->saldo_cantidad;                     
                 $saldo_valor=$lastKardex->saldo_valor;   
            }
            //Total de la transacciòn
           
           

            if($kardex->operacion ==Kardex::OPERACION_ENTRADA)
            {   
                $kardex->total=($kardex->cantidad*$kardex->valor_unitario);
                $kardex->cantidad_contabilizada=$kardex->cantidad;
                $saldo_cantidad+=$kardex->cantidad;
                $saldo_valor+=$kardex->total;
            }
            else if($kardex->operacion ==Kardex::OPERACION_SALIDA)
            {
                
                
                    $lastInputKardex = Kardex::where('producto_id',$kardex->producto_id)
                                 ->where('id','!=',$kardex->id)
                                 ->where('operacion',Kardex::OPERACION_ENTRADA)
                                 ->where('cantidad_contabilizada','>',0)
                                 ->orderBy('created_at', 'desc')->first();
                    
                if($lastInputKardex->saldo_cantidad>=$kardex->cantidad)                    
                {
                    $faltante=$lastInputKardex->cantidad_contabilizada-$kardex->cantidad;
                    $kardex->valor_unitario=$lastInputKardex->valor_unitario;
                    $lastInputKardex->cantidad_contabilizada-=$kardex->cantidad;
                    if($faltante<0)
                    {
                        $newKardex=[
                        'producto_id' => $kardex->producto_id,
                        'usuario_id' => $kardex->usuario_id,
                        'detalle' => $kardex->detalle,
                        'operacion' => $kardex->operacion,
                        'cantidad' => ($faltante*-1),
                        'valor_unitario' => $kardex->valor_unitario,
                        'saldo_cantidad' => 0,
                        'saldo_valor' => 0,
                        'total' => 0,
                        'cantidad_contabilizada' => 0
                        ];
                        $kardex->cantidad-= abs($faltante);
                        $lastInputKardex->cantidad_contabilizada=0;
                    }
                    $lastInputKardex->save();
                    $kardex->total=($kardex->cantidad*$kardex->valor_unitario);
                    $saldo_cantidad-=$kardex->cantidad;
                    $saldo_valor-=$kardex->total;
                }
                
            } 


            $kardex->saldo_cantidad=$saldo_cantidad;
            $kardex->saldo_valor=$saldo_valor;

            $kardex->save();
            $producto = Producto::findOrFail($kardex->producto_id);
            $producto->stock=$kardex->saldo_cantidad;
            $producto->save();
            if(isset($newKardex))
            Kardex::create($newKardex);
    }
}
