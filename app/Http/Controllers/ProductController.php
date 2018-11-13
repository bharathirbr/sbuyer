<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Models\Admin\Product;
use App\Related_product;
use App\Subcategory;
use App\Models\Category;
use Session;

class ProductController extends Controller
{
    public function product(Request $request)
    {
         if(($_POST) && ($request->input('shot_by') !='') && ($request->input('show_limit') !=''))
             {     
                
                if(@$request->input('show_limit') == '9'){ $show_limits= '9'; }elseif(@$request->input('show_limit') == '16'){ $show_limits= '16';}else{$show_limits=  '32'; }
                if(@$request->input('shot_by') == 'name') { @$column_name = 'name' ;  @$order = 'asc' ; $selected = 'name' ; }elseif(@$request->input('shot_by') == 'price'){ @$column_name = 'rate' ; @$order = 'desc' ; $selected = 'price' ; }else{ @$column_name = 'id' ;  @$order = 'asc' ; $selected = 'position' ;}                   
                     $all_product = Product::where('status',1)->orderBy(@$column_name,@$order)->paginate(@$request->input('show_limit'));
                    return view('product',compact('all_product','selected','show_limits')); 
             }
             else
            {    
                  $selected     = 'position' ; $show_limits  = '9' ;
                  $all_product = Product::where('status',1)->paginate(9);
                  return view('product',compact('all_product','selected','show_limits')); 
            }
    }
    public function listproduct(Request $request)
    {
         if(($_POST) && ($request->input('shot_by') !='') && ($request->input('show_limit') !=''))
             {     
                
                if(@$request->input('show_limit') == '9'){ $show_limits= '9'; }elseif(@$request->input('show_limit') == '16'){ $show_limits= '16';}else{$show_limits=  '32'; }
                if(@$request->input('shot_by') == 'name') { @$column_name = 'name' ;  @$order = 'asc' ; $selected = 'name' ; }elseif(@$request->input('shot_by') == 'price'){ @$column_name = 'rate' ; @$order = 'desc' ; $selected = 'price' ; }else{ @$column_name = 'id' ;  @$order = 'asc' ; $selected = 'position' ;}                   
                     $all_product = Product::where('status',1)->orderBy(@$column_name,@$order)->paginate(@$request->input('show_limit'));
                    return view('listproduct',compact('all_product','selected','show_limits')); 
             }
             else
            {    
                  $selected     = 'position' ; $show_limits  = '9' ;
                  @$all_product = Product::where('status',1)->paginate(9);
                 return view('listproduct',compact('all_product','selected','show_limits')); 
            }
    }
    public function productdetails(Request $request)
    {    
         @$product_details = Product::find(@$request->segment(4)); 
         @$related_product = Related_product::where('product_id',@$request->segment(4))->get();       
         return view('productdetails',compact('product_details','related_product'));         
    }
    public function subcat_details(Request $request)
    {   

         if($request->segment(2) == 'list')
         {
            @$categories_page = Category::where('category_link', 'like', '%' .@$request->segment(1). '%')->get();
            if(count($categories_page) != 0)
            {   $selected     = 'position' ; $show_limits  = '9';
                $subcategory = Subcategory::where('status',1)->where('category_id',@$categories_page[0]->id)->orderBy('order','asc')->paginate(9);
                $subcategorys_menu = Subcategory::where('status',1)->where('category_id',@$categories_page[0]->id)->orderBy('order','asc')->get();
                return view('listsubcategories',compact('subcategory','subcategorys_menu','selected','show_limits','categories_page'));
                /*return redirect()->action('App\Http\Controllers\HomeController@index');*/
            }else
            {
                abort(404);
            }

         }


         /*@$categories_page = Category::where('category_link', 'like', '%' .@$request->segment(1). '%')->get();*/
         @$subcategories_page = Subcategory::where('link', 'like', '%' .@$request->segment(2). '%')->where('status',1)->orderBy('order','asc')->paginate(9);        
            if(count($subcategories_page) != 0)
            {   $selected     = 'position' ; $show_limits  = '9';       
                return view('subcategory1',compact('subcategories_page','selected','show_limits','categories_page'));
              /*return redirect()->action('App\Http\Controllers\HomeController@index');*/
            }else{
                abort(404);
            }       
    }
    
    
}
