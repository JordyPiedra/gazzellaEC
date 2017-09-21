@extends('layouts.cliente')
@section('content')
 @parent
<div class="row  ">
<br>
<div class="col s2 ">
    
    <table class="bordered highlight">
        <thead>
          <tr>
              <th><h5>Categorías</h5></th>
   
            
          </tr>
        </thead>

        <tbody>
          <tr>
            <td class='dropdown-button '   data-activates='ninos'>  
            <p >
            <div class="chip">
            <img src="{{asset('img/tienda04.jpg')}}" alt="Contact Person">
            <a href="/categorias/1/subcategorias/1/productos" class="black-text">Niños</a>
            </div></p>
          </tr>
          <tr>
             <tr>
            <td class='dropdown-button ' href='#' data-activates='ninas'>  
            <p >
            <div class="chip">
            <img src="{{asset('img/nina.jpg')}}" alt="Contact Person">
             <a href="/categorias/2/subcategorias/2/productos" class="black-text">Niñas</a>
            </div></p>
          </tr>
          <tr>
            <td class='dropdown-button ' href='#' data-activates='bebes'>  
            <p >
            <div class="chip">
            <img src="{{asset('img/bebe.jpg')}}" alt="Contact Person">
             <a href="/categorias/3/subcategorias/3/productos" class="black-text">Bebés</a>
            </div></p>
          </tr>
          <tr>
             <tr>
            <td class='dropdown-button ' href='#' data-activates='ofertas'>  
            <p >
            <div class="chip">
            <img src="{{asset('img/oferta.jpg')}}" alt="Contact Person">
             <a href="/categorias/4/subcategorias/4/productos" class="black-text">Ofertas</a>
            </div></p>
          </tr>
    
       
        </tbody>
      </table>
  <ul id='ninos' class='dropdown-content'>
    <li><h5 class="center">Niños</h5></li>
    <li class="divider"></li>
    <li>
      <div class="row">
        <div class="col s6 center">
 
<div class="col s12 m7">
<div class="card "  >
<div class="card-image">
<a class="center"   href="/categorias/1/subcategorias/5/productos"><img class="animated  pulse"  width="100%" src="{{asset('img/boy01.jpg')}}"></a>
<span class="card-title black-text">Camiseta <br>Pantalón</span>
</div>

</div>
</div>
        </div>
        <div class="col s6 center">
 
<div class="col s12 m7">
<div class="card">
<div class="card-image">
<a  href="/categorias/1/subcategorias/6/productos" ><img class="animated  pulse"  src="{{asset('img/boy03.jpg')}}"></a>
<span class="card-title black-text">Camiseta <br>Short</span>
</div>

</div>
</div>
        </div>


        </div>

    </li>
    
    
  </ul>  
<ul id='ninas' class='dropdown-content'>
<li><h5 class="center">Niñas</h5></li>
<li class="divider"></li>
<li>
<div class="row">
<div class="col s6 center">

<div class="col s12 m7">
<div class="card "  >
<div class="card-image">
<a  href="/categorias/2/subcategorias/7/productos"><img class="animated  pulse"  src="{{asset('img/girl01.jpg')}}"></a>
<span class="card-title black-text">Conjunto</span>
</div>

</div>
</div>
</div>
<div class="col s6 center">

<div class="col s12 m7">
<div class="card">
<div class="card-image">
<a  href="/categorias/2/subcategorias/8/productos" ><img class="animated  pulse"  src="{{asset('img/girl02.jpg')}}"></a>
<span class="card-title black-text">Vestidos</span>
</div>

</div>
</div>
</div>


</div>

</li>


</ul>   
     <ul id='bebes' class='dropdown-content'>
    <li><h5 class="center">Bebés</h5></li>
    <li class="divider"></li>
    <li>
      <div class="row">
        <div class="col s6 center">
 
<div class="col s12 m7">
<div class="card "  >
<div class="card-image">
<a  href="/categorias/3/subcategorias/9/productos" class="center"><img class="animated  pulse"  width="100%" src="{{asset('img/child1.jpg')}}"></a>
<span class="card-title black-text">Para niñas</span>
</div>

</div>
</div>
        </div>
        <div class="col s6 center">
 
<div class="col s12 m7">
<div class="card">
<div class="card-image">
<a  href="/categorias/3/subcategorias/10/productos" ><img class="animated  pulse"  src="{{asset('img/child2.jpg')}}"></a>
<span class="card-title black-text">Para niños</span>
</div>

</div>
</div>
        </div>


        </div>

    </li>
    
    
  </ul>  
</div>


  <div class="col s9">
  <div class="row ">
    <div class="col s12 m12 l8 ">
      <h5 class="center">{{$producto['nombre']}}</h5>
      <div class="row center">
          <div class="carousel center">
          @foreach ($producto->imagenes as $imagen)
          <a class="carousel-item" href="#"><img  class="" src="{{url('productos/'.$imagen->patch)}}"></a>
           @endforeach
        </div>
      </div>
      <div class="row">
         <h5><i class="material-icons circle grey-text small animated bounceInLeft ">info</i>
         Información del Producto <span class="teal-text animated jello">${{$producto['precio']}}</span></h5>
         <p>{{$producto['descripcion']}}</p>
      </div>
      <div class=" z-depth-1 row grey-text text-darken-2">
         <h5>Tips para el cuidado de tu ropa</h5>
         <p>Nuestras prendas son de álta calidad sin embargo se recomienda tener el respectivo cuidado para una mayor duración de vida, utilizar un secado natural, no utilizar lavadora, no poner a fuego, no lavar a mas de 30 grádos centígrados, no utilizar secadora y no utilizar plancha a altas temperaturas.</p>
      </div>
      <div class="row  z-depth-2">
         <img width="40px" src="{{asset('img/tip1.jpg')}}"/>
         <img width="40px" src="{{asset('img/tip2.jpg')}}"/>
         <img width="40px" src="{{asset('img/tip3.jpg')}}"/>
         <img width="40px" src="{{asset('img/tip4.jpg')}}"/>
         <img width="40px" src="{{asset('img/tip5.jpg')}}"/>
         <img width="40px" src="{{asset('img/tip6.jpg')}}"/>
      </div>



    </div>
    <div class="col s12 m12 l4 ">
       <h5>{{$producto['nombre']}}</h5>
         <p>{{$producto['descripcion']}}</p>
    <ul class="collection">
    @if(isset($producto['precio_anterior']))
    <li class="collection-item avatar animated bounceInLeft">
      <i class="material-icons circle red">attach_money</i>
      <span class="title">Precio Anterior</span>
      <p> <i class="material-icons  red-text">close</i>
      ${{$producto['precio_anterior']}}
      </p>
      </li>
    @endif
      <li class="collection-item avatar animated bounceInLeft">
      <i class="material-icons circle teal lighten-2">attach_money</i>
      <span class="title">Precio</span>
      <p>${{$producto['precio']}}
      </p>
      <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
      </li>
      <li class="collection-item avatar animated bounceInLeft ">
      <i class="material-icons circle teal lighten-2">show_chart</i>
      <span class="title">Talla</span>
      <p>{{$producto['talla']}} </p>
      <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
      </li>
      <li class="collection-item avatar animated bounceInLeft ">
      <i class="material-icons circle teal lighten-2">palette</i>
      <span class="title">Color</span>
      <p>{{$producto['color']}} </p>
      <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
      </li>
       
      <li class="collection-item avatar animated bounceInLeft">
      <i class="material-icons circle teal lighten-2">equalizer</i>
      <span class="title">Stock</span>
      <p> {{$producto['stock']}}</p>
      <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
      </li>
     
    </ul>
 
    <div class="row">
         <a href="#" class="btn "
          onclick="event.preventDefault();
          document.getElementById('cart-form{{$producto['id']}}').submit();"
         ><i class="material-icons left">shopping_cart</i> Agregar al carrito</a>
          <form id="cart-form{{$producto['id']}}" action="/detalles" method="POST" style="display: none;">
                                            {{csrf_field()}}
                                            <input name="producto_id" id="producto_id" value="{{$producto['id']}}"/>
          </form> 
    </div>




    </div>
  </div>
</div>
      
    </div>
</div>
      
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