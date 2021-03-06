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
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
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
                            <td class="text-center" id="{{ $item->codigo }}u">{{ $item->unidades }}</td>
                            <td class="text-center">
                            @if (isset($item->descuento))
                                {{ $item->descuento }}
                            @else
                                No Aplica
                            @endif
                            </td>
                            <td>
                            @if ($item->unidades > 0)
                                <button type="button" class="btn btn-blue" onclick="show(this, '{{ $item->codigo }}')" 
                                @if ($carrito->has($item->codigo))
                                    disabled
                                @endif
                                >Comprar</button>
                            @else
                                No disponible
                            @endif
                            </td>
                            <td id="{{ $item->codigo }}">
                            @if ($item->unidades > 0)
                                <a class="btn btn-blue-soft" href="{{ route('productosApartar', [ 'codigo' => $item->codigo ]) }}">Apartar</a>
                            @else
                                No disponible
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
<div class="modal fade" tabindex="-1" role="dialog" id="modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                MODELO: <label id="etiqueta">body text goes here.</label>
                <br>
                <input type="number" placeholder="Cantidad" id="cantidad">

                <p class="error collapse" id="errorLabel"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="guardar()">Guardar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
<div class="alert alert-success collapse fixed-top" role="alert">
    El producto que seleccionaste fue agregado correctamente al carrito
    <button type="button" class="close" aria-label="Close" onclick="cerrar()">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

@endsection

@section('scripts')
<script src="{{ asset('js/productos.index.js') }}"></script>
@endsection