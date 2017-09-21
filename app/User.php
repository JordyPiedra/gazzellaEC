<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table='usuarios';
    use Notifiable;

    const USUARIO_VERIFICADO='1';
    const USUARIO_NO_VERIFICADO='0';

    const USUARIO_ADMINISTRADOR='admin';
    const USUARIO_REGULAR='buyer';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    protected $fillable = [
        'nombre1', 
        'nombre2', 
        'apellido1', 
        'apellido2', 
        'telefono1', 
        'telefono2', 
        'direccion', 
        'pais', 
        'ciudad', 
        'email',
        'password',
        'verificado',
        'verificacion_token',
        'tipo'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'verificacion_token',
    ];

    public function verificacionCorreo(){
        return $this->verified==User::USUARIO_VERIFICADO;
    }

    public function verificacionAdmin(){
        if ($this->tipo==User::USUARIO_ADMINISTRADOR)
        return true;
        else
        return false;
    }
    public static function generarVerificacionToken(){
        return str_random(40);
    }
    
}
