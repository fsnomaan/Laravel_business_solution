<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('product_code',15)->nullable();
            $table->string('product_name',100)->nullable();
            $table->text('description')->nullable();
            $table->string('color',10)->nullable();
            $table->float('height',8,2)->nullable();
            $table->string('style',25)->nullable();
            $table->float('thickness',8,2)->nullable();
            $table->float('width',8,2)->nullable();
            $table->text('comment')->nullable();
            $table->string('remark',100)->nullable();
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
        Schema::dropIfExists('product_details');
    }
}
