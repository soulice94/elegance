@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @forelse ($productos as $item)
        <div class="col-md-4">
            <div class="card w-100 shadow">
                <div class="card-body">
                    <h5 class="card-title">{{ $item->codigo }}</h5>
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
                            <button class="btn btn-danger w-100">Eliminar</button>
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
@endsection