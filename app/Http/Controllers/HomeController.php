<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Admin\Brand;
use App\Models\Admin\Sidebanner;
use App\Models\Category;
use App\Subcategory;
use App\Models\Admin\Blogmanagement;
use App\Banner;

use Session;
use DB;
class HomeController extends Controller
{
    public function index(Request $request)
    {   
        
            $hot = Category::where('hotcategory','1')->where('status','1')->orwhere('category_name','HOT CATEGORIES')->get();          
            $user_data = User::where('id',@Session::get('user_id')[0]['id'])->get();         
            $banner = Banner::where('status','1')->orderBy('order','asc')->get();           
            //using side banner
            $side_ban = Sidebanner::where('status','1')->get();
            $side_banner = $side_ban->unique('category_id');           
            $allcategories = Category::where('status','1')->get();
            //end side banner            
            $brand = Brand::where('status','1')->orderBy('order','asc')->get();
            /*dd($brand);*/
            $address= DB::table('staticpages')->get();
        $blog = Blogmanagement::orderBy('updated_at', 'DESC')->limit(3)->get();
            return view('home')->with(compact('hot'))->with(compact('user_data'))->with(compact('banner'))->with(compact('brand'))->with(compact('address'))->with(compact('blog'))->with(compact('subcat'))->with(compact('side_banner'))->with(compact('allcategories'));  
            /* $user_data = User::where('id',@Session::get('user_id')[0][0]['id'])->get();
            return view('home')->with('user_data',$user_data);*/        
    }

 

}
