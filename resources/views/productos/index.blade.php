@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if ($productos->isNotEmpty())
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Código</th>
                        <th scope="col">Modelo</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Marca</th>
                        <th scope="col">Color</th>
                        <th scope="col">Unidades</th>
                        <th scope="col">Descuento</th>
                        <th scope="col">Pass</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productos as $item)
                        <tr>
                            <th scope="row">{{ $item->ID }}</th> 
                            <td>{{ $item->codigo }}</td>
                            <td>{{ $item->modelo }}</td>
                            <td>{{ $item->nombre }}</td>
                            <td>{{ $item->precio }}.00 MXN</td>
                            <td>{{ $item->categoria->nombre }}</td>
                            <td>{{ $item->marca->nombre }}</td>
                            <td>{{ $item->color->nombre }}</td>
                            <td>{{ $item->unidades }}</td>
                            @if (isset($item->descuento))
                                <td>{{ $item->descuento }}</td>
                            @else
                                    <td>No Aplica</td>
                            @endif
                            <td>{{ $item->contrasena() }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @else
                <h1 class="text-center">No hay productos registrados aún :(</h1>
            @endif
        </div>
    </div>
</div>
@endsection