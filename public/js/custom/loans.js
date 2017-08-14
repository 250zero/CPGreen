var fecha_ini='';
var fecha_fin='';
var date ;
$(document).ready(function(){
      transacctionType();
       periodPay();
      var now = new Date();
      var day = ("0" + now.getDate()).slice(-2);
      var month = ("0" + (now.getMonth() + 1)).slice(-2);
      fecha_fin = now.getFullYear()+"-"+(month)+"-"+(day) ; 
      fecha_ini = now.getFullYear()+"-"+(month)+"-"+ '01' ; 
});

$('#add_loans').on('click',function(){ 
    $('.modal2-title').html('Nuevo Prestamo'); 
    $("#solicituded_stock").val('');
    $("#interest").val('');
    $('#loans_id').val('0');
    $("#date_init_loans").val( fecha_ini );
    $("#date_final_loans").val( fecha_fin );
    $("#id_client").val('0');  
    $('#LoansModal').modal('show');
});

$('#save_loans').on('click',function(){

});

function transacctionType(){ 
   $.ajax({
        url: "utility/transacction_type",
        method: "GET",
        dataType:"json" 
    }).done(function(result) {  
        var html = '';
        $(result).each(function(){
                   html += '<option value="' + this.ID + '">';
                   html +=  this.DESCRIPTION  ;
                   html +=  '</option>' ; 
        });   
        $("#transacction_type").html(html);
    });
}
function periodPay(){ 
   $.ajax({
        url: "utility/period_pay",
        method: "GET",
        dataType:"json" 
    }).done(function(result) {  
        var html = '';
        $(result).each(function(){
                   html += '<option value="' + this.ID + '">';
                   html +=  this.DESCRIPTION  ;
                   html +=  '</option>' ; 
        });   
        $("#period_pay").html(html);
    });
}