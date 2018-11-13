<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Staticpagestable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staticpages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title'); 
            $table->text('contents'); 
            $table->string('link'); 
            $table->text('footer_type');                               
            $table->string('metatitle'); 
            $table->string('metakeyword');  
            $table->text('metadescription');  
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
        Schema::dropIfExists('staticpages');
    }
}
