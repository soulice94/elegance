<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    //
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'paterno',
        'materno',
        'email',
        'celular'
    ];
}
