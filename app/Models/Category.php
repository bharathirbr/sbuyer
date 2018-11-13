<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table="category";
    protected $fillable = [
        'id','category_name', 'category_link', 'description', 'image_title', 'page_type', 'order', 'image','status','metatitle','metakeyword','metadescription',
    ];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */ 
    public function subcategory() 
    { 
        return $this->hasMany('App\Subcategory','category_id');
    }


    

   
}
