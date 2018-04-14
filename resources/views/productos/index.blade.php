@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if ($productos->isNotEmpty())
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Código</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Marca</th>
                        <th scope="col">Color</th>
                        <th scope="col">Unidades</th>
                        <th scope="col">Descuento</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productos as $item)
                        <tr>
                            <td><a href="{{ route('productosDetails', [ 'id' => $item->ID ]) }}">{{ $item->codigo }}</a></td>
                            <td>{{ $item->nombre }}</td>
                            <td>{{ $item->precio }}.00 MXN</td>
                            <td>{{ $item->categoria->nombre }}</td>
                            <td>{{ $item->marca->nombre }}</td>
                            <td>{{ $item->color->nombre }}</td>
                            <td class="text-center">{{ $item->unidades }}</td>
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
            @else
                <h1 class="text-center">No hay productos registrados aún :(</h1>
            @endif
        </div>
        {{ $productos->links() }}
    </div>
</div>
@endsection