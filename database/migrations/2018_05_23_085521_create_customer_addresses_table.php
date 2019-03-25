<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id');
            $table->text('address')->nullable();
            $table->string('city',25)->nullable();
            $table->string('thana',25)->nullable();
            $table->string('district',25)->nullable();
            $table->string('house_number',10)->nullable();
            $table->text('road_name',25)->nullable();
            $table->text('comment')->nullable();
            $table->integer('user_id');
            $table->tinyInteger('current')->length(1);
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
        Schema::dropIfExists('customer_addresses');
    }
}
