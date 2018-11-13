<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Helpers\MyFunction;
use App\Models\Admin\Brand;
use App\Models\Admin\Product;
use App\Models\Admin\Sidebanner;
use App\Models\Admin;
use App\Models\Category;
use App\Subcategory;
use App\Related_product;
use App\Product_images;
use App\Models\faq;
use App\Models\Staticpages;
use App\Models\Admin\Socialmedia;
use App\Banner;
use Session;
use DB;
use URL;
use Carbon\Carbon;
use App\Models\User;
use Image;
/*use Datatables;*/

class AdminController extends Controller {

    public function dashboard(Request $Request)
    {    
        if (Session::get('admin_id'))
         {
             return view('admin.layout');              
         }else
         {
             return view('admin.login.login');
         }
        
    }

    public function login(Request $Request)
    {        
        if (Session::get('admin_id')){           
         return redirect('admin/dashboard');
    }else{       
        return view('admin.login.login');
    }     
    }
    public function loginprocess(Request $Request) {

        if ($_POST) {
            // input values set after validation faild
            $username = $Request->old('username');
            //                 
            // create the validation rules ------------------------
            $rules = array(
                'username' => 'required', // required and must be unique in the ducks table
                'password' => 'required',
                    /* 'password_confirm' => 'required|same:password' */     // required and has to match the password field
            );
            // create custom validation messages ------------------
            $messages = array();
            // do the validation ----------------------------------
            // validate against the inputs from our form
            $validator = Validator::make($Request->all(), $rules, $messages);
            // check if the validator failed -----------------------
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator->errors())->withInput();
                /* return Redirect::to('ducks')->withErrors($validator)->withInput(Input::except('password', 'password_confirm')); */
            } else {

                $admin_check = Admin::where('first_name', @$Request->get('username'))->orwhere('email', @$Request->get('username'))->get();
                $password_check = Admin::where('password', @$Request->get('password'))->get();
                $password_match = Admin::where('password', @$password_check[0]->password)->where('first_name', @$admin_check[0]->first_name)->where('email', @$admin_check[0]->email)->get();
                if ($admin_check->count() > 0) {
                    if ($password_match->count() > 0) {
                        $session_values = array('first_name' => @$password_match[0]->first_name,
                            'last_name' => @$password_match[0]->last_name,
                            'email' => @$password_match[0]->email,
                            'phone' => @$password_match[0]->phone,
                            'status' => @$password_match[0]->status,
                        );
                        if (Session::get('admin_id')) {
                            $Request->session()->forget('admin_id');
                        }
                        $Request->session()->push('admin_id', $session_values);                        
                        return redirect('admin/dashboard');
                    } else {
                        Session::flash('login_failed_password', 'Please Check Your Password');
                        return redirect('admin')->withInput();
                    }
                } else {

                    Session::flash('login_failed_username', 'Please Check Your Yourname Or Email ');
                    return redirect('admin')->withInput();
                }
            }
        } else {
            return redirect('admin');
        }
    }

    public function logout(Request $Request) {
        if (Session::get('admin_id')) {
            $Request->session()->forget('admin_id');
        }
        return redirect('admin');
    }

    public function addbanner(Request $request)
    {
        if (Session::get('admin_id'))
        {
        if ($request->segment(3) == 'add')
         {  
           if($_POST)
                {
                    $myimage = MyFunction::image_upload(@$request->file('image'),'/images/banners/','/images/banners/thum_images');
                    $post = new Banner;
                    $post->title = (@$request->title) ? @$request->title : 'null';
                    $post->name = (@$request->name) ? @$request->name : 'null';
                    $post->link = (@$request->link) ? @$request->link : 'null';
                    $post->content = (@$request->content) ? @$request->content : 'null';
                    $post->image_alt = (@$request->image_alt) ? @$request->image_alt : 'null';
                    $post->image_name = (@$request->image_name) ? @$request->image_name : 'null';
                    $post->order = (@$request->order) ? @$request->order : 'null';
                    $post->image = (@$myimage) ? @$myimage : 'null';
                    $post->status = (@$request->status) ? @$request->status : 'null';
                    $post->metatitle = (@$request->metatitle) ? @$request->metatitle : 'null';
                    $post->metakeyword = (@$request->metakeyword) ? @$request->metakeyword : 'null';
                    $post->metadescription = (@$request->metadescription) ? @$request->metadescription : 'null';
                    $post->save();
                    Session::flash('success', 'Successfully Inserted');                    
                    return redirect('admin/banner');
               }
           else{                   
                    return view('admin.addbanner');
               }
        }  
        }else{
             return redirect('admin');        } 
    
    }

    public function editbanner(Request $request, $id) {
       if (Session::get('admin_id'))
        { 
        if ($_POST) 
        { 
            $myimage = MyFunction::image_upload(@$request->file('image'), '/images/banners/', '/images/banners/thum_images');
            $post = Banner::find($id);
            $post->title = (@$request->title) ? @$request->title :  @$post[0]->title ;
            $post->name = (@$request->name) ? @$request->name : @$post[0]->name ;
            $post->link = (@$request->link) ? @$request->link : @$post[0]->link ;
            $post->content = (@$request->content) ? @$request->content : @$post[0]->content;
            $post->image_alt = (@$request->image_alt) ? @$request->image_alt : @$post[0]->image_alt ;
            $post->image_name = (@$request->image_name) ? @$request->image_name : @$post[0]->image_name ;
            $post->order = (@$request->order) ? @$request->order : @$post[0]->order ;
            $post->image = (@$myimage) ? $myimage: $post->image ;
            $post->status = (@$request->status) ? @$request->status : '1';
            $post->metatitle = (@$request->metatitle) ? @$request->metatitle : @$post[0]->metatitle;
            $post->metakeyword = (@$request->metakeyword) ? @$request->metakeyword :  @$post[0]->metakeyword;
            $post->metadescription = (@$request->metadescription) ? @$request->metadescription :  @$post[0]->metadescription;
            $post->save();
            Session::flash('success', 'Successfully Updated');
            return redirect('admin/banner');
            /*return view('admin.banner')->with('post',$post); */   
        } 
  else {   if (@$request->segment(3) == 'delete' && @$request->segment(4) != '') 
                           {                                
                                Banner::find(@$request->segment(4))->delete();
                                Session::flash('success','Your Data was Successfully Deleted');
                                return redirect('/admin/banner');
                           }           
            $post = Banner::find($request->segment(4));
            return view('admin.addbanner')->with('post',$post);          
           
        }
    }else{
         return redirect('admin');
    }
    }

    public function banner(Request $Request) 
    {        
        if (Session::get('admin_id'))
        {
          return view('admin.banner');                
        }else
        {
          return redirect('admin');
        }
    }

//side banner start
    public function sidebannermanage(Request $Request)
    {
       if (Session::get('admin_id'))
        {
          return view('admin.sidebanner');             
        }else
        {
          return redirect('admin');
        }
    }

        public function sidebanner(Request $Request)
    {
     if (Session::get('admin_id'))
        {
        if ($_POST) {                             
                       if (@$Request->segment(3) == 'add') {  
                        $rules = array(
                            'name'  => 'required', // required and must be unique in the ducks table                             
                            'link'   => 'required', // required and must be unique in the ducks table
                            'content'=> 'required|min:10', // required and must be unique in the ducks table
                            'image'  => 'required|image|mimes:jpeg,png,jpg,gif,svg', // required and must be unique in the ducks table
                            'image_alt' => 'required',
                            'image_name' => 'required',                            
                            'category' => 'required',                            
                            'status' => 'required',
                                /* 'password_confirm' => 'required|same:password' */     // required and has to match the password field
                        );
                    }else{
                        $rules = array(
                            'name'  => 'required', // required and must be unique in the ducks table                             
                            'link'   => 'required', // required and must be unique in the ducks table
                            'content'=> 'required|min:10', // required and must be unique in the ducks table
                               // required and must be unique in the ducks table
                            'image_alt' => 'required',
                            'image_name' => 'required',                            
                            'category' => 'required',                            
                            'status' => 'required',
                                /* 'password_confirm' => 'required|same:password' */     // required and has to match the password field
                        ); }

                        // create custom validation messages ------------------
                        $messages = array();
                        // do the validation ----------------------------------
                        // validate against the inputs from our form
                        $validator = Validator::make($Request->all(), $rules, $messages);
                        // check if the validator failed -----------------------
                        if ($validator->fails())
                        {                            
                            /* return redirect()->back()->withErrors($validator->errors()); */
                            return redirect()->back()->withErrors($validator->errors());
                        } else {
                             
                            if (@$Request->segment(3) == 'add') {                        
                                $myimage = MyFunction::image_upload(@$Request->file('image'), '/images/sidebanner/', '/images/sidebanner/thum_images');
                                $cate = new Sidebanner; 
                                $cate->name = @$Request->input('name');                         
                                $cate->link = @$Request->input('link');
                                $cate->content = @$Request->input('content');
                                $cate->image_alt = @$Request->input('image_alt');
                                $cate->image_name = @$Request->input('image_name');                                
                                $cate->image = (@$Request->file('image')) ? @$myimage : @$cate[0]->image;
                                $cate->status = @$Request->input('status');
                                $cate->category_id = @$Request->input('category');
                                $cate->metatitle = (@$Request->input('metatitle')) ? @$Request->input('metatitle') : 'null';
                                $cate->metakeyword = (@$Request->input('metakeyword')) ? @$Request->input('metakeyword') : 'null';
                                $cate->metadescription = (@$Request->input('metadescription')) ? @$Request->input('metadescription') : 'null';
                                $cate->save();
                                Session::flash('success', 'Your banner Added Successfully');                               
                                return redirect('admin/sidebanner');
                            } else {                     
                                $myimage = MyFunction::image_upload(@$Request->file('image'), '/images/sidebanner/', '/images/sidebanner/thum_images');
                                $cate = Sidebanner::find(@$Request->segment(4));                                
                                $cate->name = @$Request->input('name');                                 
                                $cate->link = @$Request->input('link');
                                $cate->content = @$Request->input('content');
                                $cate->image_alt = @$Request->input('image_alt');
                                $cate->image_name = @$Request->input('image_name');                                
                                $cate->image = (@$Request->file('image')) ? @$myimage : @$cate->image;
                                $cate->status = @$Request->input('status');
                                $cate->category_id = @$Request->input('category');
                                $cate->metatitle = (@$Request->input('metatitle')) ? @$Request->input('metatitle') : 'null';
                                $cate->metakeyword = (@$Request->input('metakeyword')) ? @$Request->input('metakeyword') : 'null';
                                $cate->metadescription = (@$Request->input('metadescription')) ? @$Request->input('metadescription') : 'null';
                                $cate->save();
                                Session::flash('success', 'Your banner updated Successfully');
                                return redirect('admin/sidebanner');
                            }
                        }
                } 
           else {              
                    if (@$Request->segment(3) == 'delete' && @$Request->segment(4) != '') 
                           {                                
                                Sidebanner::find(@$Request->segment(4))->delete();
                                Session::flash('success','Your Data was Successfully Deleted');
                                return redirect('/admin/sidebanner');
                           }
                    $post = Sidebanner::find($Request->segment(4));
                    $category = Category::all();                    
                    return view('admin.addsidebanner', compact('post', 'category'));
                }
    }else{
return redirect('admin');
    }
}
//side banner end

//brand start
    public function brand(Request $Request)
    {  if (Session::get('admin_id'))
        {   
          return view('admin.brand');                     
        }else
        {
          return redirect('admin');
        }       
    }
    public function addbrand(Request $Request)
    {
if (Session::get('admin_id'))
        {
        if ($_POST) {                             
                       if (@$Request->segment(3) == 'add') 
                    {  
                        $rules = array(
                            'name'  => 'required', // required and must be unique in the ducks table
                            'title'  => 'required', 
                            'link'   => 'required', // required and must be unique in the ducks table
                            'content'=> 'required|min:10', // required and must be unique in the ducks table
                            'image'  => 'required|image|mimes:jpeg,png,jpg,gif,svg', // required and must be unique in the ducks table
                            'image_alt' => 'required',
                            'image_name' => 'required',
                            'order' => 'required',
                            'status' => 'required',
                                /* 'password_confirm' => 'required|same:password' */     // required and has to match the password field
                        );
                    }else{
                        $rules = array(
                            'name'  => 'required', // required and must be unique in the ducks table
                            'title'  => 'required', 
                            'link'   => 'required', // required and must be unique in the ducks table
                            'content'=> 'required|min:10', // required and must be unique in the ducks table                           
                            'image_alt' => 'required',
                            'image_name' => 'required',
                            'order' => 'required',
                            'status' => 'required',
                                /* 'password_confirm' => 'required|same:password' */     // required and has to match the password field
                        ); }

                        // create custom validation messages ------------------
                        $messages = array();
                        // do the validation ----------------------------------
                        // validate against the inputs from our form
                        $validator = Validator::make($Request->all(), $rules, $messages);
                        // check if the validator failed -----------------------
                        if ($validator->fails()) {                            
                            /* return redirect()->back()->withErrors($validator->errors()); */
                            return redirect()->back()->withErrors($validator->errors());
                        } else {
                             
                            if (@$Request->segment(3) == 'add') {                        
                                $myimage = MyFunction::image_upload(@$Request->file('image'), '/images/brand/', '/images/brand/thum_images');
                                $cate = new Brand; 
                                $cate->name = @$Request->input('name');                               
                                $cate->title = @$Request->input('title');
                                $cate->link = @$Request->input('link');
                                $cate->content = @$Request->input('content');
                                $cate->image_alt = @$Request->input('image_alt');
                                $cate->image_name = @$Request->input('image_name');
                                $cate->order = @$Request->input('order');
                                $cate->image = (@$Request->file('image')) ? @$myimage : @$cate[0]->image;
                                $cate->status = @$Request->input('status');
                                $cate->metatitle = @$Request->input('metatitle');
                                $cate->metakeyword = @$Request->input('metakeyword');
                                $cate->metadescription = @$Request->input('metadescription');
                                $cate->save();
                                Session::flash('success', 'Your brand Added Successfully');                               
                                return redirect('admin/brand');
                            } else {                         
                                $myimage = MyFunction::image_upload(@$Request->file('image'), '/images/brand/', '/images/brand/thum_images');
                                $cate = Brand::find(@$Request->segment(4));                                
                                $cate->name = @$Request->input('name');  
                                $cate->title = @$Request->input('title');
                                $cate->link = @$Request->input('link');
                                $cate->content = @$Request->input('content');
                                $cate->image_alt = @$Request->input('image_alt');
                                $cate->image_name = @$Request->input('image_name');
                                $cate->order = @$Request->input('order');
                                $cate->image = (@$Request->file('image')) ? @$myimage : @$cate->image;
                                $cate->status = @$Request->input('status');
                                $cate->metatitle = @$Request->input('metatitle');
                                $cate->metakeyword = @$Request->input('metakeyword');
                                $cate->metadescription = @$Request->input('metadescription');
                                $cate->save();
                                Session::flash('success', 'Your brand updated Successfully');
                                return redirect('admin/brand');
                            }
                        }
                } 
           else {              
                    if (@$Request->segment(3) == 'delete' && @$Request->segment(4) != '') 
                           {                                
                                brand::find(@$Request->segment(4))->delete();
                                Session::flash('success','Your Data was Successfully Deleted');
                                return redirect('/admin/brand');
                           }
                    $post = brand::find($Request->segment(4));
                    return view('admin.addbrand')->with('post',$post);
                }
    }else{
        return redirect('admin');
    }
}
//brand end 

    public function video(Request $Request)
    {if (Session::get('admin_id'))
        {   
           return view('admin.video');              
        }else
        {
          return redirect('admin');
        }        
    }

    public function addvideo(Request $Request)
    {if (Session::get('admin_id'))
        {   
           return view('admin.addvideo');              
        }else
        {
          return redirect('admin');
        }          
    }

    public function order(Request $Request) 
    {if (Session::get('admin_id'))
        {   
           return view('admin.order');             
        }else
        {
          return redirect('admin');
        }
        
    }

    public function customer(Request $Request)
    {if (Session::get('admin_id'))
        {   
            return view('admin.customer');             
        }else
        {
          return redirect('admin');
        }       
    }

    public function category(Request $request)
    {if (Session::get('admin_id'))
        {   
           return view('admin.category');            
        }else
        {
          return redirect('admin');
        }     
        
    }

    public function addcategory(Request $Request)
    {if (Session::get('admin_id'))
        {
        if ($_POST)
        {
            //values set after validation fails
            $category_name = $Request->old('category_name');
            $description = $Request->old('description');
            $image_title = $Request->old('image_title');
            $image = $Request->old('image');
            $page_type = $Request->old('page_type');
            $order = $Request->old('order');
            $status = $Request->old('status');
            // create the validation rules ------------------------
            if(@$Request->segment(3) == 'add')
        {
            $rules = array(
                'category_name' => 'required', 
                'description' => 'required|min:10', 
                'image_title' => 'required', 
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg', 
                'icons' => 'required|image|mimes:jpeg,png,jpg,gif,svg', 
                'page_type' => 'required',
                'order' => 'required',
                'status' => 'required'                
            );
       }else{

            $rules = array(
                'category_name' => 'required', 
                'description' => 'required|min:10', 
                'image_title' => 'required',                
                'page_type' => 'required',
                'order' => 'required',
                'status' => 'required'                
            );
        }

            // create custom validation messages ------------------
            $messages = array();
            // do the validation ----------------------------------
            // validate against the inputs from our form
            $validator = Validator::make($Request->all(), $rules, $messages);
            // check if the validator failed -----------------------
            if ($validator->fails()) {                
                /* return redirect()->back()->withErrors($validator->errors()); */
                return redirect()->back()->withErrors($validator->errors());
            } else {
               if(@$Request->file('icons'))
                   {
                     $icons = MyFunction::image_upload(@$Request->file('icons'), '/images/category/icons/', '/images/category/thum_images');
                   }
                if (@$Request->segment(3) == 'add') {
                 $myimage = MyFunction::image_upload(@$Request->file('image'), '/images/category/', '/images/category/thum_images');
                    $cate = new Category;
                    $cate->category_name = @$Request->input('category_name');
                    $cate->category_link = (@$Request->input('category_link')) ?  : '';
                    $cate->description = @$Request->input('description');
                    $cate->image_title = @$Request->input('image_title');
                    $cate->page_type = @$Request->input('page_type');
                    $cate->hotcategory = @$Request->input('hot');
                    $cate->order = @$Request->input('order');
                    $cate->image = (@$Request->file('image')) ? @$myimage : 'null';
                    $cate->icons = (@$Request->file('icons')) ? @$icons : 'null';
                    $cate->status = (@$Request->input('status')) ? @$Request->input('status') : 'null' ;
                    $cate->metatitle = (@$Request->input('metatitle')) ? @$Request->input('metatitle') : 'null';
                    $cate->metakeyword = (@$Request->input('metakeyword')) ? @$Request->input('metakeyword') : 'null';
                    $cate->metadescription = (@$Request->input('metadescription')) ? @$Request->input('metadescription') : 'null';                    
                    $cate->save(); 
                                    
                    Session::flash('success', 'Your category Added Successfully');
                    return redirect('admin/category');
                } else {                     
                   $myimage = MyFunction::image_upload(@$Request->file('image'), '/images/category/', '/images/category/thum_images');
                    $cate = Category::find(@$Request->segment(4));
                    $cate->category_name = @$Request->input('category_name');
                    $cate->category_link = @$Request->input('category_link');
                    $cate->description = @$Request->input('description');
                    $cate->image_title = @$Request->input('image_title');
                    $cate->page_type = @$Request->input('page_type');
                    $cate->hotcategory = @$Request->input('hot');
                    $cate->order = @$Request->input('order');
                    $cate->image = (@$Request->file('image')) ? @$myimage : $cate->image;
                    $cate->icons = (@$Request->file('icons')) ? @$icons : $cate->icons;
                    $cate->status = @$Request->input('status');
                    $cate->metatitle = @$Request->input('metatitle');
                    $cate->metakeyword = @$Request->input('metakeyword');
                    $cate->metadescription = @$Request->input('metadescription');
                    $cate->save();                   
                    Session::flash('success', 'Your category updated Successfully');
                    return redirect('admin/category');
                }
            }
        } else {
            if (@$Request->segment(3) == 'delete' && @$Request->segment(4) != '') 
                           {                                
                                Category::find(@$Request->segment(4))->delete();
                                Session::flash('success','Your Data was Successfully Deleted');
                                return redirect('/admin/category');
                           }   

            @$cate = Category::find(@$Request->segment(4));
            return view('admin.addcategory')->with('category', @$cate);
        }
    }else{
         return redirect('admin');
    }
    }


 
    //procut start
    public function product(Request $Request)
     {       
        if (Session::get('admin_id'))
        { 
            if ($_POST) 
            {        
                //values set after validation fails
                $name = $Request->old('name');
                $title = $Request->old('title');
                $link = $Request->old('link');
                $description = $Request->old('description');
                $rate = $Request->old('rate');
                $quantity = $Request->old('quantity');
                $min_price = $Request->old('min_price');
                $categories = $Request->old('categories');
                $subcategory = $Request->old('subcategory');
                $brandname = $Request->old('brandname');
                $image = $Request->old('image');
                $releated_product = $Request->old('releated_product');
                $status = $Request->old('status');          
                if(@$Request->segment(3) == 'add')
                 {
                        // create the validation rules ------------------------
                        $rules = array(
                            'name'            => 'required', // required and must be unique in the ducks table
                            'title'           => 'required', // required and must be unique in the ducks table
                            'link'            => 'required', // required and must be unique in the ducks table
                            'description'     => 'required', // required and must be unique in the ducks table
                            'rate'            => 'required', // required and must be unique in the ducks table                
                            'min_price'       => 'required', // required and must be unique in the ducks table
                            'subcategory'     => 'required', // required and must be unique in the ducks table
                            'brandname'       => 'required', // required and must be unique in the ducks table
                            'releated_product'=> 'required', // required and must be unique in the ducks table               
                            'status'          => 'required', // required and must be unique in the ducks table
                            'description'     => 'required', // required and must be unique in the ducks table                
                            'image'           => 'required|image|mimes:jpeg,png,jpg,gif,svg', // required and must be unique in the ducks table                 
                            'status'          => 'required',
                                /* 'password_confirm' => 'required|same:password' */     // required and has to match the password field
                        );
                }
            else{
                    $rules = array(
                        'name'            => 'required', // required and must be unique in the ducks table
                        'title'           => 'required', // required and must be unique in the ducks table
                        'link'           => 'required', // required and must be unique in the ducks table
                        'description'     => 'required', // required and must be unique in the ducks table
                        'rate'            => 'required', // required and must be unique in the ducks table                
                        'min_price'       => 'required', // required and must be unique in the ducks table
                        'subcategory'     => 'required', // required and must be unique in the ducks table
                        'brandname'       => 'required', // required and must be unique in the ducks table                
                        'status'          => 'required', // required and must be unique in the ducks table                  
                        'description'     => 'required', // required and must be unique in the ducks table                 
                        'status'          => 'required',
                            /* 'password_confirm' => 'required|same:password' */     // required and has to match the password field
                    );
                }

            // create custom validation messages ------------------
            $messages = array();
            // do the validation ----------------------------------
            // validate against the inputs from our form
            $validator = Validator::make($Request->all(), $rules, $messages);
            // check if the validator failed -----------------------
            if ($validator->fails())
            {               
                /* return redirect()->back()->withErrors($validator->errors()); */
                return redirect()->back()->withErrors($validator->errors())->withInput();
            }else {                

                    if (@$Request->segment(2) == 'product' && @$Request->segment(3) == 'add') 
                    {  
                        
                     $myimage = MyFunction::image_upload(@$Request->file('image'), '/images/product/', '/images/product/thum_images');        
                                $cate = new Product;
                                $cate->name = @$Request->input('name');
                                $cate->title = @$Request->input('title');
                                $cate->link = @$Request->input('link');
                                $cate->description = @$Request->input('description');
                                $cate->image_title = @$Request->input('image_title');                                                          
                                /*$cate->order = @$Request->input('order');*/
                                $cate->image = (@$Request->file('image')) ? @$myimage : 'null';                               
                                $cate->status = @$Request->input('status');
                                $cate->rate = @$Request->input('rate');
                                $cate->quantity = '1';
                                $cate->min_price = @$Request->input('min_price');
                                $cate->offer_price = @$Request->input('offer_price');
                                $cate->discount_price = @$Request->input('discount_price');
                                $cate->category_id = @$Request->input('categories');
                                $cate->brand_id = @$Request->input('brandname');
                                $cate->featured_product = @$Request->input('featured_product');
                                $cate->subcategory_id = @$Request->input('subcategory');
                                $cate->image_alt     = @$Request->input('image_alt');
                                $cate->metatitle = @$Request->input('metatitle');
                                $cate->metakeyword = @$Request->input('metakeyword');
                                $cate->metadescription = @$Request->input('metadescription');
                                $cate->save();
                                //product details entry
                                $files=$Request->file('extra_image');
                                if($files)
                                {
                                    foreach($files as $file)
                                    {
                                        $imagename = date('s').time().'.'.$file->getClientOriginalExtension();          
                                        $imagename_encry = MyFunction::generateRandomString('4');            
                                        $imagename = $imagename_encry.$imagename;           
                                        $destinationPath = public_path('images/product/extra');
                                        $file->move($destinationPath,$imagename); 
                                        $data =  array('product_id'=>$cate->id, 'image'=>$imagename);                             
                                        DB::table('product_images')->insert($data);                     
                                    }
                                }
                                //entry products details
                                //related product
                                if(@$Request->input('releated_product'))
                                {   @$related_product =  Related_product::where('product_id',@$Request->segment(4));
                                    @$related_product->delete();
                                    foreach($Request->input('releated_product') as $releated_product)
                                    {                                       
                                        $data =  array('product_id'=>@$cate->id ,'related_product'=>$releated_product);                             
                                        DB::table('related_product')->insert($data);                     
                                    }
                                }                              
                                //end 

                                Session::flash('success', 'Your Product Added Successfully');
                                return redirect('admin/product');
                    } else {

                                $myimage = MyFunction::image_upload(@$Request->file('image'), '/images/product/', '/images/product/thum_images');
                                $cate = Product::find(@$Request->segment(4));                                
                                $cate->name = (@$Request->input('name')) ? @$Request->input('name') : @$cate->name;
                                $cate->title = (@$Request->input('title')) ? @$Request->input('title') : @$cate->title;
                                $cate->link = (@$Request->input('link')) ? @$Request->input('link') : @$cate->link;
                                $cate->description = (@$Request->input('description')) ? @$Request->input('description') : @$cate->description;
                                $cate->image_title = (@$Request->input('image_title')) ? @$Request->input('image_title') : @$cate->image_title;        
                                /*$cate->order = @$Request->input('order');*/
                                $cate->image = (@$Request->file('image')) ? @$myimage : @$cate->image ;                                
                                $cate->status = (@$Request->input('status')) ? @$Request->input('status') : @$cate->status;
                                $cate->rate = (@$Request->input('rate')) ? @$Request->input('rate') : @$cate->rate;
                                $cate->quantity = '1';
                                $cate->min_price = (@$Request->input('min_price')) ? @$Request->input('min_price') : @$cate->min_price;
                                $cate->offer_price = (@$Request->input('offer_price')) ? @$Request->input('offer_price') : @$cate->offer_price;
                                $cate->discount_price = (@$Request->input('discount_price')) ? @$Request->input('discount_price') : @$cate->discount_price;
                                $cate->category_id = (@$Request->input('categories')) ? @$Request->input('categories') : @$cate->categories;
                                $cate->featured_product = (@$Request->input('featured_product')) ? @$Request->input('featured_product') : @$cate->featured_product;
                                $cate->brand_id = (@$Request->input('brandname')) ? @$Request->input('brandname') : @$cate->brandname;
                                $cate->subcategory_id = (@$Request->input('subcategory')) ? @$Request->input('subcategory') : @$cate->subcategory;
                                $cate->image_alt     = (@$Request->input('image_alt')) ? @$Request->input('image_alt') : @$cate->image_alt;
                                $cate->metatitle = (@$Request->input('metatitle')) ? @$Request->input('metatitle') : @$cate->metatitle;
                                $cate->metakeyword = (@$Request->input('metakeyword')) ? @$Request->input('metakeyword') : @$cate->metakeyword;
                                $cate->metadescription = (@$Request->input('metadescription')) ? @$Request->input('metadescription') : @$cate->metadescription;
                                $cate->save();
                                $files=$Request->file('extra_image');
                                if($files)
                                {   
                                    $damodels =Product_images::where('product_id',@$Request->segment(4));                                
                                    $damodels->delete();
                                    foreach($files as $file)
                                    {
                                        $imagename = date('s').time().'.'.$file->getClientOriginalExtension();          
                                        $imagename_encry = MyFunction::generateRandomString('4');            
                                        $imagename = $imagename_encry.$imagename;           
                                        $destinationPath = public_path('images/product/extra');
                                        $file->move($destinationPath,$imagename);                                        
                                        $damodel = new Product_images ;                                         
                                        $damodel->product_id = @$Request->segment(4);
                                        $damodel->image  = $imagename;
                                        $damodel->save();
                                        /*DB::table('product_images')->insert($data);   */                                    
                                    }
                                    
                                }
                                 //related product
                                if(@$Request->input('releated_product'))
                                {   @$related_product =  Related_product::where('product_id',@$Request->segment(4));
                                    @$related_product->delete();
                                    foreach($Request->input('releated_product') as $releated_product)
                                    {                                       
                                        $data =  array('product_id'=>@$Request->segment(4) ,'related_product'=>$releated_product);                             
                                        DB::table('related_product')->insert($data);                     
                                    }
                                }                              
                                //end 
                                Session::flash('success', 'Your Product updated Successfully');
                                return redirect('admin/product');
                           }
               }
        }
   else {  
            if(@$Request->segment(2) == 'product' && @$Request->segment(3) == 'add' )
            {   @$all_product = Product::where('status',1)->get();                
               $category =  Category::where('status',1)->get();
               $subcategory =  Subcategory::where('status',1)->get();
               $brand =  Brand::where('status',1)->get();
               return view('admin.addproduct',compact('category','subcategory','brand','all_product'));
            }
            elseif(@$Request->segment(1) == 'admin' && @$Request->segment(2) == 'product' && @$Request->segment(3) =='' )
               {                
                  @$cate = Product::find(@$Request->segment(4));
                  return view('admin.product')->with('category', @$cate);
               }
           elseif(@$Request->segment(3) == 'delete' && @$Request->segment(4) != '')
               {                
                    Product::find(@$Request->segment(4))->delete();
                    Session::flash('success','Your Data was Successfully Deleted');
                    return redirect('/admin/product');
               }
             else
             {                
               @$post = Product::find(@$Request->segment(4));
               $category =  Category::where('status',1)->get();
               $subcategory =  Subcategory::where('status',1)->get();
               //all product
               @$all_product = Product::where('status',1)->get();              

               $category_name =  Category::where('id',@$post->category_id)->where('status',1)->pluck('category_link');
               $subcategory_name =  Subcategory::where('id',@$post->subcategory_id)->where('status',1)->pluck('link');
               $brand =  Brand::where('status',1)->get();              
               return view('admin.addproduct',compact('category','subcategory','brand','post','category_name','subcategory_name','all_product'));
            }
        }
    }else{
return redirect('admin');
    }
    }
    public function subcategory(Request $Request)
    {if (Session::get('admin_id'))
        {   
              return view('admin.subcategory');                
        }else
        {
          return redirect('admin');
        }       
    }

    public function addsubcategory(Request $Request) 
    {
        if (Session::get('admin_id'))
        {
        if ($_POST)
         {

            $name = $Request->old('category');
            $title = $Request->old('subcategory');
            $description = $Request->old('description');           
            $image = $Request->old('image');
            $menu = $Request->old('menu');
            $order = $Request->old('order');
            $status = $Request->old('status');                  
            // create the validation rules ------------------------
            $rules = array(
                'category'         => 'required', // required and must be unique in the ducks table
                'subcategory'      => 'required', // required and must be unique in the ducks table
                'description'      => 'required', // required and must be unique in the ducks table               
                'image'            => 'required|image|mimes:jpeg,png,jpg,gif,svg',
                'order'            => 'required', // required and must be unique in the ducks table
                'status'           => 'required', // required and must be unique in the ducks table         
                'status'           => 'required', // required and must be unique in the ducks table
                
            );

            // create custom validation messages ------------------
            $messages = array();
            // do the validation ----------------------------------
            // validate against the inputs from our form
            $validator = Validator::make($Request->all(), $rules, $messages);
            // check if the validator failed -----------------------
            if ($validator->fails())
            {                
                /* return redirect()->back()->withErrors($validator->errors()); */
                return redirect()->back()->withErrors($validator->errors());
            }else {
                        $myimage = MyFunction::image_upload(@$Request->file('image'), '/images/subcategory/', '/images/subcategory/thum_images');
                        $post = new Subcategory;
                        $post->category_id = $Request->category;
                        $post->subcategory = $Request->subcategory;
                        $post->link = $Request->link;
                        $post->content = $Request->description;
                        $post->imagealt = $Request->imagealt;
                        $post->imagename = $Request->imagename;
                        $post->image = (@$Request->file('image')) ? @$myimage : 'null';
                        $post->menu = $Request->menu;
                        $post->order = $Request->order;
                        $post->status = $Request->status;
                        $post->save();
                        Session::flash('success', 'Successfully Inserted');
                         return redirect('admin/subcategory');
                 }
        } else 
        {
            $faqall = DB::table('category')->get();
            $count = $faqall->count();
            return view('admin.addsubcategory', compact('faqall', 'count'));
        }
    }else{
        return redirect('admin');
    }
        /*return view('admin.addsubcategory');*/
    }
public function editsubcategory(Request $request, $id)
      {
        if (Session::get('admin_id'))
        { 
        $post = Subcategory::find($id);
        if ($_POST)
        {
 
            $name = $request->old('category');
            $title = $request->old('subcategory');
            $description = $request->old('description');             
            $menu = $request->old('menu');
            $order = $request->old('order');
            $status = $request->old('status');                  
            // create the validation rules ------------------------
            $rules = array(
                'category'         => 'required', // required and must be unique in the ducks table
                'subcategory'      => 'required', // required and must be unique in the ducks table
                'description'      => 'required', // required and must be unique in the ducks table                 
                'order'            => 'required', // required and must be unique in the ducks table
                'status'           => 'required', // required and must be unique in the ducks table         
                'status'           => 'required', // required and must be unique in the ducks table
                
            );

            // create custom validation messages ------------------
            $messages = array();
            // do the validation ----------------------------------
            // validate against the inputs from our form
            $validator = Validator::make($request->all(), $rules, $messages);
            // check if the validator failed -----------------------
            if ($validator->fails())
            {                         
                return redirect()->back()->withErrors($validator->errors());
            }
            else {
                    
                        $myimage = MyFunction::image_upload(@$request->file('image'), '/images/subcategory/', '/images/subcategory/thum_images');
                        $post = Subcategory::find($request->segment(4));
                        $post->category_id = $request->category;
                        $post->subcategory = $request->subcategory;
                        $post->link = $request->link;
                        $post->content = $request->description;
                        $post->imagealt = $request->imagealt;
                        $post->imagename = $request->imagename;                        
                        $post->image = (@$request->file('image')) ? @$myimage : @$post->image ;                        
                        $post->menu = $request->menu;
                        $post->order = $request->order;
                        $post->status = $request->status;
                        $post->save();
                        Session::flash('title', 'Successfully Updated');
                        return redirect('admin/subcategory');
                  }
        } 
   else {
                        if (@$request->segment(3) == 'delete' && @$request->segment(4) != '') 
                           {                                
                                Subcategory::find(@$request->segment(4))->delete();
                                Session::flash('success','Your Data was Successfully Deleted');
                                return redirect('/admin/subcategory');
                           } 
            $faqall = DB::table('category')->get();
            $count = $faqall->count();           
            $post = Subcategory::find(@$request->segment(4));
            $category_name =  Category::where('id',@$post->category_id)->where('status',1)->pluck('category_link');
            return view('admin.addsubcategory', compact('post', 'count','faqall','category_name'));
        }
    }else{
         return redirect('admin');
        }
    }


    public function profile(Request $Request)
    {
        if (Session::get('admin_id'))
        {
        return view('admin.viewprofile');
    }else{
        return redirect('admin');
    }
    }

    public function changepassword(Request $Request)
    {if (Session::get('admin_id'))
        {   
          return view('admin.changepassword');                   
        }else
        {
          return redirect('admin');
        } 
        
    }

    public function social(Request $Request) 
    {if (Session::get('admin_id'))
        {   
           return view('admin.social');                  
        }else
        {
          return redirect('admin');
        } 
        
    }

    public function addsocial(Request $Request)
    {
if (Session::get('admin_id'))
        {
        if ($_POST) {                             
                       if (@$Request->segment(3) == 'add') 
                    {  
                        $rules = array(
                            'name'  => 'required', // required and must be unique in the ducks table
                            'class'  => 'required', 
                            'link'   => 'required', // required and must be unique in the ducks table                          
                            'order' => 'required',
                            'status' => 'required',
                                /* 'password_confirm' => 'required|same:password' */     // required and has to match the password field
                        );
                    }else{
                        $rules = array(
                            'name'  => 'required', // required and must be unique in the ducks table
                            'class'  => 'required', 
                            'link'   => 'required', // required and must be unique in the ducks table                          
                            'order' => 'required',
                            'status' => 'required',
                                /* 'password_confirm' => 'required|same:password' */     // required and has to match the password field
                        ); }

                        // create custom validation messages ------------------
                        $messages = array();
                        // do the validation ----------------------------------
                        // validate against the inputs from our form
                        $validator = Validator::make($Request->all(), $rules, $messages);
                        // check if the validator failed -----------------------
                        if ($validator->fails()) {                            
                            /* return redirect()->back()->withErrors($validator->errors()); */
                            return redirect()->back()->withErrors($validator->errors());
                        } else {
                             
                            if (@$Request->segment(3) == 'add') {                        
                                $myimage = MyFunction::image_upload(@$Request->file('image'), '/images/brand/', '/images/brand/thum_images');
                                $cate = new Socialmedia; 
                                $cate->name = @$Request->input('name');                               
                                $cate->class = @$Request->input('class');
                                $cate->link = @$Request->input('link');                              
                                $cate->order = @$Request->input('order');                              
                                $cate->status = @$Request->input('status');                               
                                $cate->save();
                                Session::flash('success', 'Your Social Added Successfully');                               
                                return redirect('admin/social');
                            } else { 
                                $cate = Socialmedia::find(@$Request->segment(4));                           
                                $cate->name = @$Request->input('name');                               
                                $cate->class = @$Request->input('class');
                                $cate->link = @$Request->input('link');                              
                                $cate->order = @$Request->input('order');                              
                                $cate->status = @$Request->input('status');  
                                $cate->save();
                                Session::flash('success', 'Your Social updated Successfully');
                                return redirect('admin/social');
                            }
                        }
                } 
           else {              
                    if (@$Request->segment(3) == 'delete' && @$Request->segment(4) != '') 
                           {                                
                                Socialmedia::find(@$Request->segment(4))->delete();
                                Session::flash('success','Your Data was Successfully Deleted');
                                return redirect('/admin/social');
                           }                          
                    $post = Socialmedia::find($Request->segment(4));
                    return view('admin.addsocial')->with('post',$post);
                }
    }else{
        return redirect('admin');
    }
}
//social end     

    public function newsletter(Request $Request) {
        if (Session::get('admin_id'))
        {   
             return view('admin.newsletterr');                
        }else
        {
          return redirect('admin');
        } 
        
    }

    public function contact(Request $Request) {
        if (Session::get('admin_id'))
        {   
          return view('admin.contact');                
        }else
        {
          return redirect('admin');
        }         
    } 
    

}
