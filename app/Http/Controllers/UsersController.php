<?php

namespace App\Http\Controllers; 
use  App\Models\User;
 

class UsersController extends Controller
{
    private $variables = [] ;
    private $limit ;

    function __construct(){
        $this->limit=10;
        $this->variables = [
             'titulo' => 'Usuarios',
             'favicon' => 'fav.ico',
             'user' => 'Admin',
             'usersclass' => 'class="active-menu"'
         ];
    }
    public function index(){ 
         $this->variables['users'] = User::with('rsClient')->where('state',1)->paginate($this->limit);
         return view('backend/users',$this->variables);
     }
}
