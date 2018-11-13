<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Blogcategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('blogcategory', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title'); 
            $table->string('link'); 
             $table->string('content'); 
             $table->string('order'); 
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
        Schema::dropIfExists('blogcategory');
    }
}
