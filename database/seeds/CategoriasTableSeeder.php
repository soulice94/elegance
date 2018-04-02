<?php

use Illuminate\Database\Seeder;
use App\Categoria;

class CategoriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categoria::create([
            'nombre' => 'Reloj'
        ]);

        Categoria::create([
            'nombre' => 'Navaja'
        ]);

        Categoria::create([
            'nombre' => 'Encendedor'
        ]);

        Categoria::create([
            'nombre' => 'Gasolina'
        ]);

        Categoria::create([
            'nombre' => 'Accesorios de Reloj'
        ]);

        Categoria::create([
            'nombre' => 'Pila'
        ]);

        Categoria::create([
            'nombre' => 'Correa'
        ]);

        Categoria::create([
            'nombre' => 'Extensible'
        ]);

        Categoria::create([
            'nombre' => 'Máquina'
        ]);

        Categoria::create([
            'nombre' => 'Accesorios Zippo'
        ]);

        Categoria::create([
            'nombre' => 'Accesorios Victorinox'
        ]);

        Categoria::create([
            'nombre' => 'Lámpara'
        ]);
        
        //los productos pueden tener material

        
    }
}
