<?php

namespace App\Http\Controllers; 
use Illuminate\Support\Facades\DB;
 

class HomeController extends Controller
{
     private $variables = [] ;


    function __construct(){
        $this->variables = [
             'titulo' => 'Inicio',
             'favicon' => 'fav.ico',
             'user' => 'Admin',
             'homeclass' => 'class="active-menu"',
             'totalCliente'=>DB::table('client')->count(),
             'totalSavings'=>DB::table('client')->select(DB::raw('sum(stock) as totalStock'))->first(),
             'totalLoans'=>DB::table('loans_header')->select(DB::raw('sum(solicituded_stock) as totalSolicitaded'))->first(),
         ];
    }

     public function index(){ 
         
         return view('backend/home',$this->variables);
     }
 
}
