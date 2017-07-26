<?php

namespace App\Models;
 
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{ 
    protected $table="user"; 
    protected $primaryKey="id_user";
    protected $hidden = [
        'password' 
    ];

    public function rsClient(){
        return $this->hasOne('App\Models\Client','id_client','id_client');
    }
 
}
