<?php

use App\Cliente;
use Illuminate\Database\Seeder;

class ClientesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cliente::create([
            'nombre'    => 'Maribel',
            'paterno'   => 'Ramírez',
            'materno'   => 'Hernández',
            'email'     => 'maribel@email.com',
            'celular'   => '2223251075'  
        ]);

        Cliente::create([
            'nombre'    => 'Manuel',
            'paterno'   => 'Flores',
            'materno'   => 'Ramírez',
            'email'     => 'manuel@email.com',
            'celular'   => '2223251088'  
        ]);

        Cliente::create([
            'nombre'    => 'Arturo',
            'paterno'   => 'Flores',
            'materno'   => 'Hernández',
            'email'     => 'arturo@email.com',
            'celular'   => '2221816082'  
        ]);

        Cliente::create([
            'nombre'    => 'Franscisco Javier',
            'paterno'   => 'Cervantes',
            'materno'   => 'Díaz',
            'email'     => 'paco@email.com',
            'celular'   => '2223258470'
        ]);
    }
}
