<?php

namespace App\Http\Controllers; 
use  App\Models\Loans; 
use Illuminate\Http\Request;

class LoanController extends Controller
{ 
     private $variables = [] ;


    function __construct(){
        $this->middleware('auth');
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
    public function getLoansDetail(Request $r)
    {
        return Loans::where('id_loans_header',$r->id)->first();
    }
     public function getLoans(Request $r)
     {
            return Loans::where('id_client',$r->id)->get();
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
        $loans->fecha_ini= $r->date_init_loans;  
        $loans->fecha_fin= $r->date_final_loans;  
        $loans->no_pay= $r->cuotes;  
        $loans->cuotes= $r->cuotes_paid;  
        if($r->id_loans <=0){ 
            $loans->rest_cuotes= 0;  
            $loans->cuotes_paid= 0;  
        }
        $loans->porcetange= $r->interest;  
        $loans->solicituded_stock= $r->solicituded_stock;  
        $loans->save(); 
        if(!empty($loans->id_loans_header))
        {
            return ['msn'=>'Operacion exitosa','status'=>1];
        }
        return ['msn'=>'Hubo inconvenientes en la actualizacion del registro','status'=>0];
     } 
}
