<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\OpcionesPageController;
use App\User;

class UserController extends OpcionesPageController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $usuarios=User::all();
         return view('admin.lista-usuarios',  
          [
              'usuarios'=>$usuarios,
            
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
        $rules=[
            'nombre1'=> 'required', 
        
        'apellido1'=> 'required', 
        'direccion'=> 'required', 
    
         
        'email'=> 'required',
            'password' => 'required|min:6|confirmed'
        ];

        $this->validate($request,$rules);

        $campos = $request->all();

        $campos['password'] = bcrypt($request->password);
        $campos['verificado'] = User::USUARIO_NO_VERIFICADO;
        $campos['verificacion_token'] = User::generarVerificacionToken();
        $campos['tipo'] = User::USUARIO_REGULAR;
        $usuario = User::create($campos);
        return view('cliente.registroexitoso',['navbar' => $this->getNavBarOptions(), 'nombre1' => $usuario->nombre1,
        'email' => $usuario->email]
        
        );
    }

    public function verify($token){
        $user = User:: where('verificacion_token',$token)->firstOrFail();
        $user->verificado=  User::USUARIO_VERIFICADO;
        $user->verificacion_token=null;
        $user->save();
        return 'La cuenta ha sido verificada exitosamente, para regresar de click en el siguiente <a href="'.route('home').'">enlace </a>';
    }
    public function resend(User $user){
        if ($user->isVerified())
        return 'Este usuario ya ha sido verificado';
        
        Mail::to($user)->send(new UserCreated($user));
        return 'El correo de verificación se ha reenviado';
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $usuario = User::findOrFail($id);
          return view('admin.perfil',  
          [
              'usuario'=>$usuario,
            
          ]
          );
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
    public function update(Request $request, User $usuario)
    {


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
        
         return redirect('/usuarios/'.$usuario->id);

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
