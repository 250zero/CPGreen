 

$('#btn_nuevo').on('click',function(){
    $('#UserModal').modal('show');
    $(".modal-title").html('Nuevo Usuario');
    $("#habilitar_cambiar").css("display","none");
    $('#username').val('');
    $('#password').val('');
    $('#level').val('1');
    $('#state').val('1');
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
        $('#password').val('5555555555');
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
    }else
    {
        $('#password').attr('readonly',true);
    }
});