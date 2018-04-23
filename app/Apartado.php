<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apartado extends Model
{
    //
    public function producto(){
        return $this->hasOne('App\Producto', 'codigo', 'productos_codigo');
    }

    public function cliente(){
        return $this->hasOne('App\Cliente', 'celular', 'clientes_celular');
    }

    public function pagos(){
        return $this->hasMany('App\PagosApartado', 'apartado_ID', 'ID');
    }

    public function abonado(){
        $abonado = 0;
        $this->pagos->each(function($pago) use(&$abonado){
            $abonado += $pago->cantidad;
        });
        return $abonado;
    }
}
