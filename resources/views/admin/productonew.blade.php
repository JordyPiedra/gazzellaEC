@extends('layouts.admin')
@section('content')
 @parent
<div class="container  ">
<br>
  <div class="row s">
  <div class="row">
    <form class="col s12" id="crear-producto" name="guardar" target="_blank" method="POST" action="/adminproductos/">
      <div class="row">
        <div class="input-field col s6">
          <input required placeholder=" Nombre" id="nombre" value="" name="nombre" type="text" class="validate">
          <label for="first_name">Nombre</label>
        </div>
        <div class="input-field col s12">
        <textarea required id="descripcion" name="descripcion" class="materialize-textarea"> </textarea>
          <label for="first_name">Descripción</label>
        </div>
        <div class="input-field col s2">
          <input required placeholder="Stock" id="stock" value="" name="stock" type="text" class="validate">
          <label for="first_name">Stock</label>
        </div>
        
        <div class="input-field col s6">
          <input required placeholder="Precio" id="precio" value="" name="precio" type="number" class="validate">
          <label for="first_name">Precio</label>
        </div>
        <div class="input-field col s3">
          <input required placeholder="Iva" id="iva" value="" name="iva" type="number" class="validate">
          <label for="first_name">IVA</label>
        </div>
     <div class="input-field col s6">
          <select required class="browser-default " id="estado" name="estado">
      <option value="" disabled selected>Elija Estado de producto</option>
      <option value="disponible"   >Disponible</option>
      <option value="no disponible" >No disponible</option>
    </select>
        </div>
          <div class="input-field col s6">
<button class="btn waves-effect waves-light right" type="submit" name="action">Guardar
            <i class="material-icons right">save</i>
          </button>
  </div>
  
     {{csrf_field()}}
      {{ method_field('POST') }}
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