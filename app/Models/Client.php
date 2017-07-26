<?php

namespace App\Models;
 
use Illuminate\Foundation\Auth\User as Authenticatable;

class Client extends Authenticatable
{ 
    protected $table="client"; 
    protected $primaryKey="id_client"; 

    public function rsCliente(){
        // return $this->hasOne('App\');
    }
 
}
