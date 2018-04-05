@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">AÑADE UN NUEVO PRODUCTO</div>

                <div class="card-body">
                    <form action="{{ route('clientesStore') }}" method="POST">
                        @csrf

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

                        <div class="form-group row">
                            <label for="paterno" class="col-md-2 col-form-label text-md-right">Paterno</label>

                            <div class="col-md-10">
                                <input id="paterno" type="text" class="form-control{{ $errors->has('paterno') ? ' is-invalid' : '' }}" name="paterno" value="{{ old('paterno') }}" required >

                                @if ($errors->has('paterno'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('paterno') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="materno" class="col-md-2 col-form-label text-md-right">Materno</label>

                            <div class="col-md-10">
                                <input id="materno" type="text" class="form-control{{ $errors->has('materno') ? ' is-invalid' : '' }}" name="materno" value="{{ old('materno') }}" required >

                                @if ($errors->has('materno'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('materno') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="celular" class="col-md-2 col-form-label text-md-right">Celular</label>

                            <div class="col-md-10">
                                <input id="celular" type="text" class="form-control{{ $errors->has('celular') ? ' is-invalid' : '' }}" name="celular" value="{{ old('celular') }}" required >

                                @if ($errors->has('celular'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('celular') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-2 col-form-label text-md-right">Email</label>

                            <div class="col-md-10">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
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