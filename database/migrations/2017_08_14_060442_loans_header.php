<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LoansHeader extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('loans_header', function (Blueprint $table) {
            $table->increments('id_loans_header')->unique();
            $table->integer('id_client');
            $table->date('fecha_ini');
            $table->date('fecha_fin');
            $table->integer('no_pay');
            $table->integer('porcetange');  
            $table->float('cuotes');  
            $table->float('rest_cuotes');  
            $table->float('cuotes_paid');  
            $table->float('solicituded_stock'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
          Schema::dropIfExists('loans_header');
    }
}
