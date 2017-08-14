<?php

namespace App\Http\Controllers; 
use  App\Models\Client;
use Illuminate\Http\Request;
 

class UtilityController extends Controller
{
    private $variables = [] ;


    function transacction_type(){
        return [
            [   'ID' => '01',
                'DESCRIPTION' => 'DEBITO'],
            [   'ID' => '02',
                'DESCRIPTION' => 'CREDITO']
        ];
    } 
    function period_pay(){
        return [
            [   'ID' => '01',
                'DESCRIPTION' => 'QUINCENAL'],
            [   'ID' => '02',
                'DESCRIPTION' => 'MENSUAL']
        ];
    }
}
