<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            $table->increments('id');
            $table->string('company_name',50)->nullable();
            $table->string('company_name_bn',50)->nullable();
            $table->string('owner_name',50)->nullable();
            $table->string('owner_name_bn',50)->nullable();
            $table->string('mobile',15)->nullable();
            $table->string('phone',15)->nullable();
            $table->tinyInteger('rating')->length(1)->nullable();
            $table->float('cash_due',8,2);
            $table->float('cheque_due',8,2);
            $table->float('total_due',8,2);
            $table->string('remark',100)->nullable();
            $table->text('comment')->nullable();
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
        Schema::dropIfExists('customers');
    }
}
