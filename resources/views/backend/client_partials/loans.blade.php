 <br> 
 <div class="row">
     <div class="col-sm-12" >
        <div class='col-sm-4' style="
    background-color: #1da741;
    border-radius: 5px;
    color: white;
    padding: 5px 5px 10px 10px;
">
               <br>
               <label >Fecha Inicio :</label>
               <label id="date_init_loans_show" ></label>
               <br>
               <label >Fecha Fin :</label>
               <label id="date_final_loans_show" ></label>
               <br>
               <label >Capital Solicitado:</label>
               <label id="solicituded_stock_show" ></label>
               <br> 
               <label >Numero de Cuotas :</label>
               <label id="number_cuotes_show" ></label>
               <br>

               <label >Cuotas :</label>
               <label id="cuotes_show" ></label>
               <br>

               <label >Cuotas Pagadas :</label>
               <label id="paid_cuotes_show" ></label>
               <br>

               <label >Cuotas Faltantes :</label>
               <label id="rest_cuotes_show" ></label>
               <br>

               <label >% Interes :</label>
               <label id="porcentage_cuotes_show" ></label>
               <br>

               <label >Capital Amortizado :</label>
               <label id="stock_amortization_show" ></label>
               <br> <br>
               <button class="btn btn-warning" id="realizar_pago">Hacer Pago</button> 
               <input type="hidden" value="0" class="btn btn-warning" id="id_realizar_pago"> 
            </div>  
        <div class='col-sm-8' style="overflow:auto;height: 450px;" >
            <table id="loans_transaction_table" class="table table-striped table-bordered table-hover"  >
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Comentario</th> 
                        <th>Monto</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
            </div>  
      </div>

 </div>