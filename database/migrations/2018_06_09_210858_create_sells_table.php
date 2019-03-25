<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSellsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sells', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id');
            $table->date('date');
            $table->float('cutting_cost',8,2);
            $table->float('labour_cost',8,2);
            $table->float('previous_due',8,2);
            $table->float('grand_total',8,2);
            $table->float('cheque_paid',8,2);
            $table->float('cash_paid',8,2);
            $table->float('due',8,2);
            $table->float('due',8,2);
            $table->integer('discount');
            $table->text('description')->nullable();
            $table->tinyInteger('full_paid')->length(1);
            $table->integer('user_id');
            $table->tinyInteger('deletion')->length(1);
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
        Schema::dropIfExists('sells');
    }
}
