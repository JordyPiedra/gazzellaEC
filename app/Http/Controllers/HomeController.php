<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
class HomeController extends OpcionesPageController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cliente.index',['navbar' => $this->getNavBarOptions()]);
    }
     public function devoluciones()
    {
        return view('cliente.devoluciones',['navbar' => $this->getNavBarOptions()]);
    }
    public function enviosypagos()
    {
        return view('cliente.enviosypagos',['navbar' => $this->getNavBarOptions()]);
    }
    public function quienessomos()
    {
        return view('cliente.quienessomos',['navbar' => $this->getNavBarOptions()]);
    }
    public function register()
    {
        return view('auth.register',['navbar' => $this->getNavBarOptions()]);
    }
    public function tienda()
    {
              return view('cliente.tienda',['navbar' => $this->getNavBarOptions()]);
    }

}


      
