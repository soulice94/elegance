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
        $usuario = User::where('username', $request->username)->first();
        
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
