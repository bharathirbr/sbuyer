<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Blogmanagement extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogmanagement', function (Blueprint $table) {
            $table->increments('id');
            $table->string('category');
            $table->string('title'); 
            $table->string('link'); 
            $table->text('content'); 
            $table->text('shortcontent'); 
            $table->string('imagename'); 
            $table->string('image'); 
            $table->string('order');  
            $table->string('status');
            $table->string('author'); 
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
         Schema::dropIfExists('blogmanagement');
    }
}
