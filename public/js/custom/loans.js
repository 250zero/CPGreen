var fecha_ini='';
var fecha_fin='';
var date ;
$(document).ready(function(){
      transacctionType();
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
    data = {
        solicituded_stock:$('#solicituded_stock').val(),
        id_loans:$('#id_loans').val(),
        interest:$('#interest').val(),
        date_init_loans:$('#date_init_loans').val(),
        date_final_loans:$('#date_final_loans').val(),
         _token:$('input[name=_token]').val(),
        id_client:$('#id_client').val(),
        solicituded_stock:$('#solicituded_stock').val(),

    };
     $.ajax({
        url: "loans",
        method: "POST",
        dataType:"json",
        data:data 
    }).done(function(result) {  
       
    });
});

$('#calculate_loans').on('click',function(){

    if(($('#solicituded_stock').val() <  1 || ! $.isNumeric( $('#solicituded_stock').val() ) ) && ( $('#interest').val() < 1 || ! $.isNumeric( $('#solicituded_stock').val() )  ))
    {       
        toastr.warning('Favor revisar los campos de interes y capital', 'Faltan campos');
        return false;
    }
    if($('#interest').val() > 100){
        toastr.warning('El interes no puede ser mayor a un 100%', 'Error logico');
        return false;
    }

    fecha_ini=  new Date($('#date_init_loans').val());
    fecha_fin=  new Date($('#date_final_loans').val()); 
     var msn = [
        'La fecha de inicio no puede ser mayor que la fecha final'
    ];
    if(fecha_ini.getFullYear() > fecha_fin.getFullYear()){
            toastr.warning(msn[0], 'Error logico');
            return false;
    }
    if((fecha_ini.getFullYear() == fecha_fin.getFullYear()) && (fecha_ini.getMonth() > fecha_fin.getMonth())){
            toastr.warning(msn[0], 'Error logico');
            return false;
    }  
    var cuotes =  caculateMonth();  
    var html='';
    var stock = $('#solicituded_stock').val();
    var stock_live = $('#solicituded_stock').val();
    var amotization = 0;
    var int = $('#interest').val();
    for(num=0; num<cuotes ; num ++){
        stock_live -=  stock / cuotes ;
        amotization = stock - stock_live;
        html += '<tr>';
        html += '<td>'+(num + 1)+'</td>';
        html += '<td>'+(((stock / cuotes) * (int/100)) + (stock / cuotes))+'</td>';
        html += '<td>'+(stock / cuotes) * (int/100)+'</td>';
        html += '<td>'+(stock / cuotes)+'</td>';
        html += '<td>'+(stock_live )+'</td>';
        html += '<td>'+(amotization)+'</td>';
        html += '</tr>'; 
    }
    
    $('#loans_amortization_table tbody').html(html);

}); 

function caculateMonth(){   
    return Math.abs((fecha_ini.getMonth() - fecha_fin.getMonth())+((fecha_ini.getFullYear() - fecha_fin.getFullYear())*12));
}
 

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
 