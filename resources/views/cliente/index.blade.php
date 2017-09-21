@extends('layouts.cliente')
@section('content')
 @parent
<div class="slider  ">
    <ul class="slides">
      <li>
        <img src="{{asset('img/slide1.jpg')}}"> <!-- random image -->
        <div class="caption center-align grey-text  text-darken-2">
          <h3>Conoce nuestras nuevas colecciones</h3>
          <h5 class="light grey-text text-darken-1">Ropa infantil</h5>
        </div>
      </li>
      <li>
          <img src="{{asset('img/slide2.jpg')}}"> <!-- random image -->
        <div class="caption left-align">
          <h3>Colección de temporada</h3>
          <h5 class="light grey-text text-lighten-3">GAZZELLA</h5>
        </div>
      </li>
      <li>
          <img src="{{asset('img/slide3.jpg')}}"> <!-- random image -->
        <div class="caption right-align">
          <h3>Viste a tu niño con lo mejor</h3>
          <h5 class="light grey-text text-lighten-3">GAZZELLA</h5>
        </div>
      </li>
      
    </ul>
    <div class="section white">
    <div class="row container">
      <h2 class="header">Quiénes Somos</h2>
      <p class="grey-text text-darken-3 lighten-3">
      Es una compañía de la industria textil verticalmente integrada especializada en la producción y comercialización de prendas de vestir infantil.

Constituida hace 30 años de origen familiar, en la ciudad de Santo Domingo, Ecuador.

Tenemos dentro de nuestra estructura interna, todos los procesos verticalmente integrados, desde tejeduría, tintorería, estampación, bordado, sublimación, corte, confección, distribución y despacho, lo que nos permite tener una mayor flexibilidad ante los clientes y agilidad en el mercado.      </p>
    </div>
  </div>
  </div>
      <div class="parallax-container">
    <div class="parallax"><img src="{{asset('img/parra1.jpg')}}"></div>
  </div>
  <div class="section white">
    <div class="row container">
    <div class="row">
        <div class="col s12 m6">
          <div class="card  ">
            <div class="card-content grey-text text-darken-3">
            <i class="material-icons large center">account_balance</i>
              <span class="card-title">MISIÓN</span>
              <p>
              
 
Ofrecer a los clientes productos innovadores de primera calidad a bajo costo con una buena Atención y motivar a nuestros empleados para ofrecer un servicio de calidad a todos los clientes. 
              </p>
            </div>
            
          </div>
        </div>

     <div class="col s12 m6">
          <div class="card  ">
            <div class="card-content grey-text text-darken-3">
            <i class="material-icons large center">near_me</i>
              <span class="card-title">VISIÓN</span>
              <p>
 Llegar a ser una de las mejores Empresas Líderes en el mercado muy reconocida con una buena venta de productos de calidad y llegar a distribuir mediante los datos correctos haciendo llegar su pedido al punto exacto a nuestros clientes.
              </p>
            </div>
            
          </div>
        </div>


      </div>
            
    </div>
  </div>
  <div class="parallax-container">
    <div class="parallax"><img src="{{asset('img/parra2.jpg')}}"></div>
  </div>
      
  
@endsection

@section('scripts')
 @parent
<script>
    $(document).ready(function(){
      $('.slider').slider(
        {
          'indicators':false,
          'height' : '750px',
        }
      );
       $('.parallax').parallax();
    });
   </script>
 @endsection