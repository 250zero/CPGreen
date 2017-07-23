 @include('template.header') 
 @include('template.navbar')
 @include('template.menu')
 @include('modals.user')
    <div id="page-wrapper" >
            <div id="page-inner">
            
      <div class="row">
         <div class="col-sm-12">
              <div class="col-sm-10">
                      <form method="GET" >
                  <div class="input-group"> 
                      <input type="text" class="form-control" name="search"> 
                      <div class="input-group-addon"><li class="fa fa-search "></li></div> 
                  </div>
                   </form>
              </div>
              
              <div class="col-sm-2">
                  <button class="btn btn-primary" id="btn_nuevo"><li class="fa fa-user  "></li> Nuevo</button>
              </div>
         </div>
      </div>
          <hr />        
      <div class="row">
         <div class="col-sm-12">
      <table class="table table-striped table-bordered table-hover" > 
          <thead>
              <tr>
                    <th>Usuario</th>
                    <th>Cliente</th>
                    <th>Estado</th>
                    <th>Nivel</th>
              </tr>
          </thead>
          <tbody>
              @foreach ($users as $user)
                  <tr onclick="getProfile({{ $user->id_user }})" >
                      <td>{{ $user->username }}</td>
                      <td>{{ $user->rsClient->name }}</td>
                      <td>{{ $user->state }}</td>
                      <td>{{ $user->level }}</td>
                  </tr>
              @endforeach
          </tbody>
      </table>      
{{ $users->links() }}
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
  
    <script src="{{asset('js/custom/user.js')}}"></script> 

 