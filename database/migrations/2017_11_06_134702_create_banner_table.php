<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBannerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banner', function (Blueprint $table) {
             $table->increments('id');
             $table->string('name'); 
             $table->string('title'); 
             $table->string('link'); 
             $table->string('content'); 
             $table->string('image_alt'); 
             $table->string('image_name'); 
             $table->string('order'); 
             $table->string('image'); 
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
        Schema::dropIfExists('banner');
    }
}





