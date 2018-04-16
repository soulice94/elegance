<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    //
    public $primaryKey = 'celular';

    public $incrementing = false;

    public $keyType = 'string';

    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'paterno',
        'materno',
        'email',
        'celular'
    ];
}
