@extends('layouts.admin')

@section('content')
 @parent
<div class="container  ">
<br>
 @if(isset($producto))
  <div class="row ">
 <a href="/adminproductos/{{$producto->id}}" class="waves-effect waves-light btn grey lighten-2 grey-text text-darken-4"><i class="material-icons left">beach_access</i>Descipción</a>
 <a href="/producto/{{$producto->id}}/categorias" class="waves-effect waves-light btn grey lighten-2 grey-text text-darken-4"><i class="material-icons left">all_inclusive</i>Categorías</a>
 <a href="/producto/{{$producto->id}}/kardex" class="waves-effect waves-light btn grey lighten-2 grey-text text-darken-4"><i class="material-icons left">list</i>Kardex</a>
        
</div>
@endif
  <div class="row ">
 <h5 class="center" >Descpción del Producto</h5>
</div>

  <div class="row ">
    <form class="col s12" method="post" id="editarproducto" name="editarproducto" @if(isset($producto)) action="/adminproductos/{{$producto->id}}" @else action="/adminproductos/" @endif >
      <div class="row">
       <div class="input-field col s6">
          <input required placeholder="*Código" id="codigo" @if(isset($producto)) value="{{$producto->codigo}}"@endif name="codigo" type="text" class="validate">
          <label for="first_name">Código</label>
        </div>
        <div class="input-field col s6">
          <input required placeholder="*Nombre" id="nombre" @if(isset($producto)) value="{{$producto->nombre}}"@endif name="nombre" type="text" class="validate">
          <label for="first_name">Nombre</label>
        </div>
        
        <div class="input-field col s6">
          <input required placeholder="*Talla" id="talla" @if(isset($producto)) value="{{$producto->talla}}"@endif   name="talla" type="text" class="validate">
          <label for="first_name">Talla</label>
        </div>
        <div class="input-field col s6">
          <input required placeholder="*Color" id="color" @if(isset($producto)) value="{{$producto->color}}"@endif   name="color" type="text" class="validate">
          <label for="first_name">Color</label>
        </div>
        <div class="input-field col s12">
        <textarea id="descripcion" name="descripcion" class="materialize-textarea">@if(isset($producto))  {{$producto->descripcion}} @endif   </textarea>
          <label for="first_name">Descripción</label>
        </div>
        <div class="input-field col s3">
          <input required placeholder="*Precio"  step="any"  id="precio" @if(isset($producto)) value="{{$producto->precio}}"@endif    name="precio" type="number" class="">
          <label for="first_name">Precio de venta</label>
        </div>
        <div class="input-field col s3">
          <input  placeholder="Precio Anterior" id="precio_anterior" @if(isset($producto)) value="{{$producto->precio_anterior}}"@endif  name="precio_anterior"  step="any"  type="number" class="">
          <label for="first_name">Precio Anterior</label>
        </div>
        <div class="input-field col s3">
          <input required placeholder="*Iva"  step="any" id="iva" @if(isset($producto)) value="{{$producto->iva}}" @endif   name="iva" type="number" class="validate">
          <label for="iva">IVA %</label>
        </div>
     <div class="input-field col s6">
          <select  required class="browser-default" id="estado" name="estado">
                <option value="" disabled selected>Elija Estado de producto</option>
      <option value="disponible" @if(isset($producto)) {{($producto->estado=='disponible')?'selected':''}} @endif  >Disponible</option>
      <option value="no disponible" @if(isset($producto))  {{($producto->estado=='no disponible')?'selected':''}} @endif  >No disponible</option>
    </select>
        </div>
          <div class="input-field col s6">
{{csrf_field()}}
      {{isset($producto)? method_field('PUT') : method_field('POST')}}
         <button class="btn waves-effect waves-light right" type="submit" name="action">Guardar
            <i class="material-icons right">save</i>
          </button>
  </div>
  
    
    </form>

            
  </div>
</div>
 @if(isset($producto))
<div class="row">
        <form name="frmimages" method="POST" action="/producto/{{$producto->id}}/imagenes" enctype="multipart/form-data">
        <div class="col s8">
    <div class="file-field input-field">
      <div class="btn">
        <span>Subir Imagen</span>
        <input type="file" id="image" name="image"  >
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate"  type="text">
      </div>
      {{csrf_field()}}
      {{method_field('POST')}}
    </div>

    </div>

     <div class="col s4">
      <button class="btn waves-effect waves-light left" type="submit" name="action">
            <i class="material-icons">save</i>
          </button>
          </div>
  </form>
  </div>
   @endif
  <div class="row">
   @if(isset($producto))
    @foreach ($producto->imagenes as $imagen)
    <div class="col s4">
       <img class="materialboxed" width="250" src="{{url('productos/'.$imagen->patch)}}">

      <form name="frmdeleteimages"  method="POST" action="/producto/{{$producto->id}}/imagenes/{{$imagen->id}}/" >
      {{csrf_field()}}
      {{method_field('DELETE')}}
      <button class=" " type="submit" name="action">
            <i class="material-icons red-text">close</i>
          </button>
     
  </form>
    </div>      
     @endforeach
     @endif
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