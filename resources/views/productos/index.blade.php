@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @if ($productos->isNotEmpty())
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Costo</th>
                        <th scope="col">Precio</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productos as $item)
                        <tr>
                           <th scope="row">{{ $item->ID }}</th> 
                           <td>{{ $item->nombre }}</td>
                           <td>{{ $item->costo }}</td>
                           <td>{{ $item->precio }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @else
                <h1>No hay productos registrados aún</h1>
            @endif
        </div>
    </div>
</div>
@endsection