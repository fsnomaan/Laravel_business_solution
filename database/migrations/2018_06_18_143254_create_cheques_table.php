<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChequesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cheques', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id');
            $table->integer('sell_id');
            $table->float('amount',8,2);
            $table->float('due_amount',8,2);
            $table->string('cheque_no',30);
            $table->string('bank_name',30);
            $table->date('received_date')->nullable();
            $table->date('withdrawal_date')->nullable();
            $table->integer('parent_cheque_id');
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
        Schema::dropIfExists('cheques');
    }
}
