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