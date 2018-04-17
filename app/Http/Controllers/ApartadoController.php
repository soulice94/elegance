<?php

namespace App\Http\Controllers;

use App\Apartado;
use Illuminate\Http\Request;

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
        $apartado->liquidado = false;
        $apartado->dominio   = $request->has('dominio') ? true : false;
        $apartado->users_ID  = $request->userid;
        $apartado->productos_codigo = $request->producto;
        $apartado->clientes_celular = $request->celular;
        $apartado->save();
        return redirect()->route('apartadosIndex');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Apartado  $apartado
     * @return \Illuminate\Http\Response
     */
    public function show(Apartado $apartado)
    {
        //
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
