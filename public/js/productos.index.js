var btn = null;

function show(elemento,codigo){
    $("#errorLabel").hide();
    $('#etiqueta').text(codigo);
    $("#modal").modal({ show: true });
    $("#cantidad").val(1);
    btn = elemento;
}

function guardar(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        }
    });
    var datos = {
        'cantidad': $("#cantidad").val(),
        'codigo':   $('#etiqueta').text(),
        '_token':   $('meta[name="csrf-token"]').attr('content')
    };
    $("#errorLabel").hide();
    $.post("/venta/add/producto", datos, function(response, status){
        if(response.hasOwnProperty('error')){
            $("#errorLabel").text(response.message); 
            $("#errorLabel").show();
        }
        else{
            $("#modal").modal('hide');
            $(".alert").fadeIn();
            setTimeout(function(){
                cerrar();
            }, 5000);
            btn.disabled = true;
        }
        console.log(response.message);
    });
    
}

function cerrar(){
    $(".alert").fadeOut();
}