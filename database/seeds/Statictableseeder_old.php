<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Staticpages;

class Statictableseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('staticpages')-> delete();
        faq::create([
	            	 'title'=>'about',
	                 'metatitle'=>'',
	                 'metakeyword'=>'',
	                 'metadescription'=>'',
	                 'imagealt'=>'',
	                 'imagename'=>'',
	                 'image'=>'',
	                 'contents'=>'about content',
	                 'url'=>'about'         
                  ]);
        faq::create([
            	     'title'=>'faq',
	                 'metatitle'=>'faq',
	                 'metakeyword'=>'',
	                 'metadescription'=>'',
	                 'imagealt'=>'',
	                 'imagename'=>'',
	                 'image'=>'',
	                 'contents'=>'faq',
	                 'url'=>'faq content' 
                  ]);              
    }
}
