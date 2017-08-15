<?php

namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Client   extends Model
{ 
    protected $table="client"; 
    protected $primaryKey="id_client"; 

    public function rsCliente(){
        // return $this->hasOne('App\');
    }
 
}
