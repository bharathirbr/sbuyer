<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model {

    protected $table = "subcategory";
    protected $fillable = [
        'id','subcategory', 'link', 'content', 'imagealt', 'imagename', 'image', 'menu','order','status','category_id','metatitle','metakeyword','metadescription',
    ];


    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }


     public function product() 
    {  
        
        return $this->hasMany('App\Models\Admin\Product','subcategory_id');
    }

}
