

function getProfile(id){
   $("input[type='text']").val('');
   $("#id_client").val('0');
   $('.modal-title').html('');
   $.ajax({
        url: "client/profile",
        method: "GET",
        dataType:"json",
        data:{id:id}
    }).done(function(result) { 
        $('.modal-title').html(result.name);
        $('#id_client').val(result.id_client);
        $('#cuenta_socio').val(result.account);
        $('#client_name').val(result.name);
        $('#capital').val(result.stock);
        $('#email').val(result.email);
        $('#telephone').val(result.telephone);
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
   $("input[type='text']").val('');
   $("#id_client").val('0');
   $('.modal-title').html('');
   $.ajax({
        url: "client/profile",
        method: "GET",
        dataType:"json",
        data:{id:id}
    }).done(function(result) { 
        $('.modal-title').html(result.name);
        $('#id_client').val(result.id_client);
        $('#cuenta_socio').val(result.account);
        $('#client_name').val(result.name);
        $('#capital').val(result.stock);
        $('#email').val(result.email);
        $('#telephone').val(result.telephone);
        $('#ClientModal').modal('show'); 
    });
}