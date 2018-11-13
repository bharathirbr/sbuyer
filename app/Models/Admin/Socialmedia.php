<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Socialmedia extends Model
{
     protected $table="socialmedia";    
     protected $fillable = [
        'name','link', 'class', 'status', 'order',
    ];
}
