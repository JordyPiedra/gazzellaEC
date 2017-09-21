@extends('layouts.admin')
@section('content')
 @parent
<div class="container  ">
<br>
  <div class="row ">
 <a onclick="filter('a1');" class="waves-effect waves-light btn grey lighten-2 grey-text text-darken-4"><i class="material-icons left">pan_tool</i>Espera de pago</a>
 <a onclick="filter('a2');"  class="waves-effect waves-light btn grey lighten-2 grey-text text-darken-4"><i class="material-icons left">payment</i>Por Despachar</a>
        
</div>
  <div class="row s">
   @if (count($pedidos)>0)
    <table class="highlight responsive-table z-depth-2">
        <thead>
          <tr>
              <th>Nro</th>
              <th>Código</th>
              <th>Fecha</th>
              <th>Usuario</th>
              
              <th>Total</th>
              <th>Estado</th>
              <th></th>
          </tr>
        </thead>
        <tbody>
        @foreach ($pedidos->get() as $index=> $pedido)
        <?php
            $est=array_search($pedido->estado,$estados);
                 
            ?>
         <tr class="a{{$est}}">

            <td>{{$index+1}}</td>
            <td>{{$pedido->orden}}</td>
            <td>{{$pedido->updated_at->format('Y-m-d')}}</td>
            <td>{{$pedido->cliente->nombre1}} {{$pedido->cliente->apellido1}} </td>
            
            <td>{{$pedido->total }}</td>
            <td>
              <form id="cantidad-form{{$pedido->id}}" action="/ventas/{{$pedido->id}}" method="POST" >
            <select class="browser-default" name="estado" id="estado"
             onchange="event.preventDefault();
                  document.getElementById('cantidad-form{{$pedido->id}}').submit();"
            >
            
            <option value="{{$estados[$est]}}" selected >{{$estados[$est]}}</option>
            <option value="{{$estados[$est+1]}}" >{{$estados[$est+1]}}</option>
            @if(($est+1)!=count($estados))
            <option value="{{$estados[count($estados)]}}" >{{$estados[count($estados)]}}</option>
             @endif
            </select>
            {{csrf_field()}}
            {{ method_field('PUT') }}
            </form>
            
            </td>
            <td><a href="/ventas/{{$pedido->id}}"><i class="material-icons">launch</i></a></td>
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
    filter('a1');
     $('.carousel').carousel({
            dist:0,
            shift:0,
            padding:20,

      });

     $('.materialboxed').materialbox();
    });
   function filter(estado){
     if(estado=='a1')
     {
      $('.a1').show();
      $('.a2').hide();
     }else{
       $('.a2').show();
      $('.a1').hide();
     }
   } 
 </script>
 @endsection