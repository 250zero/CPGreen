<?php

namespace App\Http\Controllers; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
 

class HomeController extends Controller
{
     private $variables = [] ;


    function __construct(){
        $this->middleware('auth');
        $this->variables = [
             'titulo' => 'Inicio',
             'favicon' => 'fav.ico',
             'user' => 'Admin',
             'homeclass' => 'class="active-menu"',
             'totalCliente'=>DB::table('client')->count(),
             'totalSavings'=>DB::table('client')->select(DB::raw('sum(stock) as totalStock'))->first(),
             'totalLoans'=>DB::table('loans_header')->select(DB::raw('sum(cuotes * no_pay) as totalSolicitaded'))->first(),
         ];
    }

     public function index(){ 
         
         return view('backend/home',$this->variables);
     }
 
}
