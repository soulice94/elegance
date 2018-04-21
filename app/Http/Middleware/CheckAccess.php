<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use App\Cliente;
use Illuminate\Support\Facades\Hash;

class CheckAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   
        $errores = array();
        $cliente = Cliente::find($request->celular);
        $usuario = User::where('username', $request->username)->first();
        if(!isset($cliente)){
            return back()->withErrors(['celular' => ['No existe un cliente con el teléfono ingresado']])->withInput();
        }
        if(isset($usuario)){
            $permiso = Hash::check($request->password, $usuario->password) ? true : false;
        }
        if(!isset($usuario) || !$permiso){
            return back()->withErrors(['password' => ['El usuario no existe o la contraseña es incorrecta']])->withInput();
        }
        $request->request->add(['userid' => $usuario->id]);
        return $next($request);
    }
}
