@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">AÑADE UN NUEVO PRODUCTO</div>

                <div class="card-body">
                    <form action="{{ route('productosStore') }}" method="POST">
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
                            <label for="modelo" class="col-md-2 col-form-label text-md-right">Modelo</label>

                            <div class="col-md-10">
                                <input id="modelo" type="text" class="form-control{{ $errors->has('modelo') ? ' is-invalid' : '' }}" name="modelo" value="{{ old('modelo') }}" required>

                                @if ($errors->has('modelo'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('modelo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="codigo" class="col-md-2 col-form-label text-md-right">Código</label>

                            <div class="col-md-10">
                                <input id="codigo" type="number" class="form-control{{ $errors->has('codigo') ? ' is-invalid' : '' }}" name="codigo" value="{{ old('codigo') }}" required >

                                @if ($errors->has('codigo'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('codigo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="categoria" class="col-md-2 col-form-label text-md-right">Categoría</label>

                            <div class="col-md-10">
                                <select id="categoria" name="categorias_ID" required>
                                    @foreach ($categorias as $item)
                                        <option value="{{ $item->ID }}">{{ $item->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="marca" class="col-md-2 col-form-label text-md-right">Marca</label>

                            <div class="col-md-10">
                                <select id="marca" name="marcas_ID" required>
                                    @foreach ($marcas as $item)
                                        <option value="{{ $item->ID }}">{{ $item->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="color" class="col-md-2 col-form-label text-md-right">Color</label>

                            <div class="col-md-10">
                                <select id="color" name="colors_ID" required>
                                    @foreach ($colores as $item)
                                        <option value="{{ $item->ID }}">{{ $item->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="costo" class="col-md-2 col-form-label text-md-right">Costo</label>

                            <div class="col-md-10">
                                <input id="costo" type="number" class="form-control{{ $errors->has('costo') ? ' is-invalid' : '' }}" name="costo" value="{{ old('costo') }}" required>

                                @if ($errors->has('costo'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('costo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="precio" class="col-md-2 col-form-label text-md-right">Precio</label>

                            <div class="col-md-10">
                                <input id="precio" type="number" class="form-control{{ $errors->has('precio') ? ' is-invalid' : '' }}" name="precio" value="{{ old('precio') }}" required>

                                @if ($errors->has('precio'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('precio') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="unidades" class="col-md-2 col-form-label text-md-right">Unidades</label>

                            <div class="col-md-10">
                                <input id="unidades" type="number" class="form-control{{ $errors->has('unidades') ? ' is-invalid' : '' }}" name="unidades" value="{{ old('unidades') }}" required>

                                @if ($errors->has('unidades'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('unidades') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="descuento" class="col-md-2 col-form-label text-md-right">Descuento</label>

                            <div class="col-md-10">
                                <input id="descuento" type="number" class="form-control{{ $errors->has('descuento') ? ' is-invalid' : '' }}" name="descuento" value="{{ old('descuento') }}">

                                @if ($errors->has('descuento'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('descuento') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="genero" class="col-md-2 col-form-label text-md-right">Género</label>

                            <div class="col-md-10">
                                <select id="genero" name="generos_ID" required>
                                    @foreach ($generos as $item)
                                        <option value="{{ $item->ID }}">{{ $item->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="descripcion" class="col-md-2 col-form-label text-md-right">Descripción</label>

                            <div class="col-md-10">
                                <textarea id="descripcion" class="form-control{{ $errors->has('descripcion') ? ' is-invalid' : '' }}" name="descripcion" rows="5">{{old('descripcion')}}</textarea>

                                @if ($errors->has('descripcion'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('descripcion') }}</strong>
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