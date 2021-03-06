 @include('template.header') 
 @include('template.navbar')
 @include('template.menu')
    <div id="page-wrapper" >
            <div id="page-inner">
                  <!-- /. ROW  -->
                  <hr />
                <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-green set-icon">
                    <i class="fa fa-users"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text">Total de Clientes: {{number_format($totalCliente)}}</p>
                    <!-- <p class="text-muted">Remaining</p> -->
                </div>
             </div>
		     </div>
                    <div class="col-md-4 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-blue set-icon">
                    <i class="fa fa-money"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text">Capital Acululado por Cliente:
                         {{number_format($totalSavings->totalStock)}}$</p>
                    <!-- <p class="text-muted">Notifications</p> -->
                </div>
             </div>
		     </div>
                    <div class="col-md-4 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-brown set-icon">
                    <i class="fa fa-rocket"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text">Total en prestamos a recibir: {{number_format($totalLoans->totalSolicitaded)}}$</p>
                    <!-- <p class="text-muted">Pending</p> -->
                </div>
             </div>
		     </div>
			</div>
                 <!-- /. ROW  -->
                 <hr />
               
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
 
  @include('template.footer')

 