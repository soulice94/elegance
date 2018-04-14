@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">APARTA UN PRODUCTO</div>

                <div class="card-body">
                    <form action="{{ route('clientesStore') }}" method="POST">
                        @csrf

                        <div class="form-group row">
                            <label class="col-md-2 text-md-right">CODIGO</label>
                            <h3 class="col-md-10">{{ $producto->codigo }}</h3>
                        </div>

                        <div class="form-group row">
                            <label for="nombre" class="col-md-2 col-form-label text-md-right">Nombre</label>

                            <div class="col-md-10">
                                <input id="nombre" type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" name="nombre" value="{{ old('nombre') }}" required autofocus>

                                @if ($errors->has('nombre'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-2">
                                <button type="submit" class="btn btn-primary">
                                    Guardar
                                </button>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection