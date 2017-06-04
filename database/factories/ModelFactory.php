<?php
use App\User;
use App\Producto;
/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'nombre1' => $faker->name,
        'apellido1' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'verificado' => $verificado= $faker->randomElement([User::USUARIO_VERIFICADO, User::USUARIO_NO_VERIFICADO]),
        'verificacion_token' => $verificado == User::USUARIO_VERIFICADO? null : User::generarVerificacionToken(),
        'tipo' => $faker->randomElement([User::USUARIO_ADMINISTRADOR, User::USUARIO_REGULAR]),
    ];
});

$factory->define(App\Categoria::class, function (Faker\Generator $faker) {

    return [
        'nombre' => $faker->word,
        'descripcion' => $faker->paragraph(1),
      
    ];
});

$factory->define(App\Producto::class, function (Faker\Generator $faker) {

    return [
        'nombre' => $faker->word,
        'descripcion' => $faker->paragraph(1),
        'stock' => $faker->numberBetween(1,10),
        'estado' => $faker->randomElement([Producto::PRODUCTO_DISPONIBLE,Producto::PRODUCTO_NO_DISPONIBLE]),
        'precio' => $faker->randomFloat(2,5,100),
        'iva' => 12,

      
    ];
});