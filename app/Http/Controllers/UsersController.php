<?php

namespace App\Http\Controllers; 
 

class UsersController extends Controller
{
     public function index(){
         $variables = [
             'titulo' => 'Inicio',
             'favicon' => 'fav.ico',
             'user' => 'Admin',
             'usersclass' => 'class="active-menu"'
         ];
         return view('backend/home',$variables);
     }
}
