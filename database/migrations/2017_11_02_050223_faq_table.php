<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FaqTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('faq', function (Blueprint $table) {
            $table->increments('id');
            $table->string('question');                      
            $table->text('answer'); 
            $table->string('imagealt');  
            $table->string('imagename'); 
            $table->string('image');  
            $table->string('order');    
            $table->string('status');    
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
        Schema::dropIfExists('faq');
    }
}
