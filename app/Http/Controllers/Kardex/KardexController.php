<?php

namespace App\Http\Controllers\Kardex;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Producto;
use App\Kardex;

class KardexController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth');
        //$this->middleware('can:');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Producto $producto)
    {
        
         return view('admin.lista-kardex',  
          [
              'producto'=>$producto,
              'entrada' => Kardex::OPERACION_ENTRADA,
              'salida'  => Kardex::OPERACION_SALIDA,
          ]
         
          
          );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Producto $producto)
    {
       return view('admin.kardex',  
          [
             'producto'=>$producto,
              'entrada' => Kardex::OPERACION_ENTRADA,
              'salida'  => Kardex::OPERACION_SALIDA,
          ]
         
          
          );
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
            
            'operacion' => 'required|in:'.Kardex::OPERACION_ENTRADA.','.Kardex::OPERACION_SALIDA,
            'detalle' => 'required',
            'cantidad' => 'integer|required',
            'valor_unitario' => 'integer|required',
        ];
        //$this->validate($request,$rules);
        $campos=$request->only([
            'operacion' ,
            'detalle' ,
            'cantidad' ,
            'valor_unitario' ,
            ]);
            $campos['producto_id'] = $producto->id;
        $campos['saldo_cantidad'] = 0;
        $campos['saldo_valor'] = 0;
        $campos['total'] = 0;
        $campos['cantidad_contabilizada'] = 0;
            Kardex::create($campos);
             return redirect('/producto/'.$producto->id.'/kardex');
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
    public function update(Request $request, $id)
    {
        //
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
