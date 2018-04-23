@extends('layouts.app')

@section('content')

<div class="container">
    @component('productos.details', ['producto' => $producto])
    @endcomponent
</div>
    
@endsection