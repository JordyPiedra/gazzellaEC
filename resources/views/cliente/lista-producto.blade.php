@extends('layouts.cliente')
@section('content')
 @parent
 <style>
 .textselect{

font-weight: bold;
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
  <div class="row">

  <div class="col s4">
 <form action =  "" >
   
     <i class="material-icons prefix">search</i>
          <input type="text" name="search" id="autocomplete-input" class="autocomplete">
          <label for="autocomplete-input">Buscar</label>
      
   </form>
 </div>
  <div class="col s4">
  <span>Tallas</span>
  <form id="frmtalla" name="frmtalla" action =  "" >
    <select name="talla" class="browser-default"
    onchange="event.preventDefault();
          document.getElementById('frmtalla').submit();"
    >
      <option value=""   disabled  @if($talla=='%') selected @endif>Seleccione talla</option>
      <option  @if($talla=='0') selected @endif value="0">0</option>
      <option  @if($talla=='1') selected @endif  value="1">1</option>
      <option  @if($talla=='2') selected @endif value="2">2</option>
      <option  @if($talla=='3') selected @endif value="3">3</option>
      <option  @if($talla=='4') selected @endif value="4">4</option>
      <option  @if($talla=='5') selected @endif value="5">5</option>
      <option  @if($talla=='6') selected @endif value="6">6</option>
      <option  @if($talla=='7') selected @endif  value="7">7</option>
      <option  @if($talla=='8') selected @endif value="8">8</option>
    </select>
  
 
   <button   type="submit" style="display:none" ></button>
  
   </form>
    </div>

  
  </div>
    <div class="">
   
  <?php
 
  foreach ($productos as $key => $value) {
    echo $key==0? '<div class="row"> ':'' ;
    echo
'
<div class="col s12 m6 l4">
 
        <div class="card ">
        <div class="card-image">
          <div class="slider">
          <ul class="slides" >';
          foreach ($value->imagenes as $key2 => $imagen) {
             echo ' 
          <li>
          <img   src="'.url('productos/'.$imagen->patch).'"> <!-- random image -->
          </li>';
            }
         echo '

          </ul>
          </div>
          <form id="cart-form'.$value['id'].'" action="/detalles" method="POST" style="display: none;">
                                            '.csrf_field().'
                                            <input name="producto_id" id="producto_id" value="'.$value['id'].'"/>
   </form> 
        <a class="btn-floating halfway-fab waves-effect waves-light red"
        onclick="event.preventDefault();
          document.getElementById('."'".'cart-form'.$value['id']."'".').submit();"
        ><i class="material-icons">add_shopping_cart</i></a>
        </div>
        <div class="card-content">
        <span class="card-title center"><a class="teal-text text-lighten-2" href="/productos/'.$value['id'].'">'.$value['nombre'].'</a></span>
          <p>'.$value['descripcion'].'</p>
          <span class="card-title center">$'.$value['precio'].'</span>
          
        </div>
        </div>
  
</div>
';
    echo ($key+1)%3==0?'</div><div class="row">':'' ;
    echo ($key)==count($productos)?'</div>':'' ;
  }
  ?>
     
    </div>    
  </div>

  </div>
      
  
@endsection
@section('scripts')
 @parent
 <script>
  $(document).ready(function(){
      $('.slider').slider(
        {
          'indicators':true,
          'height' : '90%',
        }
      );
    });
 </script>
 @endsection