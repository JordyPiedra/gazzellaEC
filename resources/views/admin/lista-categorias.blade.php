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
<h5 class="center">Categorías</h5>
<div class="row s12 "> 
 <table class="highlight responsive-table z-depth-2">
       
          <tr>
              <th>Articulo:</th>
              <td>{{$producto->nombre}}</td>
              <th>Estado</th>
              <td>{{$producto->estado}}</td>
              <th>Stock</th>
              <td>{{$producto->stock}}</td>
          </tr>
          <tr>
              <th>Descripción</th>
              <td colspan="25">{{$producto->descripcion}}</td>
              
          </tr>
       
     </table>
</div>
  <div class="row s12">

    <table class="highlight bordered responsive-table z-depth-2">
        <thead>
          <tr>
              <th class="" >Nro</th>
              <th class="center" >Categoría</th>
              <th class="center" >Seleccion</th>
          </tr>
          
        </thead>
        <tbody>
       <?php $count=0;?>
        @foreach ($categorias as $key=> $categoria)
       
        @if($categoria->categoria_padre==null)
        <?php $count++;?>
<form id="categoria-form{{$categoria->id}}" name="categoria-form{{$categoria->id}}" action="/producto/{{$producto->id}}/categorias" method="POST" style="display: none;">
        
        <tr>
            <td >{{$count}}</td>
            <td >{{$categoria->nombre}}</td>
             <td class="center">
            
{{csrf_field()}}

<input name="categoria_id" value="{{$categoria->id}}" style="display:none;">
<input  type="checkbox" 
 @foreach($producto->categorias as $key=> $categorias_producto)

 @if($categorias_producto->pivot->categoria_id==$categoria->id)
       checked
       @endif
 @endforeach

value="{{$categoria->id}}" name="categoria_id_" id="categoria{{$categoria->id}}"
 onclick="event.preventDefault();
          document.getElementById('categoria-form{{$categoria->id}}').submit();"
 />
                <label for="categoria{{$categoria->id}}"></label>

             
            </td>
        </tr>
        </form> 
         @foreach ($categorias as $key=> $categoriaSegundoNivel)
        @if($categoriaSegundoNivel->categoria_padre==$categoria->id)
        <?php $count++;?>
<form id="categoria-form{{$categoriaSegundoNivel->id}}" name="categoria-form{{$categoriaSegundoNivel->id}}" action="/producto/{{$producto->id}}/categorias" method="POST" style="display: none;">

        <tr>
            <td >{{$count}}</td>
            <td>&emsp;-{{$categoriaSegundoNivel->nombre}}</td>
             <td class="center">
         {{csrf_field()}}
         <input name="categoria_id" value="{{$categoriaSegundoNivel->id}}" style="display:none;">

        <input type="checkbox" 
         @foreach($producto->categorias as $key=> $categorias_producto)

 @if($categorias_producto->pivot->categoria_id==$categoriaSegundoNivel->id)
       checked
       @endif
 @endforeach
        value="{{$categoriaSegundoNivel->id}}" name="categoria_id_" id="categoria{{$categoriaSegundoNivel->id}}"
        onclick="event.preventDefault();
        document.getElementById('categoria-form{{$categoriaSegundoNivel->id}}').submit();"
        />
            <label for="categoria{{$categoriaSegundoNivel->id}}"></label>

            
        </td>
        </tr>
        </form>

     
        @endif

        
        @endforeach
        
        @endif
        @endforeach
        
        </tbody>     
     </table>
         

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
 
 </script>
 @endsection