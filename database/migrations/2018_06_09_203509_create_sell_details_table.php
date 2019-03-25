<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSellDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sell_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sell_id');
            $table->integer('product_id');
            $table->string('product_code',15)->nullable();
            $table->integer('piece')->nullable();
            $table->integer('coil')->nullable();
            $table->float('weight',8,2)->nullable();
            $table->float('unit_price',8,2);
            $table->text('description')->nullable();
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
        Schema::dropIfExists('sell_details');
    }
}
