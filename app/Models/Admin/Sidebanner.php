<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Sidebanner extends Model
{
     protected $table="side_banner";    
     protected $fillable = [
        'name','link', 'content', 'image_alt', 'image_name','image','status','category_id','metatitle','metakeyword','metadescription',
    ];
}
