<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Related_product extends Model
{
    protected $table="related_product";
    protected $fillable = [
        'id','product_id','related_product',
    ];

    public function related_products()
    { 
        return $this->belongsTo('App\Models\Admin\Product','related_product');
    }

}
