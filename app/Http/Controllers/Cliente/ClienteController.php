<?php

namespace App\Http\Controllers\Cliente;
use App\Cliente;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\OpcionesPageController;
use Illuminate\Support\Facades\Auth;


class ClienteController extends OpcionesPageController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $cliente= Cliente::findOrFail(Auth::id()); 

               return view('cliente.perfil',  
                        [
                            'usuario' => $cliente,
                            'navbar' => $this->getNavBarOptions()
                        ]);
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
    public function update(Request $request,$id )
    {
        $usuario= Cliente::findOrFail(Auth::id()); 
         $rules=[
           'email' => 'email',
            'tipo' => "in:".User::USUARIO_ADMINISTRADOR.",".User::USUARIO_REGULAR,
           // 'tipo' => "in:admin,buyer",
        ];
        $this->validate($request,$rules);
       
         $usuario->fill($request->intersect([
           'nombre1', 
        'nombre2', 
        'apellido1', 
        'apellido2', 
        'telefono1', 
        'telefono2', 
        'direccion', 
        'pais', 
        'ciudad', 
        'email',
        'tipo'
        ]));
        $usuario->save();
        
         return redirect('/clientes/' );
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
