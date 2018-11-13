<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Category extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category', function (Blueprint $table) {
            $table->increments('id');
             $table->string('category_name'); 
             $table->string('category_link'); 
             $table->string('description'); 
             $table->string('image_title'); 
             $table->string('page_type'); 
             $table->integer('hotcategory'); 
             $table->integer('order'); 
             $table->string('image'); 
             $table->integer('status'); 
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
        Schema::dropIfExists('category');
    }
}
