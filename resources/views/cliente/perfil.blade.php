@extends('layouts.cliente')
@section('content')
 @parent
<div class="container  ">
<br>
  <div class="row s">
  <div class="row">
   <form class="col s12" method="post" id="editarusuario" name="editarusuario" action="/clientes/1">
      <div class="row">
        <div class="input-field col s6">
          <input placeholder="Primer Nombre" id="nombre1" value="{{$usuario->nombre1}}" name="nombre1" type="text" class="validate">
          <label for="first_name">Nombre 1</label>
        </div>
        <div class="input-field col s6">
          <input placeholder="Segundo Nombre" id="nombre2" value="{{$usuario->nombre2}}" name="nombre2" type="text" class="validate">
          <label for="first_name">Nombre 2</label>
        </div>
        <div class="input-field col s6">
          <input placeholder="Primer Apellido" id="apellido1" value="{{$usuario->apellido1}}" name="apellido1" type="text" class="validate">
          <label for="first_name">Apellido 1</label>
        </div>
        <div class="input-field col s6">
          <input placeholder="Segundo Apellido" id="apellido2" value="{{$usuario->apellido2}}" name="apellido2" type="text" class="validate">
          <label for="first_name">Apellido 2</label>
        </div>
        <div class="input-field col s6">
          <input placeholder="Segundo Apellido" id="email" value="{{$usuario->email}}" name="email" type="email" class="validate">
          <label for="first_name">Email</label>
        </div>
        <div class="input-field col s3">
          <input placeholder="Teléfono 1" id="telefono1" value="{{$usuario->telefono1}}" name="telefono1" type="text" class="validate">
          <label for="first_name">Teléfono 1</label>
        </div>
        <div class="input-field col s3">
          <input placeholder="Teléfono 2" id="telefono2" value="{{$usuario->telefono2}}" name="telefono2" type="text" class="validate">
          <label for="first_name">Teléfono 2</label>
        </div>
        <div class="input-field col s3">
          <input placeholder="Ciudad" id="ciudad" value="{{$usuario->ciudad}}" name="ciudad" type="text" class="validate">
          <label for="first_name">Ciudad</label>
        </div>
        <div class="input-field col s9">
          <input placeholder="Dirección" id="direccion" value="{{$usuario->direccion}}" name="direccion" type="text" class="validate">
          <label for="first_name">Dirección</label>
        </div>
        <div class="input-field col s6">
     
  </div>
  
          <div class="input-field col s6">

        <button class="btn waves-effect waves-light right" type="submit" name="action">Guardar
            <i class="material-icons right">save</i>
          </button>
  </div>
  
    {{csrf_field()}}
      {{  method_field('PUT')  }}
    </form>
  </div>
            
  </div>
</div>
      
 <br> 
 <br> 
 <br> 
 <br> 
@endsection
@section('scripts')
 @parent
 <script>
  $(document).ready(function(){
     $('.carousel').carousel({
            dist:0,
            shift:0,
            padding:20,

      });

     $('.materialboxed').materialbox();
    });
 </script>
 @endsection