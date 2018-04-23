<?php

namespace App\Http\Controllers;

use App\Apartado;
use App\Producto;
use App\Cliente;
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

        $cliente = Cliente::find($request->celular);

        if(!isset($cliente)){
            return back()->withErrors(['celular' => ['No existe un cliente con el teléfono ingresado']])->withInput();
        }

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

    public function showAbonar(Request $request, int $id){
        if(Apartado::find($id)){
            return view('apartados.abonar', compact('id'));
        }
        else{
            abort(404, 'Error 404: El apartado al que estás intentando acceder no se encuentra :(');
        }
    }

    public function abonar(Request $request){
        $apartado = Apartado::find($request->ID);
        if(isset($apartado)){
            $producto = $apartado->producto->first();
            $abonado = $apartado->abonado();
            if($abonado + $request->cantidad > $producto->precio ){
                return back()->withErrors(['cantidad' => 
                    ['El pago no puede ser mayor que lo que debe: $'.($producto->precio - $abonado)]])
                    ->withInput();
            }
            if($request->cantidad < 1){
                return back()->withErrors(['cantidad' => ['El pago no puede ser negativo o igual a 0(cero)']])->withInput();
            }
            $pago = new PagosApartado;
            $pago->cantidad     = $request->cantidad;
            $pago->apartado_ID  = $request->ID;
            $pago->users_ID     = $request->userid;
            $pago->save();
            return redirect()->route('apartadosDetails', ['ID' => $request->ID]);
        }
        abort(404, 'Error 404: El apartado al que estás intentando acceder no se encuentra :(');
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
