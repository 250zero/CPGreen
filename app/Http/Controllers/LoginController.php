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
        $user = User::where('username',$r->username)->first();
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
 
}
