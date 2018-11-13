<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table="product";
    protected $fillable = [
        'id','title', 'name', 'description', 'rate', 'quantity', 'min_price', 'offer_price','discount_price','category_id','subcategory_id',
        'brand_id',
        'image',
        'status',
        'image_title',
        'image_alt',
        'metatitle',
        'metakeyword',
        'metadescription',
        'status',
    ];
    public function category()
    {
        return $this->belongsTo('App\Models\Category','category_id');
    }
    
     public function subcategory()
    {
        return $this->belongsTo('App\Subcategory','subcategory_id');
    }

    public function product_details() 
    { 
        return $this->hasMany('App\Product_images','product_id');
    }  
    public function related_product() 
    {  
        
        return $this->hasMany('App\Related_product','product_id');
    }
}
