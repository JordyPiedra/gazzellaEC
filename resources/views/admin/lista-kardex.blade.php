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
<h5 class="center">KARDEX {{$producto->nombre}}</h5>
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

    <table class="highlight responsive-table z-depth-2">
        <thead>
          <tr>
              <th  rowspan="2" >Nro</th>
              <th  rowspan="2" >Fecha</th>
              <th  rowspan="2" >Detalle</th>
              <th colspan="3" class="center" >Entradas</th>
              <th colspan="3" class="center" >Salidas</th>
              <th colspan="3" class="center" >Existencias</th>
          </tr>
          <tr>
              <th>Cantidad</th>
              <th>Valor U.</th>
              <th>Total</th>
               <th>Cantidad</th>
              <th>Valor U.</th>
              <th>Total</th>
               <th>Cantidad</th>
              <th>Total</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($producto->kardex as $key=> $kardex)
        <tr>
            <td>{{$key+1}}</td>
            <td>{{$kardex->created_at->format('Y-m-d')}}</td>
            <td>{{$kardex->detalle}}</td>
            @if($kardex->operacion == $entrada)
            <td>{{$kardex->cantidad}}</td>
            <td>{{$kardex->valor_unitario}}</td>
            <td>{{$kardex->cantidad*$kardex->valor_unitario}}</td>
            <td></td>
            <td></td>
            <td></td>
            @elseif($kardex->operacion == $salida)
            <td></td>
            <td></td>
            <td></td>
            
            <td>{{$kardex->cantidad}}</td>
            <td>{{$kardex->valor_unitario}}</td>
            <td>{{$kardex->cantidad*$kardex->valor_unitario}}</td>
            @endif
            <td>{{$kardex->saldo_cantidad}}</td>
            <td>${{$kardex->saldo_valor}}</td>
        </tr>
        @endforeach
        
        </tbody>     
     </table>
         
     
  </div>
  <a href="/producto/{{$producto->id}}/kardex/create" class="btn-floating btn-large waves-effect waves-light red right"><i class="material-icons">add</i></a>
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