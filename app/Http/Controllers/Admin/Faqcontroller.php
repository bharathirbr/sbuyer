<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Faq;
use Session;

class Faqcontroller extends Controller{

    public function faq(Request $Request){
        if (Session::get('admin_id'))
        {   
             return view('admin.faq');                
        }else
        {
          return redirect('admin');
        }  
        
    }
    public function addfaq(Request $request) {
      if (Session::get('admin_id'))
        {
        if($_POST)
        {
        $post = new Faq;    
        $post->question = (@$request->question) ? @$request->question : '' ;
        $post->answer= (@$request->editor2) ? @$request->editor2 :  '' ;
        $post->order = (@$request->order) ? @$request->order :  '' ;
        $post->status = (@$request->status) ? @$request->status : '' ;
        $post->imagealt  =  'NULL';        
        $post->imagename  =  'NULL';        
        $post->image  =  'NULL';      
        $post->save();
        Session::flash('question', 'Successfully Inserted');
        return redirect('admin/faq');
        }else{
        return view('admin.addfaq');         
        }
    }
}

    public function edit(Request $request) {
        if (Session::get('admin_id'))
        {
        $faq = Faq::find(@$request->segment(4));        
       if($_POST)
       {                  
        $faq->question  =  (@$request->question) ? @$request->question :  @$faq[0]->question ;
        $faq->answer    =  (@$request->editor2) ? @$request->editor2 :  @$faq[0]->answer ;
        $faq->order     =  (@$request->order) ? @$request->order :  @$faq[0]->order ;
        $faq->status    =  (@$request->status) ? @$request->status :  @$faq[0]->status ;
        $faq->imagealt  =  'NULL';        
        $faq->imagename  =  'NULL';        
        $faq->image  =  'NULL';        
        $faq->save();
        Session::flash('question', 'Successfully Updated');
        return redirect('admin/faq');
        /*return view('admin.addfaq', ['post' => $faq]);*/
       }
   else{  
        if(@$request->segment(3) == 'delete' && @$request->segment(4) != '')
        {
                                Faq::find(@$request->segment(4))->delete();
                                Session::flash('success','Your Data was Successfully Deleted');
                                return redirect('/admin/faq');
        }     
        return view('admin.addfaq', ['post' => $faq]);
       }
    }else{
        return view('admin.addfaq');         
        }
    }
   
}
