<?php

namespace App\Http\Controllers;

use App\Producto;
use App\Categoria;
use App\Marca;
use App\Color;
use App\Genero;
use App\Http\Requests\StoreProductos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::paginate(15);
        return view('productos.index', compact('productos'));
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
    public function store(StoreProductos $request)
    {
        //dd($request->validated());
        Producto::create($request->validated());
        return redirect()->route('productosIndex');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $producto = Producto::find($id);
        if(isset($producto)){
            return view("productos.details", compact('producto'));
        }
        else{
            abort(404, 'Error 404: La página que estás intentando acceder no se encuentra :(');
        }
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
