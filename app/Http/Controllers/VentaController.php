<?php

namespace App\Http\Controllers;

use App\Venta;
use App\Carrito;
use App\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function addProducto(Request $request){
        $body = new \stdClass;
        $producto = Producto::find($request->codigo);
        $cantidad = intval($request->cantidad);
        $producto_carrito = Carrito::find($request->codigo);
        if(isset($producto_carrito)){
            $body->error = true;
            $body->message = "El producto ya fue agregado anteriormente";
        }
        else if(!isset($producto)){
            $body->error = true;
            $body->message = "El producto que estás intentando agregar no se encuentra";
        }
        else if($cantidad>$producto->unidades){
            $body->error = true;
            $body->message = "No puedes agregar más productos de los disponibles: ".$producto->unidades;
        }
        else if($cantidad<1 || $request->has('cantidad') == false){
            $body->error = true;
            $body->message = "No puedes agregar menos de un producto";
        }
        else{
            $carrito = new Carrito;
            $carrito->productos_codigo = $producto->codigo;
            $carrito->cantidad = $cantidad;
            $producto->unidades -= $cantidad;

            DB::transaction(function() use($carrito, $producto, $body){
                $producto->save(); 
                $body->exito = $carrito->save();
            });

            $body->unidades = $producto->unidades;
            $body->codigo   = $producto->codigo;
            $body->message = "Éxito al agregar el nuevo elemento al carrito";
        }
        return response(json_encode($body), 200)->header('Content-Type', 'application/json');
    }

    public function eliminarProducto(Request $request){
        $stock = Producto::find($request->codigo);
        $producto = Carrito::find($request->codigo);
        $stock->unidades += $producto->cantidad;
        DB::transaction(function() use($producto, $stock){
            $stock->save(); 
            $producto->delete();
        });
        $response = new \stdClass;
        $response->borrado = true;
        $response->message = "El producto con codigo ".$request->codigo." ha sido eliminado";
        return response(json_encode($response), 200)->header('Content-Type', 'application/json');
    }

    public function carritoIndex(){
        $carrito = Carrito::all()->keyBy('productos_codigo');
        $productos = $carrito->map(function($item, $key){
            return $item->producto;
        });
        return view('ventas.carrito', compact('carrito', 'productos'));
    }

    public function showCheckout(){
        $carrito = Carrito::all()->keyBy('productos_codigo');
        $productos = $carrito->map(function($item, $key){
            return $item->producto;
        });
        return view('ventas.checkout', compact('carrito', 'productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function show(Venta $venta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function edit(Venta $venta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Venta $venta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Venta $venta)
    {
        //
    }
}
