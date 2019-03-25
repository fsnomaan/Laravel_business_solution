<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdjustmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adjustments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('product_id',15);
            $table->string('product_code',15)->nullable();
            $table->integer('product_detail_id')->nullable();
            $table->float('weight',8,2)->nullable();
            $table->integer('piece')->nullable();
            $table->string('lc_code',50)->nullable();
            $table->string('description',100)->nullable();
            $table->text('comment')->nullable();
            $table->date('date')->nullable();
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
        Schema::dropIfExists('adjustments');
    }
}
