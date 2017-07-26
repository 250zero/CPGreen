

function getProfile(id){
   $.ajax({
        url: "client/profile",
        method: "GET",
        dataType:"json",
        data:{id:id}
    }).done(function(result) { 
        $('#id_client').val(result.id_client);
        $('#cuenta_socio').val(result.account);
        $('#client_name').val(result.name);
        $('#email').val(result.email);
        $('#telephone').val(result.telephone);
        $('#ClientModal').modal('show');
        
    });
}
