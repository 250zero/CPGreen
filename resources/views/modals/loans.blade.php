<div class="modal fade" tabindex="-100" role="dialog" id="LoansModal">
  <div class="modal-dialog" role="document"  style="width:70%" >
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal2-title">Modal title</h4>
      </div>
      <div class="modal-body"> 
                  <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#tab__loans_1" aria-controls="tab__loans_1" role="tab" data-toggle="tab">Datos</a></li>
                     <li role="presentation"  ><a href="#tab__loans_2" aria-controls="tab__loans_2" role="tab" data-toggle="tab">Movimientos</a></li>
                 </ul> 

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="tab__loans_1"> @include('backend.client_partials.loans_data')</div>  
                    <div role="tabpanel" class="tab-pane " id="tab__loans_2"> @include('backend.client_partials.loans')</div>  
                </div>

                
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="save_loans">Guardar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->