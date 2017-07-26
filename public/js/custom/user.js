 
$('#btn_nuevo').on('click',function(){
    $('#UserModal').modal('show');
    $(".modal-title").html('Nuevo Usuario'); 
    $('#password').attr('readonly',false);
    $("#habilitar_cambiar").css("display","none");
    $('#username').val('');
    $('#id_user').val(0);
    $('#password').val('');
    $("#btn_cliente_movil").html("Seleccionar..");
    $('#level').val('1');
    $('#state').val('1');
    $('#cliente_movil').val('1');
});

$("#level").on('change',function(){
    if(this.value == 1)
    {
          $("#cliente_movil_div").css("display","block");
    }
    else
    {
           $("#cliente_movil_div").css("display","none");
    }
});


function getProfile(id){
   $.ajax({
        url: "users/profile",
        method: "GET",
        dataType:"json",
        data:{id:id}
    }).done(function(result) { 

        $('#UserModal').modal('show');
        $(".modal-title").html(result.rs_client.name);
        $('#username').val(result.username);
        $('#id_user').val(result.id_user);
        if(result.id_client > 0)
        {
            $("#btn_cliente_movil").html("Seleccionado");
        }else
        {
            $("#btn_cliente_movil").html("Seleccionar..");
        }
        $('#cliente_movil').val(result.id_client);
        $('#password').val('placehold');
        $('#password').attr('readonly',true);
        $("#habilitar_cambiar").css("display","block");
        $('#level').val(result.level);
        $('#state').val(result.state);
    });
}

$("#habilitar_change_p").on("click",function(){
    var valor = $("#habilitar_change_p").prop('checked');
    
    if(valor)
    { 
        $('#password').attr('readonly',false);
        $('#password').val('');
    }else
    {
        $('#password').attr('readonly',true); 
        $('#password').val('placehold');
    }
});
function select_client(id){

    $("#SearchClientModal").modal("hide");
    $("#cliente_movil").val(id); 
    $("#UserModal").modal("show");
    $("#btn_cliente_movil").html("Seleccionado");
    
}

$("#btn_cliente_movil").on('click',function(){
    $("#SearchClientModal").modal("show");
    $("#UserModal").modal("hide");
    $.ajax({
        url:"client/search",
        method:"get",
        dataType:"json"
    }).done(function(result){
            var html = '';
            $(result.data).each(function(){
                html += '<tr onclick="select_client('+this.id_client+')">';
                html += '<td>'+this.account+'</td>';
                html += '<td>';
                html += this.name;
                html += '</td>';
                html += '<td>';
                html += this.email;
                html += '</tr>';

            });
            $("#searchClient tbody").html(html);
    });
});

$("#save_client").on("click",function(){
    var data = {
        id_user:$("#id_user").val(),
        id_client:$("#cliente_movil").val(),
        _token:$('input[name=_token]').val(),
        username:$("#username").val(),
        password:$("#password").val(),
        check_password:$("#habilitar_change_p").prop("checked"),
        level:$("#level").val(),
        state:$("#state").val()
    }; 
    $.ajax({ 
        url: "users/save",
        method: "POST",
        dataType:"json",
        data:data
    }).done(function(result) { 
        if(result.status > 0)
        {
            toastr.success(result.msn, 'Operación exitosa');
            $("#UserModal").modal('hide');
            location.reload();
            return false;
        }
        toastr.warning(result.msn, 'Inconvenientes en el sevidor');
    });
});