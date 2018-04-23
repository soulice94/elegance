@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1 class="mb-3">Detalles</h1>
            <table class="table table-hover">
                <tbody>
                    <tr>
                        <td><h4>liquidado</h4></td>
                        <td><h4>
                        @if ($apartado->liquidado)
                            Sí
                        @else
                            No
                        @endif
                        </h4></td>
                    </tr>
                    <tr>
                        <td><h4>entregado</h4></td>
                        <td><h4>
                        @if ($apartado->entregado)
                            Sí
                        @else
                            No
                        @endif
                        </h4></td>
                    </tr>
                    <tr>
                        <td><h4>Fecha de entrega</h4></td>
                        <td><h4>
                        @if (isset($apartado->entrega))
                            {{ $apartado->entrega }}
                        @else
                            Sin fecha de entrega
                        @endif
                        </h4></td>
                    </tr>
                    <tr>
                        <td><h4>fecha de apartado</h4></td>
                        <td><h4>{{ $apartado->created_at }}</h4></td>
                    </tr>
                    <tr>
                        @php
                            $abonado = $apartado->abonado();
                        @endphp
                        <td><h4>abonado</h4></td>
                        <td><h4>${{ $abonado }}</h4></td>
                    </tr>
                    <tr>
                        <td><h4>A Pagar</h4></td>
                        <td><h4>${{ $producto->precio - $abonado }}</h4></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <h3 class="mb-3">Pagos</h3>
    <table class="table table-hover table-striped table-bordered mb-3">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Pago</th>
                <th scope="col">FECHA</th>
                <th scope="col">cantidad</th>
                <th scope="col">usuario</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($apartado->pagos as $pago)
            <tr>
                <td>{{ $pago->ID }}</td>
                <td>{{ $pago->created_at }}</td>
                <td>${{ $pago->cantidad }}</td>
                <td>{{ $pago->user->username }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('showAbonar',['ID' => $apartado->ID]) }}" class="btn btn-primary mb-5 w-100">Abonar</a>

    <div class="row">
        <div class="col-md-6">
            @component('clientes.details', ['cliente' => $cliente])
            @endcomponent
        </div>
        <div class="col-md-6">
            @component('productos.details', ['producto' => $producto])
            @endcomponent
        </div>
    </div>    
</div>  
@endsection