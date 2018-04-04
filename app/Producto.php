<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    //
    protected $fillable = [
        'nombre',
        'costo',
        'precio',
        'unidades',
        'descuento',
        'descripcion',
        'codigo',
        'modelo',
        'categorias_ID',
        'marcas_ID',
        'colors_ID',
        'generos_ID'
    ];

    public $timestamps = false;
}
