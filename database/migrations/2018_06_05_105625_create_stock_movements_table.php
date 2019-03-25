<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockMovementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_movements', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id');
            $table->float('weight',8,2)->nullable();
            $table->integer('piece')->nullable();
            $table->integer('coil')->nullable();
            $table->string('location',100)->nullable();
            $table->string('remark',100)->nullable();
            $table->date('entry_date')->nullable();
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
        Schema::dropIfExists('stock_movements');
    }
}
