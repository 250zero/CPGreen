

function getProfile(id){
   $("input[type='text']").val('');
   $("input[type='email']").val('');
   $("#id_client").val('0');
   $('.modal-title').html('');
   $("#header_loans tbody").html('');
   $.ajax({
        url: "client/profile",
        method: "GET",
        dataType:"json",
        data:{id:id}
    }).done(function(result) { 
        $('.modal-title').html(result.name);
        $('#id_client').val(result.id_client);
        $('#account').val(result.account);
        $('#client_name').val(result.name);
        $('#stock').val(result.stock);
        $('#email').val(result.email);
        $('#telephone').val(result.telephone);
        getLoans(result.id_client);
        $('#ClientModal').modal('show'); 
    });
}

$('#btn_nuevo').on('click',function(){
    
   $("input[type='text']").val('');
   $("#id_client").val('0');
   $('.modal-title').html('Nuevo Cliente');
   $('#ClientModal').modal('show');
});

 $('#save_client').on('click',function(e){
    e.preventDefault();
    save();
 });

function save(){ 
     var data = {
        account:$("#account").val(),
        id_client:$("#id_client").val(),
        _token:$('input[name=_token]').val(),
        client_name:$("#client_name").val(),
        email:$("#email").val(),
        telephone:$("#telephone").val(),
        stock:$("#stock").val() 
    }; 
   $.ajax({
        url: "client/save",
        method: "POST",
        dataType:"json",
        data:data
    }).done(function(result) { 
        if(result.status > 0)
        {
            toastr.success(result.msn, 'Operación exitosa');
            $("#ClientModal").modal('hide');
            location.reload();
            return false;
        }
        toastr.warning(result.msn, 'Se ha desconectado del sevidor'); 
    });
}