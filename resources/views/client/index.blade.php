 @include('template_client.header') 
 @include('template_client.navbar')
 @include('template_client.menu')
 <?php
if(!empty($client))
{
    // dd($client);
?>
    <div id="page-wrapper" >
            <div id="page-inner">
            
                            <div class="row">
                                    <div class="col-sm-12">
                                        <div class="col-sm-6">
                                                <h2>Bienvenido {{ucwords($client->name)}}</h2>
                                                <p>Usted dispone de un capital de {{number_format($client->stock)}}$ pesos, al momento puede disponer para prestamos {{number_format($client->stock*2)}}$ pesos</p>
                                        </div>
                                         <div class="col-sm-6"> 
                                             
                                        </div>
                                    </div>
                            </div>
                            
          <hr />        
                            <div class="row">
                                 <div class="col-sm-12">
                                        
                                         <div class="col-sm-8"> 
                                             <h3>Prestamos</h3>
                                                 <table class="table table-striped table-bordered table-hover" > 
                                                    <thead>
                                                        <tr>
                                                                <th>Fecha Inicio</th>
                                                                <th>Fecha Fin</th>
                                                                <th>No. Cuotas</th>
                                                                <th>% interes</th>
                                                                <th>Capital Solicitado</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($loans as $l)
                                                            <tr onclick="getLoansDetails({{ $l->id_loans_header }})" >
                                                                <td>{{ $l->fecha_ini }}</td>
                                                                <td>{{ $l->fecha_fin }}</td>
                                                                <td>{{ $l->no_pay }}</td>
                                                                <td>{{ $l->porcetange }}</td>
                                                                <td>{{ number_format($l->solicituded_stock) }}</td>
                                                            </tr>
                                                        @endforeach 
                                                    </tbody>
                                                </table>       
                                        </div>
                                        <div class="col-sm-4">
                                               <div id="loans_details_client"style="
                                                                            background-color: #1da741;
                                                                            border-radius: 5px;
                                                                            color: white;
                                                                            padding: 5px 5px 10px 10px;
                                                                            display:none;
                                                                        "> 
                                                                                    <br>
                                                                                    <label >Fecha Inicio         :</label>
                                                                                    <label id="date_init_loans_show" ></label>
                                                                                    <br>
                                                                                    <label >Fecha Fin            :</label>
                                                                                    <label id="date_final_loans_show" ></label>
                                                                                    <br>
                                                                                    <label >Capital  solicitado   :</label>
                                                                                    <label id="solicituded_stock_show" ></label>
                                                                                    <br> 
                                                                                    <label >Numero de Cuotas     :</label>
                                                                                    <label id="number_cuotes_show" ></label>
                                                                                    <br>

                                                                                    <label >Pago de Cuotas       :</label>
                                                                                    <label id="cuotes_show" ></label>
                                                                                    <br>

                                                                                    <label >Cuotas Pagadas       :</label>
                                                                                    <label id="paid_cuotes_show" ></label>
                                                                                    <br>

                                                                                    <label >Cuotas Faltantes      :</label>
                                                                                    <label id="rest_cuotes_show" ></label>
                                                                                    <br>

                                                                                    <label >Porciento de  Interes :</label>
                                                                                    <label id="porcentage_cuotes_show" ></label>
                                                                                    <br>

                                                                                    <label >Capital Amortizado    :</label>
                                                                                    <label id="stock_amortization_show" ></label>
                                                                                 
                                               </div>
                                        </div>
                                    </div>
                            </div>
      <div class="row">
        
 <!-- /. col-sm-12 -->
</div>
 <!-- /. Row -->       
 

               
                
            </div>
             <!-- /. PAGE INNER  -->
    </div>

    <?php
    }//fin del if 
     
?>
         <!-- /. PAGE WRAPPER  -->
 
  @include('template_client.footer')

    <script src="{{asset('js/custom/loans2.js')}}"></script> 
 