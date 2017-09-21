Hola {{$user->nombre1}},
Gracias por realizar la compra de la orden Nro: {{$pedido->codigo}}

{{route('verify',$user->verificacion_token)}}
