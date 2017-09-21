@extends('layouts.admin')
@section('content')
 @parent
<div class="container  ">
<br>

<a href="/producto/{{$producto->id}}/kardex" class="waves-effect waves-light btn grey"><i class="material-icons left">keyboard_return</i>Regresar</a>
<h5>Registrar Operación</h5>
  <div class="row ">
   <form class="col s12" method="post" id="editarusuario" name="editarusuario" action="/producto/{{$producto->id}}/kardex"  >
      <div class="row">
        <div class="input-field col s5">
          <input placeholder="Primer Nombre" disabled id="producto_nombre" value="{{$producto->nombre}}" name="producto_nombre" type="text" class="validate">
          <label for="first_name">Artículo</label>
        </div>
        <div class="input-field col s7">
          <input required placeholder="Detalle" id="detalle" value=" " name="detalle" type="text" class="validate">
          <label for="detalle">Detalle de operación</label>
        </div>
        <div class="input-field col s4">
          <select class="browser-default " required name="operacion" id="operacion">
            <option value="" disabled selected>Elija operacion</option>
            <option value="{{$entrada}}"   >Entrada</option>
            <option value="{{$salida}}" >Salida</option>
          </select>
        </div>
        <div class="input-field col s4">
          <input  required placeholder="Cantidad" id="cantidad"  name="cantidad" type="text" class="validate">
          <label for="first_name">Cantidad</label>
        </div>
        <div class="input-field col s4">
          <input  required placeholder="Valor Unitario"   id="valor_unitario"  value="" name="valor_unitario" type="text" class="validate">
          <label for="first_name">Valor Unitario</label>
        </div>
       
    
  </div>
  
          <div class="input-field col s6">

        <button class="btn waves-effect waves-light right" type="submit" name="action">Guardar
            <i class="material-icons right">save</i>
          </button>
  </div>
  
    {{csrf_field()}}
      {{  method_field('POST')  }}
    </form>
 
            
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


     $('.materialboxed').materialbox();
    });
 </script>
 @endsection