<?php

namespace App\Http\Controllers; 
 

class SavingsController extends Controller
{
     private $variables = [] ;


    function __construct(){
        $this->middleware('auth');
        $this->variables = [
             'titulo' => 'Ahorros',
             'favicon' => 'fav.ico',
             'user' => 'Admin',
             'savingsclass' => 'class="active-menu"'
         ];
    }

     public function index(){ 
         
         return view('backend/savings',$this->variables);
     } 
     
}
