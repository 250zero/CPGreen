<?php

namespace App\Http\Controllers; 
use  App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
 

class LoginController extends Controller
{  
    public function __construct(){
      
         
    }

    public function index()
    {
        return view('login/login');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }

    public function login(Request $r)
    {
        $user = User::where('username',$r->username)->where('state',1)->first();
        if(empty($user)){
              return redirect('login');   
        }
        if (Hash::check($r->password, $user->password))
        {
            
            Auth::login($user);
            if($user->level == 2)
            {
                return redirect('/');
            } 
            return redirect('/dashboard/Client');
        }
        return redirect('login');
    }
    public function loginMobile(Request $r)
    {
        if(!$r->has('username') )
        {
            return ['msn'=>'Faltan el campos de usuario','state'=>0];   
        }
        if(!$r->has('password'))
        {
            return ['msn'=>'Faltan el campos de Contraseña','state'=>0];   
        } 
        $user = User::where('username',$r->username)
                    ->where('state',1)
                    ->where('level',1)
                    ->first();
        if(empty($user)){
              return ['msn'=>'usuario o clave incorrecta','state'=>0];   
        }
        if (Hash::check($r->password, $user->password))
        {   
            return ['msn'=>'Bienvenido','state'=>1];   
        } 
        return ['msn'=>'Favor comunicarse con su proveedor','state'=>0];   
    }
 
}
