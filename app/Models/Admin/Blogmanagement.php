<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Blogmanagement extends Model
{
    protected $table="blogmanagement";
    protected $fillable = [
        'id','category', 'title', 'link', 'content', 'shortcontent','imagename','image','order','status','metatitle', 'metakeyword','metadescription',
    ];

    public function blog() 
    { 
        return $this->belongsTo('App\Models\Admin\Blogcategory','category');
    }
    
   
}
