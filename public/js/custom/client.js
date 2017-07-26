
$('#ClientModal').modal('show');
function getProfile(id){
   $.ajax({
        url: "client/profile",
        method: "GET",
        dataType:"json",
        data:{id:id}
    }).done(function(result) { 

        $('#ClientModal').modal('show');
        
    });
}
