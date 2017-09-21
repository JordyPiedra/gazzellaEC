@extends('layouts.admin')
@section('content')
 @parent
<div class="container  ">
<br>
  <div class="row s">
   @if (count($usuarios)>0)
    <table class="highlight responsive-table z-depth-2">
        <thead>
          <tr>
              <th>Nro</th>
              <th>Usuario</th>
              <th>Email</th>
              <th>Tipo</th>
              <th>Editar</th>
              <th></th>
          </tr>
        </thead>
        <tbody>
        @foreach ($usuarios as $index=> $usuario)
        
         <tr>

            <td>{{$index+1}}</td>
            <td>{{$usuario->nombre1}} {{$usuario->apellido1}} </td>
            
            <td>{{$usuario->email}}  </td>
            <td>{{$usuario->tipo}} </td>
           
            {{csrf_field()}}
            {{ method_field('PUT') }}
            </form>
            
            </td>
            <td><a href="/usuarios/{{$usuario->id}}"><i class="material-icons">edit</i></a></td>
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