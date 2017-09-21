@extends('layouts.cliente')
@section('content')
 @parent
<div class="container  ">
<br>
<h5><i class="material-icons">shopping_cart</i>Carrito de compras</h5>
  <div class="row ">
  @if (isset($pedidos))
   @if (count($detalles)>0)
    <table>
        <thead>
          <tr>
              <th></th>
              <th></th>
              <th>Producto</th>
              <th>Cantidad</th>
              <th>Precio</th>
          </tr>
        </thead>
        <tbody>
     @foreach ($detalles as $index=> $detalle)
      
          <tr>
          <td><a href="#"
           onclick="event.preventDefault();
                  document.getElementById('delete-pedido-form{{$detalle['id']}}').submit();"
          
          ><i class="material-icons red-text">close</i></a>
          <form id="delete-pedido-form{{$detalle['id']}}" action="/pedidos/{{$detalle['pedido_id']}}/detalles/{{$detalle['id']}}" method="POST" >
           {{csrf_field()}}
          {{ method_field('DELETE') }}
          </form>
          </td>
          <td>
          @if(isset($detalle->producto->imagenes[0]->patch))
          <img src="{{url('productos/'.$detalle->producto->imagenes[0]->patch)}}"  height="60px" alt="" class="materialboxed">
          @endif
          </td>
            <td>
             
              <span class="title">{{$detalle['producto']['nombre']}}</span>
             <p>{{$detalle['producto']['descripcion']}}      </p>
            </td>
            <td>
            <form id="cantidad-form{{$detalle['id']}}" action="/detalles/{{$detalle['id']}}" method="POST" >
            <select class="browser-default" name="cantidad" id="cantidad"
             onchange="event.preventDefault();
                  document.getElementById('cantidad-form{{$detalle['id']}}').submit();"
            >
            @for ($i = 1; $i <= $detalle['producto']['stock']; $i++)
                <option value="{{$i}}" {{($i == $detalle['cantidad'])?'selected':''}}
                  
                >{{$i}}</option>
              @endfor  
            </select>
            {{csrf_field()}}
            {{ method_field('PUT') }}
            </form>
            </td>
            <td>${{$detalle['subtotal']}}</td>
          </tr>
          
        @endforeach
        <tr>
            <td> </td>
            <td> </td>
            <th>Subtotal</th>
            <td>${{$subtotal}}</td>
          </tr>
       </tbody>
 </table>
            <div class="row ">
            <a href="/pedidos/{{$pedido_id}}" class="waves-effect waves-light btn right"> Proceder a pagar</a>
            </div>
         
   
      @endif
      @else
      <h5>Tu carrito de compras está vacío<h5>
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
    
     $('.materialboxed').materialbox();
    });
 </script>
 @endsection