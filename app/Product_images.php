<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_images extends Model
{
     protected $table = "product_images";
     protected $fillable = [
        'id','product_id', 'image',
    ];
    
     public function product()
    {
        return $this->belongsTo('App\Product_images','product_id');
    }
}
