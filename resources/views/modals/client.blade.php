<div class="modal fade" tabindex="-1" role="dialog" id="ClientModal">
  <div class="modal-dialog" role="document" style="width:70%" >
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      <div class="modal-body"> 
                 <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#tab_1" aria-controls="tab_1" role="tab" data-toggle="tab">Datos</a></li>
                    <li role="presentation"><a href="#tab_2" aria-controls="tab_2" role="tab" data-toggle="tab">Ahorros</a></li>
                    <li role="presentation"><a href="#tab_3" aria-controls="tab_3" role="tab" data-toggle="tab">Prestamos</a></li>
                    <li role="presentation"><a href="#tab_4" aria-controls="tab_4" role="tab" data-toggle="tab">Ultimos Movimientos</a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="tab_1"> @include('backend.client_partials.data')</div>
                    <div role="tabpanel" class="tab-pane" id="tab_2"> </div>
                    <div role="tabpanel" class="tab-pane" id="tab_3"> </div>
                    <div role="tabpanel" class="tab-pane" id="tab_4"></div>
                </div>

                
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="save_client">Guardar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->