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
        DB::table('categoria_producto')->truncate(); 
        User::truncate();
        Producto::truncate();
        Categoria::truncate();
           
        $cantidadUsuarios=10;
        $cantidadCategotias=1;
        $cantidadProductos=0;
        
        factory(User::class, $cantidadUsuarios)->create();
             factory(Categoria::class)->create( ['id' => 1 ,'nombre' => 'NIÑAS' ,'descripcion' => 'ROPA PARA CHICAS', 'categoria_padre' => null]);
             factory(Categoria::class)->create( ['id' => 2 ,'nombre' =>'NIÑOS', 'descripcion' =>  'ROPA PARA CHICOS', 'categoria_padre' => null]);
             factory(Categoria::class)->create( ['id' => 3 ,'nombre' =>'BEBÉS', 'descripcion' =>  'ROPA PARA BEBÉS', 'categoria_padre' => null]);
             factory(Categoria::class)->create( ['id' => 4 ,'nombre' =>'OFERTA', 'descripcion' =>  'OFERTAS', 'categoria_padre' => null]);


             factory(Categoria::class)->create( [ 'id' => 5 ,'nombre' =>'CAMISETA Y PANTALÓN', 'descripcion' => 'CAMISETA Y PANTALÓN', 'categoria_padre' => 1]);
             factory(Categoria::class)->create( [ 'id' => 6 ,'nombre' =>'CAMISETA Y SHORT', 'descripcion' => 'CAMISETA Y PANTALÓN', 'categoria_padre' => 1]);


             factory(Categoria::class)->create( [ 'id' => 7 ,'nombre' =>'CONJUNTO', 'descripcion' => 'CONJUNTO', 'categoria_padre' => 2]);
             factory(Categoria::class)->create( [ 'id' => 8 ,'nombre' =>'VESTIDOS', 'descripcion' => 'VESTIDOS', 'categoria_padre' => 2]);

             factory(Categoria::class)->create( [ 'id' => 9 ,'nombre' =>'NIÑA', 'descripcion' => 'NIÑA', 'categoria_padre' => 3]);
             factory(Categoria::class)->create( [ 'id' => 10 ,'nombre' =>'NIÑO', 'descripcion' => 'NIÑO', 'categoria_padre' => 3]);
            
   
             
        factory(Producto::class, $cantidadProductos)->create()->each(
            function($producto){
                $categorias=Categoria::all()->random(mt_rand(1,5))->pluck('id');
                $producto->categorias()->attach($categorias);
            }
        );
    }
}
