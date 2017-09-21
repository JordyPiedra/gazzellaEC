@extends('layouts.cliente')
@section('content')
 @parent
<div class="container  ">
<br>
<div class="row ">
<h4 class="center"><i class="material-icons large green-text">check_circle</i></h4>
    <h5>Estimado {{$nombre1}}</h5>
    
    <p>
   Gracias por registrarse en Gazzella - Tienda Online,
   Te hemos enviado un enlace de verificaciòn al correo {{$email}} 
   Por favor siga las instrucciones.
    </p>
  </div>
  </div>
      
  
@endsection