<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelatedProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('related_product', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->unsigned();            
            $table->foreign('product_id')->references('id')->on('product')->onDelete('cascade');
            $table->string('related_product');             
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
        Schema::dropIfExists('related_product');
    }
}
