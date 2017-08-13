<?php

namespace App\Http\Controllers; 
 

class HomeController extends Controller
{
     private $variables = [] ;


    function __construct(){
        $this->variables = [
             'titulo' => 'Inicio',
             'favicon' => 'fav.ico',
             'user' => 'Admin',
             'homeclass' => 'class="active-menu"'
         ];
    }

     public function index(){ 
         
         return view('backend/home',$this->variables);
     }
 
}
