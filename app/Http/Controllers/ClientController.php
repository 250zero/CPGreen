<?php

namespace App\Http\Controllers; 
use  App\Models\Client;
use  App\Models\Loans;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
 

class ClientController extends Controller
{
    private $variables = [] ; 
    function __construct(){
      $this->middleware('auth');
      $this->variables = [
             'titulo' => 'Cliente',
             'favicon' => 'fav.ico',
             'user' => '',
             'clientclass' => 'class="active-menu"'
         ];
         
    }

     public function index(Request $r){ 
         $search = '';
         if($r->has('search'))
         {
             $search = $r->search;
         }
         $this->variables['search']=$search;
         $this->variables['clients'] = Client::where('name','like','%'.$search.'%')
         ->paginate(10);
         return view('backend/client',$this->variables);
     }

     
     public function dashboard(){  
          $user = Auth::user();
          $this->variables['client'] = Client::find($user->id_client) ;
          $this->variables['loans'] =  Loans::where('id_client',$user->id_client)->get();
          return view('client/index',$this->variables);
     }

     public function search(){  
         return Client::paginate(10);
     }
     public function profile(Request $r){  
         if(!$r->has('id'))
         {
             return ['status'=>0,'msn'=>'El id no se encuentra presente'];
         }
         return Client::find($r->id);
     }
     public function save(Request $r){  
         if(empty($r->id_client))
         {
             $client = new Client();
         }
         else
         {
             $client = Client::find($r->id_client);
         }
         $client->email = $r->email;
         $client->name = $r->client_name;
         $client->telephone = $r->telephone;
         $client->account = $r->account;
         $client->stock = $r->stock; 
         $client->save();
         if($client->id_client)
         {
             return ['msn'=>'Operación exitosa','status'=>1];
         }
         else
         {
             return ['msn'=>'El registro no pudo ser actualizado','status'=>0];
         }
         
     }
}
