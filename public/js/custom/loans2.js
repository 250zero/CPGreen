var fecha_ini='';
var fecha_fin='';
var date ;
 var cuotes = 0 ;




function getLoansDetails(id){ 
    var amotization =0; 
     $("#loans_details_client").slideUp();
   $.ajax({
        url: BASE_URL+"loans/get_loans_detail",
        method: "GET",
        dataType:"json",
        data:{id:id} 
    }).done(function(result){
        var fi = new Date();   
        var amotization = result.solicituded_stock - ((result.cuotes / result.no_pay) * result.cuotes_paid);
        $('#date_init_loans_show').html(result.fecha_ini);
        $('#date_final_loans_show').html(result.fecha_fin);
        $('#solicituded_stock_show').html(result.solicituded_stock);
        $('#number_cuotes_show').html(result.no_pay);
        $('#cuotes_show').html(result.cuotes);
        $('#paid_cuotes_show').html(result.cuotes_paid);
        $('#rest_cuotes_show').html(result.rest_cuotes);
        $('#porcentage_cuotes_show').html(result.porcetange);
        $('#stock_amortization_show').html(amotization); 
        $("#loans_details_client").slideToggle();
         
    });
}
 