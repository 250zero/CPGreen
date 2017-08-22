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
        var amotization =  result.solicituded_stock -   (result.cuotes_paid  - ( result.cuotes_paid *(result.porcetange / 100)))  ; 
        $('#date_init_loans_show').html(result.fecha_ini);
        $('#date_final_loans_show').html(result.fecha_fin);
        $('#solicituded_stock_show').html(Math.round(result.solicituded_stock));
        $('#number_cuotes_show').html(result.no_pay);
        $('#cuotes_show').html(result.cuotes);
        $('#paid_cuotes_show').html(result.cuotes_paid);
        $('#rest_cuotes_show').html(result.rest_cuotes);
        $('#porcentage_cuotes_show').html(Math.round(result.porcetange));
        $('#stock_amortization_show').html(Math.round(amotization)); 
        $("#loans_details_client").slideToggle();
         
    });
}
 