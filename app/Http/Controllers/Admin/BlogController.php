<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Blogcategory;
use App\Models\Admin\Blogmanagement;
use App\Helpers\MyFunction;
use Session;
use DB;

class BlogController extends Controller {

    public function blogcategory(Request $Request) {
        if (Session::get('admin_id'))
        {   
             return view('admin.blogcategory');                
        }else
        {
          return redirect('admin');
        } 
        
    }

    public function addblogcategory(Request $request)
     {if (Session::get('admin_id'))
        {
        $post = new Blogcategory;
        if ($_POST)
        {
            $post->title = (@$request->title) ? @$request->title : 'null' ;
            $post->link = (@$request->link) ? @$request->link : 'null' ;
            $post->content = (@$request->editor2) ? @$request->editor2 : 'null' ;
            $post->order = (@$request->order) ? @$request->order : 'null' ;           
            $post->metatitle = (@$request->metatitle) ? @$request->metatitle : 'null' ;
            $post->metakeyword = (@$request->metakeywords) ? @$request->metakeywords : 'null' ;
            $post->metadescription = (@$request->metadescription) ? @$request->metadescription : 'null' ;
            $post->status = (@$request->status) ? @$request->status : 'null' ;
            $post->save();
            Session::flash('title', 'Successfully Inserted');
           return redirect ('admin/blogcategory');
        } 
   else {
            return view('admin.addblogcategory');
        }
    }else{
        return redirect('admin');
    }
    }

    public function edit(Request $request, $id) {
        if (Session::get('admin_id'))
        {
        $post = Blogcategory::find($id);
        if ($_POST) {
            $post->title = (@$request->title) ? @$request->title : 'null' ;
            $post->link = (@$request->link) ? @$request->link : 'null' ;
            $post->content = (@$request->editor2) ? @$request->editor2 : 'null' ;
            $post->order = (@$request->order) ? @$request->order : 'null' ;
            $post->status = (@$request->status) ? @$request->status : 'null' ;
            $post->metatitle = (@$request->metatitle) ? @$request->metatitle : 'null' ;
            $post->metakeyword = (@$request->metakeywords) ? @$request->metakeywords : 'null' ;            
            $post->metadescription = (@$request->metadescription) ? @$request->metadescription : 'null' ;
            $post->save();
            Session::flash('title', 'Successfully Updated');
            return redirect ('admin/blogcategory');
            /*return view('admin.addblogcategory', ['post' => $post]);*/
        } else
        {
            if (@$request->segment(3) == 'delete' && @$request->segment(4) != '') 
                           {                                
                                Blogcategory::find(@$request->segment(4))->delete();
                                Session::flash('success','Your Data was Successfully Deleted');
                                return redirect('admin/blogcategory');
                           }else{
            return view('admin.addblogcategory', ['post' => $post]); }
        }
    }else{
        return redirect('admin');
    }
    }

    public function blogmanangement(Request $request) 
    {if (Session::get('admin_id'))
        {   
               return view('admin.blogmanangement');               
        }else
        {
          return redirect('admin');
        }
       
    }

    public function addblogmanangement(Request $request) {
        if (Session::get('admin_id'))
        { 
         if ($_POST) {
            $myimage = MyFunction::image_upload(@$request->file('image'), '/images/blog/', '/images/blog/thum_images');            
            $post = new Blogmanagement;
            $post->category = (@$request->category) ? @$request->category : 'null' ;
            $post->title = (@$request->title) ? @$request->title : 'null' ;
            $post->link = (@$request->link) ? @$request->link : 'null' ;
            $post->shortcontent = (@$request->editor1) ? @$request->editor1 : 'null' ;
            $post->content = (@$request->editor2) ? @$request->editor2 : 'null' ;
            $post->imagename = (@$request->imagename) ? @$request->imagename : 'null' ;
            $post->image = (@$myimage) ? @$myimage : 'null' ;
            $post->order = (@$request->order) ? @$request->order : 'null' ;
            $post->status = (@$request->status) ? @$request->status : 'null' ;
            $post->author = (@$request->author) ? @$request->author : 'null' ;
            $post->metatitle = (@$request->metatitle) ? @$request->metatitle : 'null' ;
            $post->metakeyword = (@$request->metakeywords) ? @$request->metakeywords : 'null' ;            
            $post->metadescription = (@$request->metadescription) ? @$request->metadescription : 'null' ;
            $post->save();
            Session::flash('success', 'Successfully Inserted');
            return redirect('admin/blogmanangement');
        } else {
            $faqall = DB::table('blogcategory')->get();
            $count = $faqall->count();
            return view('admin.addblogmanangement', compact('faqall', 'count'));
        }
    }else{
            return redirect('admin');
        }
    }
    public function editblog(Request $request, $id)
    {
        if (Session::get('admin_id'))
        { 
         $post = Blogmanagement::find($id);
        if ($_POST) {
           $myimage = MyFunction::image_upload(@$request->file('image'), '/images/blog/', '/images/blog/thum_images'); 
            $post->category = (@$request->category) ? @$request->category : 'null' ;
            $post->title = (@$request->title) ? @$request->title : 'null' ;
            $post->link = (@$request->link) ? @$request->link : 'null' ;
            $post->shortcontent = (@$request->editor1) ? @$request->editor1 : 'null' ;
            $post->content = (@$request->editor2) ? @$request->editor2 : 'null' ;
            $post->imagename = (@$request->imagename) ? @$request->imagename : 'null' ;
            $post->image = (@$myimage) ? @$myimage : $post->image ;
            $post->order = (@$request->order) ? @$request->order : 'null' ;
            $post->status = (@$request->status) ? @$request->status : 'null' ;
            $post->author = (@$request->author) ? @$request->author : 'null' ;
            $post->metatitle = (@$request->metatitle) ? @$request->metatitle : 'null' ;
            $post->metakeyword = (@$request->metakeywords) ? @$request->metakeywords : 'null' ;            
            $post->metadescription = (@$request->metadescription) ? @$request->metadescription : 'null' ;
            $post->save();
            Session::flash('success', 'Successfully Updated');
            return redirect('admin/blogmanangement');
        } else {
             if (@$request->segment(3) == 'delete' && @$request->segment(4) != '') 
                           {                                
                                Blogmanagement::find(@$request->segment(4))->delete();
                                Session::flash('success','Your Data was Successfully Deleted');
                                return redirect('admin/blogmanangement');
                           }
            $faqall = DB::table('blogcategory')->get();
            $count = $faqall->count();
            return view('admin.addblogmanangement',compact('faqall', 'count','post'));
        }
    }else{
return redirect('admin');
}
}


}
