<?php

use Illuminate\Database\Seeder;
use App\Genero;

class GenerosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        Genero::create([
            'nombre' => 'Dama'
        ]);

        Genero::create([
            'nombre' => 'Caballero'
        ]);

        Genero::create([
            'nombre' => 'Ninguno'
        ]);
    }
}
