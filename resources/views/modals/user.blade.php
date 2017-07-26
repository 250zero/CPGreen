<div class="modal fade" tabindex="-1" role="dialog" id="UserModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      <div class="modal-body"> 
      <input class="form-control" type="hidden" value="0" id="id_user" name="id_user">
                 {{ csrf_field() }}
                    <div class="form-group">
                        <label>Usuario</label>
                        <input class="form-control" type="text" id="username" name="username">
                    </div>
                    <div class="form-group">
                        <label>Contraseña</label>
                            <div class="form-group" id="habilitar_cambiar">
                                <label>Cambiar?</label>
                                <input type="checkbox" name="habilitar_change_p" id="habilitar_change_p" >
                            </div>
                        <input class="form-control" type="password" id="password" name="password">
                    </div>
                    <div class="form-group">
                        <label>Nivel de usuario</label>
                        <select name="level" id="level" class="form-control">
                            <option value="1">Movil</option>
                            <option value="2">Web</option>
                        </select>
                    </div>  
                    <div class="form-group" style="display:none" id="cliente_movil_div">
                        <label>Cliente</label>
                        <input type="hidden" name="cliente_movil" id="cliente_movil" class="form-control" value="0">
                         <br> <button id="btn_cliente_movil" class="btn btn-primary">Seleccionar..</button> 
                    </div>
                     <div class="form-group">
                        <label>Estado del usuario</label>
                        <select name="state" id="state" class="form-control">
                            <option value="1">Habilitado</option>
                            <option value="0">Deshabilitado</option>
                        </select>
                    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="save_client">Guardar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->