<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('product_code',15)->nullable();
            $table->integer('product_detail_id');
            $table->float('weight',8,2)->nullable();
            $table->integer('piece')->nullable();
            $table->integer('coil')->nullable();
            $table->string('location',100)->nullable();
            $table->integer('original_id');
            $table->string('lc_code',50)->nullable();
            $table->string('remark',100)->nullable();
            $table->date('entry_date')->nullable();
            $table->text('comment')->nullable();
            $table->float('available_weight',8,2)->nullable();
            $table->integer('available_piece')->nullable();
            $table->integer('available_coil')->nullable();
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
        Schema::dropIfExists('products');
    }
}
