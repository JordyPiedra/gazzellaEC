@extends('layouts.admin')
@section('content')
 @parent
<div class="container  ">
<br>
  <div class="row ">
        <h5 class="center">Facturas</h5>
</div>
<div class="row ">
    <form action="/facturas" >
    <div class="col s3">
    <input type="date" value="{{$f1}}" name="fechainicio" id="fechainicio" >
    <label for="fechainicio">Fecha de inicio</label>
    </div>
    <div class="col s3">
    <input type="date" value="{{$f2}}" name="fechafin" id="fechafin" >
    <label for="fechainicio">Fecha de finalización</label>
    </div>
    <div class="col s3">
    
    <button class="btn waves-effect waves-light" type="submit" name="action">
    Buscar
    <i class="material-icons right">search</i>
  </button>

    </div>

    <div class="right">
         <i class="material-icons red-text">remove_circle</i> Anuladas 
         <i class="material-icons green-text">check_circle</i> Confirmadas 

    </div> 

    </form>
</div>
  <div class="row s">
   @if (count($pedidos)>0)
    <table class="highlight responsive-table z-depth-2">
        <thead>
          <tr>
          <th>Nro</th>
              <th>Estado</th>
              
              <th>Código</th>
              <th>Fecha</th>
              <th>Usuario</th>
              <th>Subtotal</th>
              <th>Total IVA</th>
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
         
            <td>
            @if($est==4)
            <i class="material-icons red-text">remove_circle</i></a>
            @else
            <i class="material-icons green-text">check_circle</i></a>
            @endif
            </td>
            <td>{{$pedido->orden}}</td>
            <td>{{$pedido->updated_at->format('Y-m-d')}}</td>
            <td>{{$pedido->cliente->nombre1}} {{$pedido->cliente->apellido1}} </td>
            <td>{{$pedido->subtotal }}</td>
            <td>{{$pedido->totaliva }}</td>
            <td>{{$pedido->total }}</td>
           
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