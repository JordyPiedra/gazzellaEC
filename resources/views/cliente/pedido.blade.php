@extends('layouts.cliente')
@section('content')
 @parent
<div class="container  ">
<br>
<h5>Confirmación de pedido</h5>
  <div class="row ">
    <table>
        <thead>
          <tr>
              <th></th>
              <th></th>
              <th></th>
          </tr>
        </thead>
        <tbody>
        <tr>
          <th>1</th>
          <th>Dirección de envío</th>
          <td>
            <p>{{$cliente->nombre1}} {{$cliente->apellido1}}<p>
            <p>{{$cliente->direccion}}<p>
            <p>{{$cliente->telefono1}}<p>
          </td>
        </tr>
        <tr>
         <th>2</th>
          <th>Método de pago</th>
          <td>
            Transferencia o depósito bancario
          </td>
        </tr>
         <tr>
         <th>3</th>
          <th>Revisa los artículos</th>
          <td>
                <table>
                  <thead>
                    <tr>
                      <th></th>
                      <th>Producto</th>
                      <th>Cantidad</th>
                      <th>Precio</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($detalles as $index=> $detalle)
                    <tr>
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
                          {{$detalle['cantidad']}}
                      </td>
                      <td>${{$detalle['subtotal']}}</td>
                    </tr>

                    @endforeach
                    <tr>
                    <td> </td>
                    <td> </td>
                    <th>Subtotal</th>
                    <td>{{$pedido->subtotal}}</td>
                    </tr>
                    <tr>
                    <td> </td>
                    <td> </td>
                    <th>IVA</th>
                    <td>{{$pedido->totaliva}}</td>
                    </tr>
                    <tr>
                    <td> </td>
                    <td> </td>
                    <th>Total</th>
                    <td>{{$pedido->total}}</td>
                    </tr>
                  </tbody>
                </table>
          </td>
        </tr>
        <tr>
          <th></th>
          <th></th>
          <td>
          <form id="confirmar-form" action="/pedidos/{{$pedido->id}}" method="POST" >
          
          {{csrf_field()}}
            {{ method_field('PUT') }}
            <input id="estado" name="estado" value="confirmado" style="display:none;"/>
            <button class="btn waves-effect waves-light right" type="submit" name="action">Confirmar pedido
            <i class="material-icons right">send</i>
          </button>
            </form>
          </td>
        </tr>
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
  $(document).ready(function(){


     $('.materialboxed').materialbox();
    });
 </script>
 @endsection