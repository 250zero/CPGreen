<input class="form-control" type="hidden" value="0" id="id_client" name="id_client">
                 {{ csrf_field() }}

<br>
      <div class="row"> 
            <div class="col-sm-5"> 
                    <div class="form-group">
                        <label>Cuenta</label> 
                        <input class="form-control" type="text" id="cuenta_socio" name="cuenta_socio">
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
                        <input class="form-control" type="text" id="capital" name="capital">
                    </div>  
            </div>

      </div><br>
      <div class="row"> 
            <div class="col-sm-12"> 
                <table class="table table-striped table-bordered table-hover">
                    <tr>
                        <th>ID</th>
                        <th>Producto</th> 
                        <th>Ultimo movimiento</th>
                        <th>Balance</th>
                    </tr>
                </table>
            </div>
        </div>
        <br>
 