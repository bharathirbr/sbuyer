<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Blogcategory extends Model
{
     protected $table="blogcategory";
     protected $fillable = [
        'id','title', 'link', 'content', 'order', 'status', 'metatitle', 'metakeyword','metadescription',
    ];

    public function blogmanage() 
    { 
        return $this->hasMany('App\Models\Admin\Blogmanagement','category');
    }  
    public function category_count($id) 
    {
        $Blogcategorys = Blogmanagement::where('category',$id)->where('status', '1')->get();
        return $Blogcategorys->count();
    }
   
}
