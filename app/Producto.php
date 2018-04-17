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

    protected $decodificador = [
        "1" => "A",
        "2" => "B",
        "3" => "C",
        "4" => "D",
        "5" => "E",
        "6" => "J",
        "7" => "G",
        "8" => "H",
        "9" => "I",
        "0" => "X"
    ];

    public $primaryKey = 'codigo';

    public $incrementing = false;

    public $keyType = 'string';

    public function clave(){
        $transformada = "";
        foreach(str_split(strval($this->costo)) as $c){
            $transformada .= $this->decodificador[$c];
        }
        return $transformada;
    }

    //Relaciones de los productos con otros modelos
    public function marca(){
        return $this->hasOne('App\Marca', 'ID', 'marcas_ID');
    }

    public function color(){
        return $this->hasOne('App\Color', 'ID', 'colors_ID');
    }

    public function categoria(){
        return $this->hasOne('App\Categoria', 'ID', 'categorias_ID');
    }

    public function genero(){
        return $this->hasOne('App\Genero', 'ID', 'generos_ID');
    }
}
