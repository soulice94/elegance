<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    //
    public $primaryKey = 'celular';

    public $incrementing = false;

    public $keyType = 'string';

    protected $fillable = [
        'nombre',
        'paterno',
        'materno',
        'email',
        'celular'
    ];
}
