@extends('layouts.app')

@section('content')

@component('productos.details', ['producto' => $producto])
@endcomponent
    
@endsection