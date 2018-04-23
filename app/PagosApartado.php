<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PagosApartado extends Model
{
    //
    protected $table = 'pagos_apartados';

    public function user(){
        return $this->hasOne('App\User', 'id', 'users_ID');
    }
}
