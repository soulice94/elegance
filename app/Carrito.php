<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    //
    protected $table = "carrito";
    protected $primaryKey = 'productos_codigo';
    public $incrementing = false;
    protected $keyType = 'string';

    public function producto(){
        return $this->hasOne('App\Producto', 'codigo', 'productos_codigo');
    }
}
