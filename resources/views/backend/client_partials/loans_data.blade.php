 <br> 
 <div class="row">
     <div class="col-sm-12" >
        <div class='col-sm-4'> 
                    <div class="form-group">
                          {{ csrf_field() }}
                        <label>Capital a Solicitar</label>
                        <input type='text' class="form-control" id="solicituded_stock">
                        <input type='hidden' class="form-control" id="id_loans"> 
                        </div>
                    <div class="form-group">
                        <label>Interes</label>
                         <input type='text' class="form-control" id="interest">
                        </div>
                     <div class="form-group" style= "
    background-color: #1d9a0e;
    color: white;
    padding: 5px;
    border-radius: 5px;
">
                          <label>Periodo de Pago: Mensual</label>
                           <br> 
                           <br> 
                           <label>Fecha Inicio</label>
                         <input type='date' class="form-control" id="date_init_loans">
                         <label>Fecha Final</label>
                         <input type='date' class="form-control" id="date_final_loans">
                         <br><button class="btn btn-warning" id="calculate_loans" >Calcular</button>
                        </div>  
            </div>  
        <div class='col-sm-8' style="overflow:auto;height: 450px;" >
            <table  id="loans_amortization_table"  class="table table-striped table-bordered table-hover" >
                <thead>
                    <tr>
                        <th> #</th>
                        <th>Cuotas</th>
                        <th>Intereses</th> 
                        <th>Amortización</th>
                        <th>Capital vivo</th>
                        <th>Capital Amortizado</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
            </div>  
      </div>

 </div>