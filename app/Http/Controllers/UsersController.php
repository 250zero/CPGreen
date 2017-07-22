<?php

namespace App\Http\Controllers; 
 

class UsersController extends Controller
{
    private $variables = [] ;


    function __construct(){
        $this->variables = [
             'titulo' => 'Usuarios',
             'favicon' => 'fav.ico',
             'user' => 'Admin',
             'usersclass' => 'class="active-menu"'
         ];
    }
    public function index(){ 
         return view('backend/users',$this->variables);
     }
}
