@extends('layouts.cliente')
@section('content')
 @parent
 <style>
 .textselect{

font-weight: bold;
 }
 td{
   padding:0px;
 }
 </style>
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
    <div class="parallax-container">
      <div class="parallax"><img class="" src="{{asset('img/tienda04.jpg')}}"></div>
    </div>
 
  </div>
 <div class="row">
   <div class="col s6 animated slideInUp">
<img src="{{asset('img/tienda01.jpg')}}" width="100%"> 
 
  </div>
  <div class="col s6 animated slideInUp">
<img src="{{asset('img/tienda02.jpg')}}" width="100%"> 
 
  </div>
  </div>

  </div>  

  </div>
 
  
@endsection
@section('scripts')
 @parent
 <script>
  $(document).ready(function(){
      $('.parallax').parallax();
    });
        
 </script>
 @endsection