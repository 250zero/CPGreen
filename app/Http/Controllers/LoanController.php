<?php

namespace App\Http\Controllers; 
 

class LoanController extends Controller
{ 
     private $variables = [] ;


    function __construct(){
        $this->variables = [
             'titulo' => 'Prestamos',
             'favicon' => 'fav.ico',
             'user' => 'Admin',
             'loanclass' => 'class="active-menu"'
         ];
    }

     public function index(){ 
         
         return view('backend/loan',$this->variables);
     } 
}
