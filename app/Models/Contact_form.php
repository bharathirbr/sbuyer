<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact_form extends Model
{
    //
    /* use Notifiable;*/
    protected $table="Contact_form";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'phone',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    /*protected $hidden = [
        'password', 'remember_token',
    ];*/
}
