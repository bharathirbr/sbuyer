<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User_deatils extends Model
{

	protected $table="users_details";

     protected $fillable = [
        'address', 'address', 'city','college',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    public function user_de()
    {
        return $this->belongsTo('App\Models\User');
    }
   
}
