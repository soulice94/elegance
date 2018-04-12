@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <h2 class="mb-4 text-center">Detalles del Producto</h2>
        </div>
        <div class="col-md-8">
            <table class="table table-hover">
                <tbody>
                    <tr>
                        <td><h4>nombre</h4></td>
                        <td><h4>{{ $producto->nombre }}</h4></td>
                    </tr>
                    <tr>
                        <td><h4>modelo</h4></td>
                        <td><h4 class="no-transform">{{ $producto->modelo }}</h4></td>
                    </tr>
                    <tr>
                        <td><h4>código</h4></td>
                        <td><h4>{{ $producto->codigo }}</h4></td>
                    </tr>
                    <tr>
                        <td><h4>descripcion</h4></td>
                        <td><p>{{ $producto->descripcion }}</p></td>
                    </tr>
                    <tr>
                        <td><h4>categoría</h4></td>
                        <td><h4>{{ $producto->categoria->nombre }}</h4></td>
                    </tr>
                    <tr>
                        <td><h4>marca</h4></td>
                        <td><h4>{{ $producto->marca->nombre }}</h4></td>
                    </tr>
                    <tr>
                        <td><h4>color</h4></td>
                        <td><h4>{{ $producto->color->nombre }}</h4></td>
                    </tr>
                    <tr>
                        <td><h4>género</h4></td>
                        <td><h4>{{ $producto->genero->nombre }}</h4></td>
                    </tr>
                    <tr>
                        <td><h4>clave</h4></td>
                        <td><h4>{{ $producto->clave() }}</h4></td>
                    </tr>
                    <tr>
                        <td><h4>descuento</h4></td>
                        <td><h4>
                        @if (isset($producto->descuento))
                            {{ $producto->descuento }}
                        @else
                            no aplica
                        @endif  
                        </h4></td>
                    </tr>
                    <tr>
                        <td><h4>precio</h4></td>
                        <td><h4>${{ $producto->precio }}<small>MXN</small></h4></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    
</div>
    
@endsection