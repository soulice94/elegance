var codigo = null;
function show(codigo_producto){
    codigo = codigo_producto;
    $("#etiqueta").text(codigo);
    $("#modal").modal();
    console.log(codigo);
}

function eliminar(){
    console.log("eliminar");
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        }
    });
    var datos = {
        'codigo':   $('#etiqueta').text(),
        '_token':   $('meta[name="csrf-token"]').attr('content')
    };
    $.post('/ventas/eliminar/producto', datos, function(response, status){
        console.log(response);
        location.reload();
    });
}

function editar(codigo){
    $("#error"+codigo).hide();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        }
    });
    var datos = {
        'codigo':   codigo,
        'cantidad': $("#entrada"+codigo).val(),
        '_token':   $('meta[name="csrf-token"]').attr('content')
    };
    $.post('/ventas/editar/producto', datos, function(response, status){
        console.log(response);
        if(response.hasOwnProperty('error')){
            $("#error"+codigo).text(response.message);
            $("#error"+codigo).show();
        }
    });
}