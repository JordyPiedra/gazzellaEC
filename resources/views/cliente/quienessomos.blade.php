@extends('layouts.cliente')
@section('content')
 @parent

<br>
   <h1 class="grey-text center">GAZZELLA</h1>
   <div class="parallax-container">
      <div class="parallax"><img class="" src="{{asset('img/gazzella.jpg')}}"></div>
    </div>
    <div class="container  ">
    <br><br>
<div class="row ">

            <div class="">
            <div class="row">
             <div class="col l4   s12">
                <h5 class="orange-text">Información</h5>
                <p>Ubicados en Santo Domingo Ubicados - Ecuador      </p>
                <p>Atención de Lunes a Viernes en nuestros locales de (8:00 - 18:00)      </p>
                <p>Antencín en nuestra tienda online 24 hrs </p>
                <p>Los pedidos se tramitarán en días laborables de lunes a viernes</p>

              </div>
              <div class="col l6 s12">
                <h5 class="orange-text">Tienda de ropa infantil</h5>
                <p class="grey-text ">Gazzella</p>
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d997.4449389395047!2d-79.1712081708014!3d-0.25191599998850245!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMMKwMTUnMDYuOSJTIDc5wrAxMCcxNC40Ilc!5e0!3m2!1ses-419!2sec!4v1503708490387" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                 <img src="{{asset('img/payment_icons.png')}}">
              </div>
             
            </div>
          </div>
  </div>


 
    
  </div>
     <div class="parallax-container">
    <div class="parallax"><img src="{{asset('img/parra1.jpg')}}"></div>
  </div>
  </div>
  </div>
      
  <div class="container">
          <h1 class="header center-on-small-only">GAZZELLA</h1>
          <div class="row center">
            <h4 class="header col s12 light center">VÍSTETE A LA MODA SIN GASTAR DEMÁS</h4>
          </div>
          <div class="row center">
            <a href="/tienda" id="download-button" class="btn-large waves-effect waves-light">Tienda</a>
          </div>
          <div class="row center">
            Es momento de que te atrevas a comprar ropa online y olvidarte de largas filas, Gazzella es la tienda en dónde puedes hacerlo con facilidad y disfrutar de la moda ecuatoriana con la seguridad de que te llegarán artículos de gran calidad y de marcas originales. Podrás disfrutar de una gran catálogo de marcas y estilos con los que podrás armar el outfit de tus sueños sin gastar una fortuna.
          </div>
          <br>

        </div>
          <div class=" center">
    <div class=" "><img src="{{asset('img/banner_ni.jpeg')}}"></div>
  </div>
<div class="container  ">
<div class="row ">
    <h5>Cámbios y devoluciones</h5>
    <p>
  Las prendas tienen cambio por talla y/o color, bajo las siguientes pautas:
<br>Los pantys, bodies, pijamas con panty, ropa interior masculina y productos en promoción, NO podrán ser cambiados (Por normatividad sanitaria o políticas de las fábricas)

<br>Los cambios se realizan dentro de la misma colección en un plazo máximo de 15 días calendario.

<br>Las prendas deben estar limpias, con sus marquillas, etiquetas y empaques originales.

<br>En caso de no haber la referencia en la misma talla o color para cambio se realizará una nota crédito la cual se vera reflejada en un bono para compra en la pagina web.
    </p>
  </div>
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