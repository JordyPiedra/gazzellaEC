<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
        <!-- Styles -->
       <!-- Compiled and minified CSS -->
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css">
         <style>
            body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
            }

            main {
            flex: 1 0 auto;
            }
            .dropdown-content{
              width:800px;
              font-size:10px;
            }
            .dpwcon{
              width:200px;
              font-size:10px;
            }
         </style>
    </head>
 
        
    <body>
    <header>
      <nav class="red-text">
    <div class="nav-wrapper red lighten-1">
      <a href="/" class="brand-logo grey-text text-lighten-2">GAZZELLA</a>
       
      <ul id="nav-mobile" class="right hide-on-med-and-down ">
    
          <li><a href="/" class="dropdown-button  grey-text text-lighten-2" data-activates=""  >Conócenos</a></li>
          <li><a href="/direccion" class="dropdown-button  grey-text text-lighten-2" data-activates=""  >Dónde Estamos</a></li>
          <li><a href="/tienda" class="dropdown-button  grey-text text-lighten-2" data-activates=""  >Tienda</a></li>
          
        @if (Auth::guest())
                            <li><a  class="  grey-text text-lighten-2" href="{{ route('login') }}">Login</a></li>
                            <li><a  class="  grey-text text-lighten-2"  href="{{ route('register') }}">Regístrate</a></li>
                        @else
                        <li><a href="/carrito" class="  grey-text text-lighten-2" ><i class="material-icons left">shopping_cart</i>Carrito</a></li>
                        <li><a href="/clientes" class="dropdown-button  grey-text text-lighten-2" data-activates="dropdownperfil" ><i class="material-icons left">face</i>{{ Auth::user()->nombre1 }}</a></li>
                          <ul id='dropdownperfil' class='dropdown-content dpwcon'>
                           <li>
                                        <a href="/pedidos/"
                                          >
                                            Ordenes
                                        </a>

                                    </li>
                                     @if(Auth::user()->tipo=="admin")
                                    <li >
                                        <a href="/ventas/">
                                            Administración
                                        </a>

                                    </li>
                                    @endif
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                   
                                </ul>
                          
                        @endif

        
      </ul>
       <div class="row">
       
        </div>
        <!-- Dropdown Structure -->
         @foreach ($navbar as $option)
          <ul id='dropdown{{$option['nombre']}}' class='dropdown-content'>
            <div class="row">
             @foreach ($option['segundoNivel'] as $OpcionSegundoNivel)
              <div class="col l4 s12">
                 <ul>
                  <li><a class="grey-text text-darken-3" href="/categorias/{{$option['id']}}/subcategorias/{{$OpcionSegundoNivel['id']}}/productos"><b>{{$OpcionSegundoNivel['nombre']}}</b></a></li>
                  @foreach ($OpcionSegundoNivel['tercerNivel'] as $OpcionTercerNivel)
                  
                    <li><a class="grey-text text-darken-3" href="/categorias/{{$option['id']}}/subcategorias/{{$OpcionTercerNivel['id']}}/productos">{{$OpcionTercerNivel['nombre']}}</a></li>
                  @endforeach
                </ul>
              </div>
              @endforeach
            </div>
          </ul>
      @endforeach
     
    </div>
  </nav>
  </header>
  
  <main>
 
            @yield('content')
        
  </main>
  <footer class="page-footer orange lighten-5">
          
          <div class="footer-copyright">
            <div class="container grey-text ">
            © <?php echo date("Y")?>  Copyright Text
            <a class="grey-text right" href="#!">Santo Domingo - Ecuador</a>
            </div>
          </div>
        </footer>

  <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>
   <script>
   $('.dropdown-button').dropdown({
      inDuration: 300,
      outDuration: 225,
      constrainWidth: false, // Does not change width of dropdown to that of the activator
      hover: true, // Activate on hover
      gutter: 0, // Spacing from edge
      belowOrigin: true, // Displays dropdown below the button
      alignment: 'left', // Displays dropdown with edge aligned to the left of button
      stopPropagation: false // Stops event propagation
    }
  );

  
   
        
   </script>
@section('scripts')
   
 @show
    </body>
    
   
            
</html>
