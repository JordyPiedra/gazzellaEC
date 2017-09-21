@extends('layouts.admin')
@section('content')
 @parent
<div class="container  ">
<br>
  <div class="row s">
   @if (count($pedidos)>0)
    <table class="highlight responsive-table z-depth-2">
        <thead>
          <tr>
              <th>Nro</th>
              <th>Orden</th>
              <th>Fecha</th>
              <th>Producto</th>
              
              <th>Cantidad</th>
              <th>Precio U.</th>
              <th>Total IVA</th>
              <th>Total</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($pedidos->get() as $index=> $pedido)
        @foreach ($pedido->detalles as $i=> $detalle)
         <tr>

            <td>{{$index+1}}</td>
            <td>{{$pedido->orden}}</td>
            <td>{{$pedido->updated_at->format('Y-m-d')}}</td>
            <td>{{$detalle->producto->nombre}}</td>
            <td>{{$detalle->cantidad}}</td>
            <td>{{$detalle->preciounitario}}</td>
            <td>{{$detalle->totaliva}}</td>
            <td>{{$detalle->total}}</td>
          </tr>
          @endforeach
        @endforeach
         
   
        </tbody>
      </table>
      @else
      <h5>No registra pedidos<h5>
      @endif

            
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