@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        @if ($productos->isNotEmpty())
            <div class="col-md-12">
                <h3 class="mb-5 mt-3">Productos en el carrito: {{ $productos->count() }}</h3>
            </div>
        @endif

        @forelse ($productos as $item)
        <div class="col-md-4">
            <div class="card w-100 shadow">
                <div class="card-body">
                    <h5 class="card-title">{{ $item->codigo }}</h5>
                    <p class="card-text">${{ $item->precio }} MXN</p>
                    <p class="card-text">{{ $item->nombre }}</p>
                    <div class="form-group row">
                        <label for="" class="col-6 text-right">Cantidad:</label>

                        <div class="col-6">
                            <input type="number" id="entrada1" class="form-control" value="{{ $carrito->find($item->codigo)->cantidad }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <button class="btn btn-primary w-100">Enviar</button>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-danger w-100" onclick="show('{{ $item->codigo }}')">Eliminar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-md-12">
            <h1>No hay productos en el carrito aún :(</h1>
        </div>
        @endforelse
    </div>
</div>
<div class="modal fade" tabindex="-1" role="dialog" id="modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Eliminar producto del carrito</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ¿En verdad desea eliminar el producto con codigo <label id="etiqueta" style="font-weight: bold;">body</label> y sus respectivas
                unidades del carrito?

                <p class="error collapse" id="errorLabel"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" onclick="eliminar()">Eliminar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/ventas.carrito.js') }}"></script>
@endsection