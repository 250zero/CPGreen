<?php

namespace App\Http\Controllers; 
use  App\Models\Loans; 
use  App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Carbon\Carbon;

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

    public function payLoans(Request $r){
            if(!$r->has('id')){
                return ['msn'=>'Este prestamo no contiene identificador','status'=>0];
            }
            $user = Auth::user();
            $loans = Loans::where('id_loans_header',$r->id)->first();
            $rest_cuotes = $loans->rest_cuotes - 1;
            $no_pay = $loans->no_pay - 1;
            $cuotes_paid = $loans->cuotes + $loans->cuotes_paid;
            $rest_cuotes = ( ($loans->solicituded_stock * ( $loans->porcetange / 100 ) ) + $loans->solicituded_stock ) - $loans->cuotes;
            Loans::where('id_loans_header',$r->id)->update([
                'rest_cuotes'=>$rest_cuotes,
                'no_pay'=>$no_pay,
                'cuotes_paid'=>$cuotes_paid                
            ]);
            Transaction::insert([
                'id_product'=>$r->id,
                'value'=>$loans->cuotes,
                'comments'=>'Pago de cuota al prestamo No.'.$r->id.', quedando restante '.$rest_cuotes,
                'date_transacction'=>Carbon::now(-4),
                'id_user'=>$user->id_user 
            ]);
            return ['msn'=>'Transaccion exitosa','status'=>1];

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
            $loans->rest_cuotes= (($r->solicituded_stock * ($r->interest/100)) +  $r->solicituded_stock)  ;  
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
