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
            $table->integer('no_pay');
            $table->date('period_pay');
            $table->integer('porcetange');
            $table->integer('duration');
            $table->float('amortization');
            $table->float('solicituded_stock');
            $table->date('pay_day');  
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
