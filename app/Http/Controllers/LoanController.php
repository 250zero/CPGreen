<?php

namespace App\Http\Controllers; 
 

class LoanController extends Controller
{
     public function index(){
      $variables = [
             'titulo' => 'Inicio',
             'favicon' => 'fav.ico',
             'user' => 'Admin',
             'loanclass' => 'class="active-menu"'
         ];
         return view('backend/home',$variables);
     }
}
