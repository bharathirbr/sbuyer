<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin\Blogcategory;
use App\Models\Admin\Blogmanagement;
use App\Helpers\MyFunction;
use Session;
use DB;

class BlogController extends Controller
{
    public function bloglist(Request $Request)
    {
          
        $faq = DB::table('blogmanagement')->get();
        $faqall = DB::table('blogcategory')->get();
        return view('bloglist')->with(compact('faq'))->with(compact('faqall'));
        
    }
     public function blogmanangement($param = 'NULL' ,$param1 = 'NULL')
    {
            $faqall = Blogcategory::all();
            $blogcategories = Blogmanagement::where('status',1)->orderBy('updated_at','desc')->paginate(3);
            /*dd($blogcategories);*/
            return view('blogmanage',compact('faqall','blogcategories')); 
        
    } 
    public function blogmanangement_detail($param,$param1)
    {
                 $faq = Blogmanagement::all();
                 $faqall = Blogcategory::all();                
                 if($param != '' && $param1 != '')
                 { 
                 	$blog = Blogmanagement::Where('link', 'like', '%' . $param1 . '%')->get();  
                    if($blog->count() !='0') { return view('blogdetail')->with(compact('faq'))->with(compact('faqall'))->with(compact('blog')); }
                    else{ abort(404); } 
                 }  
        
    }
   public function blogcategory_detail($param)
    {   
               $faq = Blogmanagement::all(); 
               $faq_pagination = Blogmanagement::all(); 
               $Blogcategory_all = Blogcategory::all();
               $Blogcategory = Blogcategory::Where('link', 'like', '%' . $param . '%')->orderBy('updated_at','desc')->get();                
               $Blogcategorys = Blogcategory::find(@$Blogcategory[0]->id);       
               $Blogcategorys = Blogmanagement::where('category',@$Blogcategorys->id)->orderBy('updated_at', 'desc')->paginate(3);        
               return view('bloglist')->with(compact('Blogcategory_all','Blogcategorys','faq')); 
               
        }



    
}



























