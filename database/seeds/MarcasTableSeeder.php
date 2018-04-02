<?php

use Illuminate\Database\Seeder;
use App\Marca;

class MarcasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Marca::create([
            'nombre' => 'Victorinox'
        ]);

        Marca::create([
            'nombre' => 'Citizen'
        ]);

        Marca::create([
            'nombre' => 'Zippo'
        ]);

        Marca::create([
            'nombre' => 'Harley Davidson'
        ]);

        Marca::create([
            'nombre' => 'Q&Q'
        ]);

        Marca::create([
            'nombre' => 'Puma'
        ]);

        Marca::create([
            'nombre' => 'Cat'
        ]);

        Marca::create([
            'nombre' => 'Police'
        ]);

        Marca::create([
            'nombre' => 'Bulova'
        ]);

        Marca::create([
            'nombre' => 'Nivada'
        ]);

        Marca::create([
            'nombre' => 'Timex'
        ]);

        Marca::create([
            'nombre' => 'Orient'
        ]);

        Marca::create([
            'nombre' => 'Fossil'
        ]);

        Marca::create([
            'nombre' => 'Renata'
        ]);
        
    }
}
