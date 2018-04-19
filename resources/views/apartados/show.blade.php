@extends('layouts.app')

@section('content')
<div class="container">

    @component('clientes.details', ['cliente' => $cliente])
    @endcomponent

    @component('productos.details', ['producto' => $producto])
    @endcomponent

</div>
@endsection