<?php

namespace App\Http\Controllers; 
use  App\Models\Loans; 
use Illuminate\Http\Request;

class LoanController extends Controller
{ 
     private $variables = [] ;


    function __construct(){
        $this->variables = [
             'titulo' => 'Prestamos',
             'favicon' => 'fav.ico',
             'user' => 'Admin',
             'loanclass' => 'class="active-menu"'
         ];
    }

     public function index(){ 
         
         return view('backend/loan',$this->variables);
     } 
      public function save(Request $r){ 
          if($r->id_client <=0 ){
              return ['msn'=>'El cliente no existe','status'=>0];
          }
         if(!empty($r->id_loans))
         {
             $loans = Loans::find($r->id_loans);
         }
         else
         {
              $loans = new Loans();
         } 

        $loans->id_client= $r->id_client; 
        $loans->no_pay = $r->aaaaaaa; 
        $loans->period_pay= 1; 
        $loans->porcetange= $r->interest; 
        $loans->duration= $r->aaaaaaa; 
        $loans->amortization= $r->aaaaaaa; 
        $loans->solicituded_stock= $r->solicituded_stock; 
        $loans->pay_day= $r->date_init_loans;   
        $loans->save(); 
     } 
}
