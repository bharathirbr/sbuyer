<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staticpages extends Model
{
    protected $table="staticpages";
    protected $fillable = [
        'id','title', 'link', 'contents','metatitle','metakeyword','metadescription',
    ];
}
