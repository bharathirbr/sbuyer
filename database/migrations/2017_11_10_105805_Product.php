<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Product extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('product', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('title'); 
            $table->text('description'); 
            $table->float('rate'); 
            $table->integer('quantity');
            $table->float('min_price'); 
            $table->float('offer_price'); 
            $table->float('discount_price');
            $table->integer('category_id')->unsigned();            
            $table->foreign('category_id')->references('id')->on('category');
            $table->integer('subcategory_id')->unsigned();            
            $table->foreign('subcategory_id')->references('id')->on('subcategory');
            $table->integer('brand_id')->unsigned();            
            $table->foreign('brand_id')->references('id')->on('brand');
            $table->string('image')->nullable();     
            $table->string('image_title'); 
            $table->string('image_alt'); 
            $table->string('status'); 
            $table->string('metatitle'); 
            $table->string('metakeyword'); 
            $table->string('metadescription');           
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
         Schema::dropIfExists('product');
    }
}
