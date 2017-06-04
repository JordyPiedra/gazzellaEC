<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Producto;
use App\Categoria;
use App\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        User::truncate();
        Producto::truncate();
        DB::table('categoria_producto')->truncate();    
        $cantidadUsuarios=100;
        $cantidadCategotias=30;
        $cantidadProductos=1000;

        factory(User::class, $cantidadUsuarios)->create();
        factory(Categoria::class, $cantidadCategotias)->create();
        factory(Producto::class, $cantidadProductos)->create()->each(
            function($producto){
                $categorias=Categoria::all()->random(mt_rand(1,5))->pluck('id');
                $producto->categorias()->attach($categorias);
            }
        );
    }
}
