@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if ($apartados->isNotEmpty())
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">código</th>
                        <th scope="col">nombre</th>
                        <th scope="col">celular</th>
                        <th scope="col">cliente</th>
                        <th scope="col">liquidado</th>
                        <th scope="col">entrega</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($apartados as $item)
                        <tr>
                            <td><a href="{{ route('apartadosDetails', ['ID' => $item->ID]) }}">{{ $item->ID }}</a></td>
                            <td><a href="{{ route('productosDetails', [ 'id' => $item->productos_codigo ]) }}">{{ $item->productos_codigo }}</a></td>
                            <td>{{ $item->producto->nombre }}</td>
                            <td><a href="{{ route('clientesDetails', ['celular' => $item->clientes_celular]) }}">{{ $item->clientes_celular }}</a></td>
                            <td>{{ $item->cliente->nombre }} {{ $item->cliente->paterno }} {{ $item->cliente->materno }}</td>
                            <td>
                            @if ($item->liquidado)
                                Sí
                            @else
                                No
                            @endif
                            </td>
                            <td>
                                @if (isset($item->entrega))
                                    {{ $item->entrega }}
                                @else
                                    sin entregar
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @else
                <h1 class="text-center">No hay clientes registrados aún :(</h1>
            @endif
        </div>
        {{ $apartados->links() }}
    </div>
</div>
@endsection