<?php

namespace App\Http\Controllers; 
use  App\Models\Client;
 

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

     public function index(){ 
         
         return view('backend/client',$this->variables);
     }

     public function search(){  
         return Client::paginate(10);
     }
}
