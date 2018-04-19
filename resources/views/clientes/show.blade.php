@extends('layouts.app')

@section('content')
<div class="container">
    @component('clientes.details', ['cliente' => $cliente])
    @endcomponent
</div>
@endsection