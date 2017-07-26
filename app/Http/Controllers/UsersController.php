<?php

namespace App\Http\Controllers; 
use  App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
 

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

     public function profile(Request $r){
         if(!$r->has('id'))
         {
                return response()->json('No se encontro el id',404);
         }
         return User::with('rsClient')->where('id_user',$r->id)->first();
     }

     public function save(Request $r){ 
            $user = [];
            $return = 0;
            if($r->id_user > 0)
            {
                $user = User::find($r->id_user);
                $user->username = $r->username;
                if($r->check_password == true)
                {
                    $user->password = Hash::make($r->password);
                } 
                $user->state = $r->state;
                $user->id_client = $r->id_client;
                $user->level = $r->level; 
                $user->save();
                $return = $user->id_user;
            }
            else
            {
                $user = new  User(); 
                $user->id_client = $r->id_client;
                $user->username = $r->username;
                $user->password = Hash::make($r->password);
                $user->state = $r->state;
                $user->level = $r->level; 
                $user->save();
                $return = $user->id_user;
            }
            if($return > 0)
            {
                return ['status' => 1,'msn' => 'Usuario Creado con exito'];
            }
            else
            {
                 return ['status' => 0,'msn' => 'Se perdio la conexion con el servidor'];
            }
            
     }
}
