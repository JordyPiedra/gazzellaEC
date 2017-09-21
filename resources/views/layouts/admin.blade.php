<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

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
    <div class="nav-wrapper grey darken-3 ">
      <a href="/" class="brand-logo white-text">GAZZELLA</a>
       
      <ul id="nav-mobile" class="right hide-on-med-and-down ">
      <li>
      <a class='dropdown-button ' href='#' data-activates='ventas'>Ventas</a>
      </li>
      <ul id='ventas' class='dropdown-content'>
      <li><a href="/controlfacturas"  >Contro Pedidos</a></li>
      <li><a href="/facturas"  >Facturas</a></li>
      <li><a href="/ventas" >Productos vendidos</a></li>
      </ul>
      <li>
      <a class='dropdown-button ' href='#' data-activates='productos'>Productos</a>
      </li>
        <ul id='productos' class='dropdown-content'>
        <li><a href="/adminproductos/create"  >Nuevo Producto</a></li>
        <li><a href="/adminproductos/" >Lista de productos</a></li>
        </ul>

      
      <li><a href="/usuarios/" class="dropdown-button white-text" data-activates="dropdown-ventas"  >Usuarios</a></li>
    
        @if (Auth::guest())
                            <li><a  class=" grey-text" href="{{ route('login') }}">Login</a></li>
                            <li><a  class=" grey-text"  href="{{ route('register') }}">Register</a></li>
                        @else
                        <li><a href="/clientes" class="dropdown-button grey-text" data-activates="dropdownperfil" ><i class="material-icons left">face</i>{{ Auth::user()->nombre1 }}</a></li>
                          <ul id='dropdownperfil' class='dropdown-content dpwcon'>
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
      
  </nav>
  </header>
  
  <main>
 
            @yield('content')
        
  </main>
  <footer class="page-footer orange lighten-5">
         
          <div class="footer-copyright">
            <div class="container grey-text ">
            © <?php echo date("Y")?> Copyright Text
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
      constrainWidth: true, // Does not change width of dropdown to that of the activator
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
