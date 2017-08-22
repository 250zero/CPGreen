<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
         $id_client = DB::table('client')->insertGetId(
                ['name' => 'Administrador', 'email' => 'info@prueba.com','telephone' => '809' , 'account' => '5153AACA351','stock'=>'5000.0']
         );
         $id_client2 = DB::table('client')->insertGetId(
            ['name' => 'Hansen', 'email' => 'info@prueba.com','telephone' => '809' , 'account' => '5153AACAas351','stock'=>'60000.0']
        );
        DB::table('user')->insert(
            ['username' => 'Admin', 'remember_token'=>'','password' => Hash::make('Admin123'),'id_client' => $id_client,'state' => 1,'level'=>2]
        ); 
        DB::table('user')->insert(
        ['username' => 'hansen', 'remember_token'=>'','password' => Hash::make('123456'),'id_client' => $id_client2,'state' => 1,'level'=>1]
        ); 
         
    }
}
