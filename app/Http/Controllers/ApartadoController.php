<?php

namespace App\Http\Controllers;

use App\Apartado;
use App\Producto;
use App\PagosApartado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApartadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $apartados = Apartado::orderBy('ID', 'desc')->paginate(15);
        return view('apartados.index', compact('apartados'));
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
        $apartado = new Apartado;
        $apartado->liquidado   = false;
        $apartado->entregado   = $request->has('dominio') ? true : false;
        $apartado->users_ID    = $request->userid;
        $apartado->productos_codigo = $request->producto;
        $apartado->clientes_celular = $request->celular;
        
        $producto = Producto::find($request->producto);
        $producto->unidades--;

        $pago = new PagosApartado;
        $pago->cantidad = $request->pago;
        $pago->users_ID = $request->userid;
        
        DB::transaction(function() use($apartado, $producto, $pago){
            $producto->save();
            $apartado->save();
            $pago->apartado_ID = $apartado->id;
            $pago->save();
        });

        //te falta agregar un pago en el apartado
        return redirect()->route('apartadosIndex');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Apartado  $apartado
     * @return \Illuminate\Http\Response
     */
    public function show(int $ID)
    {
        //
        $apartado = Apartado::find($ID);
        if(isset($apartado)){
            $cliente  = $apartado->cliente->first();
            $producto = $apartado->producto->first();
            return view('apartados.show', compact('apartado', 'cliente', 'producto'));
        }
        else{
            abort(404, 'Error 404: El apartado al que estás intentando acceder no se encuentra :(');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Apartado  $apartado
     * @return \Illuminate\Http\Response
     */
    public function edit(Apartado $apartado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Apartado  $apartado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Apartado $apartado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Apartado  $apartado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Apartado $apartado)
    {
        //
    }
}
