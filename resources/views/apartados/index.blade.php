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
                            <td>{{ $item->ID }}</td>
                            <td>{{ $item->productos_codigo }}</td>
                            <td>{{ $item->producto->nombre }}</td>
                            <td>{{ $item->clientes_celular }}</td>
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