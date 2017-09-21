@extends('layouts.admin')
@section('content')
 @parent
<div class="container  ">
<br>
<br>
<br>
<div class="row ">
    <form action="/adminproductos" >
    <div class="col s3">
    <input type="text" placeholder="Código de producto" name="codigo" id="codigo" >
    </div>
   
    <div class="col s3">
    
    <button class="btn waves-effect waves-light" type="submit" name="action">
    Buscar
    <i class="material-icons right">search</i>
  </button>

    </div>

    <div class="right">
         <i class="material-icons white-text circle red">trending_down</i> Sin Stock 
         <i class="material-icons white-text circle orange">trending_flat</i> Bajo 
         <i class="material-icons white-text circle green">trending_up</i> Alto
         <button id="btnExport">Export to xls</button>
    </div> 

    </form>
</div>
  <div class="row s">
   @if (count($productos)>0)
    <table class="highlight responsive-table z-depth-2" id="table_wrapper">
        <thead>
          <tr>
              <th>Nro</th>
              <th>Código</th>
              <th>Nombre</th>
              <th>Descripcion</th>
              <th></th>
              <th>Stock</th>
              <th>Estado</th>
              <th>Precio</th>
              <th>Editar</th>
           
          </tr>
        </thead>
        <tbody>
        @foreach ($productos as $index=> $producto)
        
         <tr>

            <td>{{$index+1}}</td>
            <td>{{$producto->codigo}}</td>
            <td>{{$producto->nombre}} </td>
            
            <td>{{$producto->descripcion}}  </td>
             <td>
             @if($producto->stock<1)
              <i class="material-icons white-text circle red">trending_down</i> 
        
             @elseif($producto->stock<=10)
              <i class="material-icons white-text circle orange">trending_flat</i> 
             @else
              <i class="material-icons white-text circle green">trending_up</i> 
             
             @endif
              </td>
            <td>{{$producto->stock}} </td>
             <td>{{$producto->estado}} </td>
             <td>{{$producto->precio}} </td>
           
            </form>
            
            </td>
            <td>
            <a href="/adminproductos/{{$producto->id}}"><i class="material-icons">edit</i></a>
             </td>
          
          </tr>
          
        @endforeach
         
   
        </tbody>
      </table>
      @else
      <h5>No se obtuvo resultados<h5>
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

    $(document).ready(function() {
  $("#btnExport").click(function(e) {
    e.preventDefault();

    //getting data from our table
    var data_type = 'data:application/vnd.ms-excel';
    var table_div = document.getElementById('table_wrapper');
    var table_html = table_div.outerHTML.replace(/ /g, '%20');

    var a = document.createElement('a');
    a.href = data_type + ', ' + table_html;
    a.download = 'exported_table_' + Math.floor((Math.random() * 9999999) + 1000000) + '.xls';
    a.click();
  });
});
 </script>
 @endsection