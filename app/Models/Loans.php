<?php

namespace App\Models;
  
class Loans  
{ 
    protected $table="loans_header"; 
    protected $primaryKey="id_loans_header";
    protected $hidden = [
        'password' 
    ];

    public function rsClient(){
        return $this->hasOne('App\Models\Client','id_client','id_client');
    }
 
}
