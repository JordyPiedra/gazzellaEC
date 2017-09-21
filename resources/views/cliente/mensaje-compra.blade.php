@extends('layouts.cliente')
@section('content')
 @parent
<div class="container  ">
<br>
<div class="row ">
    <h5>Compra confirmada</h5>
    <h5>Orden: {{$pedido->orden}}</h5>
    <h5>Total: ${{$pedido->total}}</h5>
    <p>Esimado cliente su compra ha sido confirmada por favor realizar el depósito o transferencia
     en una de las siguientes cuentas 
    </p>
    <div class="divider  "></div>
    <p>PICHINCHA (Ahorros) : XXXXXXXXXXX </p>
    <p>BOLIVARIANO (Corriente) : XXXXXXXXXXX </p>
    <p>AUSTRO (Ahorros) : XXXXXXXXXXX </p>
<br>
    <p>Una vez realizado el pago envíenos un correo a ventas@gacella.com con el recibo de pago y describiendo
    el número de orden de su pedido {{$pedido->orden}}</p>

    <br>
    <br>
    <br>
    <p>
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
                  @foreach ($pedido->detalles as $index=> $detalle)
                    <tr>
                      <td><img src="{{asset('img/cloth1.jpg')}}"  height="60px" alt="" class="materialboxed"></td>
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
   El envío en Ecuador tarda 2-4 días hábiles, otros países 4-8 días hábiles.<br>

En cada envío el cliente debe asumir el valor del flete.<br>

Después de haberse realizado el pago o consignación; el producto será enviado en un plazo de 2-4 días hábiles con alguna excepción el pedido puede demorarse 1 ó 2 días más, enviando al cliente constancia del despacho y factura de venta vía electrónica al correo suministrado.

    </p>
  </div>

  </div>
      
  
@endsection