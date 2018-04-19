<div class="row justify-content-center">
    <div class="col-12">
        <h2 class="mb-4 text-center">Datos del cliente</h2>
    </div>
    <div class="col-md-8">
        <table class="table table-hover">
            <tbody>
                <tr>
                    <td><h4>nombre</h4></td>
                    <td><h4>{{ $cliente->nombre }} {{ $cliente->paterno }} {{ $cliente->materno }}</h4></td>
                </tr>
                <tr>
                    <td><h4>Celular</h4></td>
                    <td><h4>{{ $cliente->celular }}</h4></td>
                </tr>
                <tr>
                    <td><h4>Email</h4></td>
                    <td><h4 class="no-transform">{{ $cliente->email }}</h4></td>
                </tr>
            </tbody>
        </table>
    </div>
     <div class="col-12">
        <h2 class="mb-4 text-center">Ventas</h2>
    </div>
    <div class="col-12">
        <h2 class="mb-4 text-center">Apartados</h2>
    </div>
</div>