<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Staticpages;
use Session;
use DB;

class StaticpagesController extends Controller {
 public function staticpages(Request $Request)
    {if (Session::get('admin_id'))
        {   
          return view('admin.staticpages');                
        }else
        {
          return redirect('admin');
        } 
       
    }
   public function edit(Request $request)
    {
if (Session::get('admin_id'))
        {  
      $post = Staticpages::find($request->segment(4)); 
      if($_POST)
      {        
        $post->title           = (@$request->title) ? @$request->title : 'null';             
        $post->contents        = (@$request->contents) ? @$request->contents : 'null';            
        $post->link            = (@$post->link) ? @$post->link : 'null';        
        $post->footer_type       = (@$post->footer_type) ? @$post->footer_type : 'null';        
        $post->metatitle       = (@$request->metatitle) ? @$request->metatitle: 'null';
        $post->metakeyword     = (@$request->metakeyword) ? @$request->metakeyword : 'null';
        $post->metadescription = (@$request->metadescription) ? @$request->metadescription : 'null';         
        $post->save();
        Session::flash('success', 'Successfully Updated');
        return redirect('admin/staticpages');
       }
       else{ 
        if (@$request->segment(3) == 'delete' && @$request->segment(4) != '') 
                           {                                
                                Staticpages::find(@$request->segment(4))->delete();
                                Session::flash('success','Your Data was Successfully Deleted');
                                return redirect('admin/staticpages');
                           }
        return view('admin.addstaticpages', ['post' => $post]);
       }
    }else{
    return redirect('admin');
  }
  }
}
