<?php

namespace App\Http\Controllers;

use App\Producto;
use App\Categoria;
use App\Marca;
use App\Color;
use App\Genero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Get a validator for an incoming product.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        Log::debug('estoy validando el producto');   
        // return Validator::make($data, [
        //     'nombre'    => 'required|string|max:45',
        //     'paterno'   => 'required|string|max:45',
        //     'materno'   => 'required|string|max:45',
        //     'username'  => 'required|string|max:45',
        //     'email'     => 'required|string|email|max:45|unique:users',
        //     'password'  => 'required|string|min:6|confirmed'
        // ]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return "Hola desde los productos";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categorias = Categoria::all()->sortBy('nombre');
        $marcas     = Marca::all()->sortBy('nombre');
        $colores    = Color::all()->sortBy('nombre');
        $generos    = Genero::all();
        $compacto   = compact(
            'categorias',
            'marcas',
            'colores',
            'generos'
        );
        return view('productos.create', $compacto);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        //
    }
}
