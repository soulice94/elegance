<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'username'  => 'pedro',
            'nombre'    => 'Pedro Arturo',
            'paterno'   => 'Flores',
            'materno'   => 'Ramírez',
            'email'     => 'pedro@email.com',
            'password'  =>  Hash::make('hola1234')
        ]);
    }
}
