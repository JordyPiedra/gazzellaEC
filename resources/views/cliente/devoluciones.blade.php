@extends('layouts.cliente')
@section('content')
 @parent
 <div class="container">
          <h1 class="header center-on-small-only">GAZZELLA</h1>
          <div class="row center">
            <h4 class="header col s12 light center">VÍSTETE A LA MODA SIN GASTAR DEMÁS</h4>
          </div>
          <div class="row center">
            <a href="/tienda" id="download-button" class="btn-large waves-effect waves-light">Tienda</a>
          </div>
          <div class="row center">
            Es momento de que te atrevas a comprar ropa online y olvidarte de largas filas, Gazzella es la tienda en dónde puedes hacerlo con facilidad y disfrutar de la moda ecuatoriana con la seguridad de que te llegarán artículos de gran calidad y de marcas originales. Podrás disfrutar de una gran catálogo de marcas y estilos con los que podrás armar el outfit de tus sueños sin gastar una fortuna, además puedes pagar a cuotas mientras disfrutas de tu nuevas prendas.
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