var fecha_ini='';
var fecha_fin='';
var date ;
 var cuotes = 0 ;
$(document).ready(function(){
      transacctionType();
});

$('#add_loans').on('click',function(){ 
      var now = new Date();
      var day = ("0" + now.getDate()).slice(-2);
      var month = ("0" + (now.getMonth() + 1)).slice(-2);
      fecha_fin = now.getFullYear()+"-"+(month)+"-"+(day) ; 
      fecha_ini = now.getFullYear()+"-"+(month)+"-"+ '01' ; 
    $('.modal2-title').html('Nuevo Prestamo'); 
    $("#solicituded_stock").val('');
    $("#interest").val('');
    $('#loans_id').val('0');
    $("#date_init_loans").val( fecha_ini );
    $("#date_final_loans").val( fecha_fin );
    $("#id_loans").val('0');  
    $('#LoansModal').modal('show');
    $('#loans_amortization_table tbody').html('');
});

$('#save_loans').on('click',function(){
    $( "#calculate_loans" ).trigger( "click" );
    data = {
        solicituded_stock:$('#solicituded_stock').val(),
        id_loans:$('#id_loans').val(),
        cuotes:cuotes,
        cuotes_paid:((( $('#solicituded_stock').val()/ cuotes) * ($('#interest').val()/100)) + ($('#solicituded_stock').val() / cuotes)),
        interest:$('#interest').val(),
        date_init_loans:$('#date_init_loans').val(),
        date_final_loans:$('#date_final_loans').val(),
         _token:$('input[name=_token]').val(),
        id_client:$('#id_client').val(),
        solicituded_stock:$('#solicituded_stock').val(),

    };
    $.ajax({
        url: BASE_URL+"loans",
        method: "POST",
        dataType:"json",
        data:data 
    }).done(function(result) {  
        if(result.status > 0)
        {
            toastr.success(result.msn, 'Operación exitosa');
            $("#LoansModal").modal('hide'); 
            getLoans($('#id_client').val());
            return false;
        }
        toastr.warning(result.msn, 'Inconvenientes en el sevidor');
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
    cuotes =  caculateMonth();  
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
        html += '<td>'+Math.round(((stock / cuotes) * (int/100)) + (stock / cuotes))+'</td>';
        html += '<td>'+Math.round((stock / cuotes) * (int/100))+'</td>';
        html += '<td>'+Math.round(stock / cuotes)+'</td>';
        html += '<td>'+Math.round(stock_live )+'</td>';
        html += '<td>'+Math.round(amotization)+'</td>';
        html += '</tr>'; 
    }
    
    $('#loans_amortization_table tbody').html(html);

}); 

function caculateMonth(){   
    return Math.abs((fecha_ini.getMonth() - fecha_fin.getMonth())+((fecha_ini.getFullYear() - fecha_fin.getFullYear())*12));
}
 

function transacctionType(){ 
   $.ajax({
        url: BASE_URL+"utility/transacction_type",
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
 


function getLoans(id){ 
   $.ajax({
        url: BASE_URL+"loans/get_loans",
        method: "GET",
        dataType:"json",
        data:{id:id} 
    }).done(function(result){  
        var html = '';
        var amotization = '';
        $(result).each(function(){ 
                   amotization =  this.solicituded_stock -   (this.cuotes_paid  - ( this.cuotes_paid *(this.porcetange / 100)))  ;
                   html += '<tr onclick="getLoansDetails('+this.id_loans_header+')">';
                   html += '<td>'+this.fecha_ini+'</td>'; 
                   html += '<td>'+this.fecha_fin+'</td>'; 
                   html += '<td>'+this.porcetange+'</td>'; 
                   html += '<td>'+this.cuotes+'</td>'; 
                   html += '<td>'+this.solicituded_stock+'</td>'; 
                   html += '<td>'+amotization+'</td>'; 
                   html += '</tr>' ; 
        });   
        $("#header_loans tbody").html(html);
    });
}


$('#realizar_pago').on('click',function(){
    make_pay();
});


function make_pay(){ 
    $.ajax({
         url: BASE_URL+"loans/pay",
         method: "POST",
         dataType:"json",
         data:{
             id:$('#id_realizar_pago').val(), 
         _token:$('input[name=_token]').val()
            } 
     }).done(function(result){  
         if(result.status > 0){
            toastr.success(result.msn, 'Exito!!'); 
            $('#LoansModalDetail').modal('hide');
            getLoans($('#id_client').val());
            return 0;
         }
         toastr.warning(result.msn, 'Advertencia');

     });
 }






function getLoansDetails(id){ 
    var amotization =0;
   $.ajax({
        url: BASE_URL+"loans/get_loans_detail",
        method: "GET",
        dataType:"json",
        data:{id:id} 
    }).done(function(result){
        var fi = new Date();   
        var amotization =  result.solicituded_stock -   (result.cuotes_paid  - ( result.cuotes_paid *(result.porcetange / 100)))  ;
        $('#date_init_loans_show').html(result.fecha_ini);
        $('#id_realizar_pago').val(result.id_loans_header);
        $('#date_final_loans_show').html(result.fecha_fin);
        $('#solicituded_stock_show').html(result.solicituded_stock);
        $('#number_cuotes_show').html(result.no_pay);
        $('#cuotes_show').html(result.cuotes);
        $('#paid_cuotes_show').html(result.cuotes_paid);
        $('#rest_cuotes_show').html(result.rest_cuotes);
        $('#porcentage_cuotes_show').html(result.porcetange);
        $('#stock_amortization_show').html(amotization);
        $('.modal3-title').html('Prestamo :: '+result.id_loans_header);
        getLoansDetailsTransacction();
        $('#LoansModalDetail').modal('show');
    });
}
 

function getLoansDetailsTransacction( ){    
   $.ajax({
        url: BASE_URL+"loans/getTransactionLoans",
        method: "GET",
        dataType:"json",
        data:{
            id:$('#id_realizar_pago').val()} 
    }).done(function(result){
        var html='';
        $(result).each(function(){  
            html += '<tr >';
            html += '<td>'+this.date_transacction+'</td>'; 
            html += '<td>'+this.comments+'</td>'; 
            html += '<td>'+this.value+'</td>';  
            html += '</tr>' ; 
        });   
        $("#loans_transaction_table tbody").html(html); 
    });
}