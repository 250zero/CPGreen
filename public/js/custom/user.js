 

$('#btn_nuevo').on('click',function(){
    $('#UserModal').modal('show');
    $(".modal-title").html('Nuevo Usuario');
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
        $('#password').val('');
        $('#level').val(result.level);
        $('#state').val(result.state);
    });
}