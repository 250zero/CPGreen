<?php

namespace App\Http\Controllers; 
use  App\Models\Client;
use Illuminate\Http\Request;
 

class ClientController extends Controller
{
    private $variables = [] ;


    function __construct(){
      $this->variables = [
             'titulo' => 'Cliente',
             'favicon' => 'fav.ico',
             'user' => 'Admin',
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
}
