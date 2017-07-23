<?php

namespace App\Models;
 
use Illuminate\Foundation\Auth\User as Authenticatable;

class Client extends Authenticatable
{ 
    protected $table="client"; 
    protected $hidden = [
        'password' 
    ];

    public function rsCliente(){
        // return $this->hasOne('App\');
    }
 
}
