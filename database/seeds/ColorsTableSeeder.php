<?php

use Illuminate\Database\Seeder;
use App\Color;

class ColorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Color::create([
            'nombre' => 'Negro'
        ]);

        Color::create([
            'nombre' => 'Dorado'
        ]);

        Color::create([
            'nombre' => 'Acero'
        ]);

        Color::create([
            'nombre' => 'Ninguno'
        ]);
    }
}
