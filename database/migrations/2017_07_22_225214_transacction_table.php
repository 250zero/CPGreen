<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TransacctionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
    {
        Schema::create('transaction', function (Blueprint $table) {
            $table->increments('id_transaction');
            $table->integer('id_product'); 
            $table->float('value'); 
            $table->string('comments',250); 
            $table->dateTimeTz('date_transacction');
            $table->integer('id_user');
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
         Schema::dropIfExists('transaction');
    }
}
