<?php

namespace App\Http\Controllers; 
 

class SavingsController extends Controller
{
     public function index(){
         $variables = [
             'titulo' => 'Inicio',
             'favicon' => 'fav.ico',
             'user' => 'Admin',
             'savingsclass' => 'class="active-menu"'
         ];
         return view('backend/home',$variables);
     }
}
