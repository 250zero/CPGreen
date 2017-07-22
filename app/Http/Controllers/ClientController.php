<?php

namespace App\Http\Controllers; 
 

class ClientController extends Controller
{
     public function index(){
        $variables = [
             'titulo' => 'Inicio',
             'favicon' => 'fav.ico',
             'user' => 'Admin',
             'clientclass' => 'class="active-menu"'
         ];
         return view('backend/home',$variables);
     }
}
