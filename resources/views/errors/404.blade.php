@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row minh-100 align-items-center justify-content-center">
        <div class="col-lg-8">
            <h2 class="text-center">{{ $exception->getMessage() }}</h2> 
        </div>
    </div>
</div>
@endsection
