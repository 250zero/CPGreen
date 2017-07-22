<?php

namespace App\Http\Controllers; 
 

class HomeController extends Controller
{
     public function index(){
         $variables = [
             'titulo' => 'Inicio',
             'favicon' => 'fav.ico',
             'user' => 'Admin',
             'homeclass' => 'class="active-menu"'
         ];
         return view('backend/home',$variables);
     }
}
