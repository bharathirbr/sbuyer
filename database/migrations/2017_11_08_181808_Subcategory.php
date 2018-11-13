<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Subcategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subcategory', function (Blueprint $table) {
            $table->increments('id');           
            $table->string('subcategory'); 
            $table->string('link'); 
            $table->string('content'); 
            $table->string('imagealt'); 
            $table->string('imagename'); 
            $table->string('image'); 
            $table->string('menu');
            $table->string('order');  
            $table->string('status'); 
            $table->integer('category_id')->unsigned();            
            $table->foreign('category_id')->references('id')->on('category');
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
         Schema::drop("subcategory");
    }
}
