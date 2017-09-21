<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::middleware(['auth','admin' ])->group(function () {
/////Rutas administrador


Route::resource('controlfacturas','Admin\AdminPedidosController',['only'=> ['index','show','update']]);
Route::resource('facturas','Admin\FacturasController',['only'=> ['index','show','update']]);
Route::resource('ventas','Ventas\VentasController',['only'=> ['index','show','update']]);
Route::resource('adminproductos','Admin\AdminProductosController',['only'=> ['index','show','create','store','update']]);
Route::resource('usuarios','User\UserController',['only'=> ['index','update','show']]);
Route::resource('producto.kardex','Kardex\KardexController',['only'=> ['index','update','show','create','store']]);
Route::resource('producto.categorias','Admin\ProductoCategoriaController',['only'=> ['index','store']]);

});
Route::resource('producto.imagenes','Admin\ProductoImagenesController',['only'=> ['index','store','destroy']]);

///////////////////////////////////
Route::get('/','HomeController@index');
Route::get('envios-y-pagos','HomeController@enviosypagos');
Route::get('tienda','HomeController@tienda');
Route::get('devoluciones','HomeController@devoluciones');
Route::get('direccion','HomeController@quienessomos')->name('quienessomos');
Route::get('register','HomeController@register')->name('register');



Route::resource('Vendedor','Vendedor\VendedorController',['only'=> ['create','edit']]);
Route::resource('clientes','Cliente\ClienteController',['only'=> ['index','show','update']]);

Route::resource('productos','Producto\ProductoController',['only'=> ['index','show','store']]);
Route::resource('usuarios','User\UserController',['only'=> ['store']]);
Route::resource('categorias','Producto\CategoriaController',['only'=> ['index','show','store']]);



 //Cliente
Route::resource('categorias.subcategorias.productos','Producto\CategoriaProductoController',['only'=> ['index']]);
 //Cliente+ Auth ->middleware('auth');
 Route::middleware(['auth'])->group(function () {
 Route::resource('carrito','Pedido\CarritoController',['only'=> ['index']]);
 Route::resource('pedidos','Pedido\PedidoController',['only'=> ['index','show','update']]);
 Route::resource('detalles','Pedido\DetalleController',['only'=> ['store','update']]);
 Route::resource('pedidos.detalles','Pedido\PedidoDetalleController',['only'=> ['store','index','destroy']]);
 });

 // Authentication Routes...
        $this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
        $this->post('login', 'Auth\LoginController@login');
        $this->post('logout', 'Auth\LoginController@logout')->name('logout');

        // Registration Routes...
        //$this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');

        // Password Reset Routes...
        $this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
        $this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
        $this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
        $this->post('password/reset', 'Auth\ResetPasswordController@reset');



Route::get('/home', 'HomeController@index')->name('home');

Route::name('verify')->get('users/verify/{token}','User\UserController@verify');
Route::name('resend')->get('users/{user}/resend','User\UserController@resend');