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
               
                <table class="table table-striped table-bordered table-hover">
                    <tr>
                        <th>ID</th>
                        <th>Intereses</th> 
                        <th>Dia de pago</th>
                        <th>Numero de pagos</th>
                        <th>Capital solicitado</th> 
                    </tr>
                </table>
            </div>
        </div>
        <br>
 