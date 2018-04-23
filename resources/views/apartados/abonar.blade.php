@extends('layouts.app')

@section('content')
<form class="container" method="post" action="{{ route('abonar') }}">
    @csrf
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">

                <div class="card-header">PAGO DEL APARTADO</div>

                <div class="card-body">
                    <div class="form-group row">
                        <label for="cantidad" class="col-md-3 col-form-label text-md-right">Pago</label>
                        <div class="col-md-9">
                            <input id="cantidad" type="number" class="form-control{{ $errors->has('cantidad') ? ' is-invalid' : '' }}" name="cantidad" value="{{ old('cantidad') }}" autofocus required>
                            <input type="hidden" value="{{ $id }}" name="ID">

                            @if ($errors->has('cantidad'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('cantidad') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    @component('users.loginInput')
    @endcomponent

    <div class="row">
        <div class="col-md-8 offset-2">
            <button type="submit" class="btn btn-primary w-100">Enviar</button>
        </div>
    </div>
</form>
@endsection