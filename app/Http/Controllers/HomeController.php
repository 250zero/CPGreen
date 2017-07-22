<?php

namespace App\Http\Controllers; 
 

class HomeController extends Controller
{
     public function index(){
         $variables = [
             'titulo' => 'Inicio',
             'favicon' => 'fav.ico',
             'user' => 'Admin'
         ];
         return view('backend/home',$variables);
     }
}
