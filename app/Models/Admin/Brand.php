<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
     protected $table="brand";
     protected $fillable = [
        'id','title', 'link', 'content', 'image_alt', 'image_name', 'order', 'image','status','metatitle','metakeyword','metadescription',
    ];
}
