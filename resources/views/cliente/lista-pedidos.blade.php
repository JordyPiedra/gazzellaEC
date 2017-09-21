@extends('layouts.cliente')
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
              <th>Código</th>
              <th>Total</th>
              <th>Estado</th>
              <th></th>
          </tr>
        </thead>
      
        <tbody>
        @foreach ($pedidos as $index=> $pedido)
         <tr>
            <td>{{$index+1}}</td>
            <td>{{$pedido['orden']}}</td>
            <td>{{$pedido['total']}}</td>
            <td>{{$pedido['estado']}}</td>
            <td><a href="/pedidos/{{$pedido['id']}}"><i class="material-icons">launch</i></a></td>
          </tr>
          
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