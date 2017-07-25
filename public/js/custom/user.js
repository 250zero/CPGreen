 
$('#btn_nuevo').on('click',function(){
    $('#UserModal').modal('show');
    $(".modal-title").html('Nuevo Usuario'); 
    $('#password').attr('readonly',false);
    $("#habilitar_cambiar").css("display","none");
    $('#username').val('');
    $('#id_user').val(0);
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
        $('#id_user').val(result.id_user);
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


$("#save_client").on("click",function(){
    var data = {
        id_user:$("#id_user").val(),
        username:$("#username").val(),
        password:$("#password").val(),
        check_password:$("#habilitar_change_p").val(),
        level:$("#level").val(),
        state:$("#state").val()
    }; 
    $.ajax({
        url: "users/save",
        method: "POST",
        dataType:"json",
        data:data
    }).done(function(result) { 
        
    });
});