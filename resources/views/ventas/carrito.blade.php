@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @if ($carrito->isNotEmpty())
        <div class="col-md-12">
            <h3 class="mb-3">Carrito de productos</h3>
            <table class="table table-striped w-100 mb-5">
                <thead class="thead-dark">
                    <th scope="col">código</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Color</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Descuento</th>
                </thead>
                <tbody>
                    @foreach ($productos as $item)
                        <tr>
                            <td><a href="{{ route('productosDetails', [ 'id' => $item->codigo ]) }}">{{ $item->codigo }}</a></td>
                            <td class="nombre">{{ $item->nombre }}</td>
                            <td>${{ $item->precio }}</td>
                            <td>{{ $item->categoria->nombre }}</td>
                            <td>{{ $item->marca->nombre }}</td>
                            <td>{{ $item->color->nombre }}</td>
                            <td class="text-center">{{ $carrito->find($item->codigo)->cantidad }}</td>
                            <td class="text-center">
                            @if (isset($item->descuento))
                                {{ $item->descuento }}
                            @else
                                No Aplica
                            @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <div class="col-md-12">
            <h3 class="mb-5">No hay productos en el carrito :(</h3>
        </div>
        @endif
    </div>
</div>
@endsection