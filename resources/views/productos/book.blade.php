@extends('layouts.app')

@section('content')
<form class="container" action="{{ route('apartado') }}" method="POST">
    @csrf
    <div class="row justify-content-center mb-1">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">APARTA UN PRODUCTO</div>

                <div class="card-body">
                    
                    <div class="form-group row">
                        <label class="col-md-3 text-md-right">CODIGO</label>
                        <h3 class="col-md-9">{{ $producto->codigo }}</h3>
                        <input name="producto" type="hidden" value="{{ $producto->codigo }}">
                    </div>

                    <div class="form-group row">
                        <label for="celular" class="col-md-3 col-form-label text-md-right">Celular del Cliente</label>

                        <div class="col-md-9">
                            <input id="celular" type="text" class="form-control{{ $errors->has('celular') ? ' is-invalid' : '' }}" name="celular" value="{{ old('celular') }}" required autofocus>

                            @if ($errors->has('celular'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('celular') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="dominio" class="col-md-3 col-form-label text-md-right">Dominio de Mercancía</label>

                        <div class="col-md-9 mt-3">
                            <input id="dominio" type="checkbox" name="dominio" value="1" @if(old('dominio')) checked @endif>
                        </div>
                    </div>
                        
                </div>
            </div>
        </div>
    </div>

    @component('users.loginInput')
    @endcomponent

    <div class="row justify-content-center">
        <div class="col-md-8">
            <button type="submit" class="btn btn-primary w-100">
                Enviar
            </button>
        </div>
    </div>
</form>
@endsection