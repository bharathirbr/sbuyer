<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('user_name');
            $table->string('phone')->unique();   
            $table->string('land_line');  
            $table->string('email')->unique();             
            $table->string('email1');  
            $table->string('email2');  
            $table->string('email3');  
            $table->string('address');  
            $table->string('password');  
            $table->string('image');  
            $table->string('status'); 
            $table->timestamp('dob');                          
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
