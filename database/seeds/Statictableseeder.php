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
        DB::table('staticpages')->delete();
        $staticpages =
        [
            [ 'title' => '','contents' => '', 'link' => 'about','footer_type' => '', 'metatitle' => '',  'metakeyword'=>'', 'metadescription'=>'' ],
            [ 'title' => '','contents' => '', 'link' => 'privacypolicy','footer_type' => '', 'metatitle' => '',  'metakeyword'=>'', 'metadescription'=>'' ],
            [ 'title' => '','contents' => '', 'link' => 'termsconditions','footer_type' => '', 'metatitle' => '',  'metakeyword'=>'', 'metadescription'=>'' ],
            [ 'title' => '','contents' => '', 'link' => 'return','footer_type' => '', 'metatitle' => '',  'metakeyword'=>'', 'metadescription'=>'' ],
            [ 'title' => '','contents' => '', 'link' => 'sitemap','footer_type' => '', 'metatitle' => '',  'metakeyword'=>'', 'metadescription'=>'' ], 
        ];
        DB::table('staticpages')->insert($staticpages);      
    }
}
