@extends('layouts.cliente')

@section('content')
<br>
<div class="container">
    <div class="row  z-depth-2">
     <h5 class="center">Regístrate</h5>
        <div class="col l8 m12 s12 offset-l2">
       
            <div class="panel panel-default">
                
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="/usuarios">
                        {{ csrf_field() }}

                  
 <div class="input-field col s6">
          <input placeholder="Primer Nombre" id="nombre1" value="" name="nombre1" type="text" class="validate">
          <label for="first_name">Nombre 1</label>
        </div>
        
        <div class="input-field col s6">
          <input placeholder="Primer Apellido" id="apellido1" value="" name="apellido1" type="text" class="validate">
          <label for="first_name">Apellido 1</label>
        </div>
       
        <div class="input-field col s6">
          <input placeholder="Segundo Apellido" id="email" value="" name="email" type="email" class="validate">
          <label for="first_name">Email</label>
        </div>
       
      
        <div class="input-field col s6">
          <input placeholder="Dirección" id="direccion" value="" name="direccion" type="text" class="validate">
          <label for="first_name">Dirección</label>
        </div>
        <div class="input-field col s6">
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} ">
                <label for="password" >Contraseña</label>

               
                    <input id="password" type="password" class="form-control" name="password" required>

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
              
            </div>
        </div>
        <div class="input-field col s6">
            <div class="form-group">
                <label for="password-confirm" class="">Confirmar Contraseña</label>

              
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
            
            </div>
        </div>
        
                       

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                    Registrarse
                </button>
            </div>
            <br>
        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<br>
@endsection
