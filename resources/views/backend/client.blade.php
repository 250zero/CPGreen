 @include('template.header') 
 @include('template.navbar')
 @include('template.menu')
    <div id="page-wrapper" >
            <div id="page-inner">
               
                            <div class="row">
         <div class="col-sm-12">
              <div class="col-sm-10">
                      <form method="GET" >
                  <div class="input-group"> 
                      <input type="text" class="form-control" name="search" value="{{$search}}"> 
                      <div class="input-group-addon"><li class="fa fa-search "></li></div> 
                  </div>
                   </form>
              </div>
              
              <div class="col-sm-2">
                  <button class="btn btn-primary" id="btn_nuevo"><li class="fa fa-client  "></li> Nuevo</button>
              </div>
         </div>
      </div>
          <hr />        
      <div class="row">
         <div class="col-sm-12">
      <table class="table table-striped table-bordered table-hover" > 
          <thead>
              <tr>
                    <th>Cuenta</th>
                    <th>Cliente</th>
                    <th>Email</th>
                    <th>Telefono</th>
              </tr>
          </thead>
          <tbody>
              @foreach ($clients as $client)
                  <tr onclick="getProfile({{ $client->id_client }})" >
                      <td>{{ $client->account }}</td>
                      <td>{{ $client->name }}</td>
                      <td>{{ $client->email }}</td>
                      <td>{{ $client->telephone }}</td>
                  </tr>
              @endforeach
          </tbody>
      </table>      
{{ $clients->links() }}
</div>
<style>
td:hover { 
      cursor:pointer;
}
</style>
 <!-- /. col-sm-12 -->
</div>
 <!-- /. Row -->       


               
                
            </div>
             <!-- /. PAGE INNER  -->
    </div>
         <!-- /. PAGE WRAPPER  -->
 
  @include('template.footer')
  @include('modals.client')
  @include('modals.loans')

    <script src="{{asset('js/custom/client.js')}}"></script> 
    <script src="{{asset('js/custom/loans.js')}}"></script> 
 