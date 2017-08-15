<input class="form-control" type="hidden" value="0" id="id_client" name="id_client">
                 {{ csrf_field() }}

<br>
      <div class="row"> 
            <div class="col-sm-5"> 
                    <div class="form-group">
                        <label>Cuenta</label>  
                        <input class="form-control" type="text" id="account" name="account">
                    </div>
                    <div class="form-group">
                        <label>Nombre</label>
                        <input class="form-control" type="text" id="client_name" name="client_name">
                    </div>
            </div>
            <div class="col-sm-5"> 
                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" type="email" id="email" name="email">
                    </div> 
                    <div class="form-group">
                        <label>Telefono</label>
                        <input class="form-control" type="text" id="telephone" name="telephone">
                    </div>
            </div>
              <div class="col-sm-5"> 
                    <div class="form-group">
                        <label>Capital</label>
                        <input class="form-control" type="text" id="stock" name="stock">
                    </div>  
            </div>

      </div> 
      <div class="row"> 
            <div class="col-sm-12"> 
                <h3>Prestamos  <button class="btn btn-primary" id="add_loans"><li class="fa fa-plus  "></li></button></h3> 
               
                <table id="header_loans" class="table table-striped table-bordered table-hover">
                  <thead>
                        <tr>
                        <th>Fecha Inicio</th>
                        <th>Fecha Final</th>  
                        <th>Porciento</th>
                        <th>Cuotas</th>
                        <th>Capital Amortizado</th> 
                    </tr>
                </thead>
                <tbody></tbody>
                </table>
            </div>
        </div>
        <br>
 