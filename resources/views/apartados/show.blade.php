@extends('layouts.app')

@section('content')
<div class="container">

    <h1>detalles del apartado (por hacer)</h1>
    <h3>Pagos</h3>
    <table class="table table-hover table-striped table-bordered mb-5">
        <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
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
                <td>{{ $pago->cantidad }}</td>
                <td>{{ $pago->user->username }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

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