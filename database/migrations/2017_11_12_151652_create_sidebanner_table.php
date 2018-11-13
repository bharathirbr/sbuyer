<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSidebannerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('side_banner', function (Blueprint $table) {
             $table->increments('id');
             $table->string('name');       
             $table->string('content'); 
             $table->string('link'); 
             $table->string('image_alt'); 
             $table->string('image_name');             
             $table->string('image');              
             $table->string('status');
             $table->integer('category_id')->unsigned();            
             $table->foreign('category_id')->references('id')->on('category');              
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
         Schema::dropIfExists('side_banner');
    }
}
