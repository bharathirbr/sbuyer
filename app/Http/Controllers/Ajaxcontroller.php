<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Helpers\MyFunction;
use App\Models\Admin\Brand;
use App\Models\Admin\Sidebanner;
use App\Models\Admin\Product;
use App\Models\Admin\Blogcategory;
use App\Models\Admin\Blogmanagement;
use App\Models\Admin;
use App\Models\Category;
use App\Models\User;
use App\Subcategory;
use App\Models\Admin\Socialmedia;
use App\Models\Faq;
use App\Staticpages;
use App\Banner;
use Session;
use DB;
use URL;
use Carbon\Carbon;
use Yajra\DataTables\DataTables;

class Ajaxcontroller extends Controller
{
      public function ajax_brand(Request $Request) {
        $users = Brand::select(['id', 'title', 'link', 'content', 'image', 'status','created_at']);       
        return Datatables()->of($users)
            ->addColumn('action', function ($user) {
                return '<a href="brand/edit/'.$user->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                        <a href="brand/delete/'.$user->id.'" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-remove"></i>Remove</a>';
            })
            ->editColumn('id', 'ID: {{$id}}')
            ->removeColumn('password')          
            /*->addColumn('action', function ($user) {
                return '<img src= " '.URL::to('/public/images/brand/'.$user->image).'" />';

            })*/
              ->editColumn('created_at', function ($user) {
                return $user->created_at ? with(new Carbon($user->created_at))->format('m/d/Y') : '';
            })
            ->editColumn('updated_at', function ($user) {
                return $user->updated_at ? with(new Carbon($user->updated_at))->format('Y/m/d') : '';;
            })
            ->make(true);
    }
    public function ajax_social(Request $Request) {
        $social = Socialmedia::select(['id', 'name', 'link', 'class', 'order', 'status','created_at']);       
        return Datatables()->of($social)
            ->addColumn('action', function ($user) {
                return '<a href="social/edit/'.$user->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                        <a href="social/delete/'.$user->id.'" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-remove"></i>Remove</a>';
            })
            ->editColumn('id', 'ID: {{$id}}')           
            ->editColumn('created_at', function ($user) {
                return $user->created_at ? with(new Carbon($user->created_at))->format('m/d/Y') : '';
            })
            ->editColumn('updated_at', function ($user) {
                return $user->updated_at ? with(new Carbon($user->updated_at))->format('Y/m/d') : '';;
            })
            ->make(true);
    }

 public function ajax_satickpage(Request $Request) {
        $staticpage= Staticpages::select(['id','title','link','footer_type','updated_at']);       
        return Datatables()->of($staticpage)
            ->addColumn('action', function ($user) {
                return '<a href="staticpages/edit/'.$user->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                        <a href="staticpages/delete/'.$user->id.'" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-remove"></i>Remove</a>';
            })
            ->editColumn('id', 'ID: {{$id}}')
            ->removeColumn('password')          
            /*->addColumn('action', function ($user) {
                return '<img src= " '.URL::to('/public/images/brand/'.$user->image).'" />';

            })*/
              ->editColumn('created_at', function ($user) {
                return $user->created_at ? with(new Carbon($user->created_at))->format('m/d/Y') : '';
            })
            ->editColumn('updated_at', function ($user) {
                return $user->updated_at ? with(new Carbon($user->updated_at))->format('Y/m/d') : '';;
            })
            ->make(true);
    }
    public function ajax_banners(Request $Request) {       
        $banners= Banner::select(['id','title','link','content','image','status','created_at']);       
        return Datatables()->of($banners)
            ->addColumn('action', function ($user) {
                return '<a href="banner/edit/'.$user->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                        <a href="banner/delete/'.$user->id.'" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-remove"></i>Remove</a>';
            })
            ->editColumn('id', 'ID: {{$id}}')
            ->removeColumn('password')          
            /*->addColumn('action', function ($user) {
                return '<img src= " '.URL::to('/public/images/brand/'.$user->image).'" />';

            })*/
              ->editColumn('created_at', function ($user) {
                return $user->created_at ? with(new Carbon($user->created_at))->format('m/d/Y') : '';
            })
            ->editColumn('updated_at', function ($user) {
                return $user->updated_at ? with(new Carbon($user->updated_at))->format('Y/m/d') : '';;
            })
            ->make(true);             
    } 
    public function ajax_faq(Request $Request) 
    {
        $faq = Faq::select(['id','question','answer','image','status','created_at']);    
            return Datatables()->of($faq)
            ->addColumn('action', function ($user) {
                return '<a href="faq/edit/'.$user->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                        <a href="faq/delete/'.$user->id.'" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-remove"></i>Remove</a>';
            })
            ->editColumn('id', 'ID: {{$id}}')
            ->removeColumn('password')              
             ->editColumn('created_at', function ($user) {
                return $user->created_at ? with(new Carbon($user->created_at))->format('m/d/Y') : '';
            })
            ->editColumn('updated_at', function ($user) {
                return $user->updated_at ? with(new Carbon($user->updated_at))->format('Y/m/d') : '';;
            })
            ->make(true);
    }

     public function ajax_sidebanner(Request $Request) 
    {
        $sidebanner = sidebanner::select(['id','name','content','link','image','status','category_id','created_at']);    
            return Datatables()->of($sidebanner)
            ->addColumn('action', function ($user) {
                return '<a href="sidebanner/edit/'.$user->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                        <a href="sidebanner/delete/'.$user->id.'" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-remove"></i>Remove</a>';
            })
            ->editColumn('id', 'ID: {{$id}}')
           /* ->removeColumn('password')      */        
            ->editColumn('created_at', function ($user) {
                return $user->created_at ? with(new Carbon($user->created_at))->format('m/d/Y') : '';
            })
            ->editColumn('updated_at', function ($user) {
                return $user->updated_at ? with(new Carbon($user->updated_at))->format('Y/m/d') : '';;
            })
            ->make(true);
    }
     public function ajax_categories(Request $Request) 
    {
        $sidebanner = Category::select(['id','category_name','category_link','description','image','status','created_at']);    
            return Datatables()->of($sidebanner)
            ->addColumn('action', function ($user) {
                return '<a href="category/edit/'.$user->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                        <a href="category/delete/'.$user->id.'" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-remove"></i>Remove</a>';
            })
            ->editColumn('id', 'ID: {{$id}}')
           /* ->removeColumn('password')      */        
            ->editColumn('created_at', function ($user) {
                return $user->created_at ? with(new Carbon($user->created_at))->format('m/d/Y') : '';
            })
            ->editColumn('updated_at', function ($user) {
                return $user->updated_at ? with(new Carbon($user->updated_at))->format('Y/m/d') : '';;
            })
            ->make(true);
    }
     public function ajax_subcategories(Request $Request) 
    {
        $sidebanner = Subcategory::select(['id','subcategory','link','content','image','status','order','category_id','created_at']);    
            return Datatables()->of($sidebanner)
            ->addColumn('action', function ($user) {
                return '<a href="subcategory/edit/'.$user->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                        <a href="subcategory/delete/'.$user->id.'" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-remove"></i>Remove</a>';
            })
            ->editColumn('id', 'ID: {{$id}}')
           /* ->removeColumn('password')      */        
            ->editColumn('created_at', function ($user) {
                return $user->created_at ? with(new Carbon($user->created_at))->format('m/d/Y') : '';
            })
            ->editColumn('updated_at', function ($user) {
                return $user->updated_at ? with(new Carbon($user->updated_at))->format('Y/m/d') : '';;
            })
            ->make(true);
    }
    public function ajax_product(Request $Request) 
    {
        $sidebanner = Product::select(['id','name','image','rate','min_price','offer_price','discount_price','category_id','subcategory_id','featured_product','brand_id','created_at']);    
            return Datatables()->of($sidebanner)
            ->addColumn('action', function ($user) {
                return '<a href="product/edit/'.$user->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                        <a href="product/delete/'.$user->id.'" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-remove"></i>Remove</a>';
            })
            ->editColumn('id', 'ID: {{$id}}')
           /* ->removeColumn('password')      */        
            ->editColumn('created_at', function ($user) {
                return $user->created_at ? with(new Carbon($user->created_at))->format('m/d/Y') : '';
            })
            ->editColumn('updated_at', function ($user) {
                return $user->updated_at ? with(new Carbon($user->updated_at))->format('Y/m/d') : '';;
            })
            ->make(true);
    }
    public function ajax_blogcategory(Request $Request) 
    {
        $blogcategory = Blogcategory::select(['id','title','link','content','status','created_at']);    
            return Datatables()->of($blogcategory)
            ->addColumn('action', function ($user) {
                return '<a href="blogcategory/edit/'.$user->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                        <a href="blogcategory/delete/'.$user->id.'" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-remove"></i>Remove</a>';
            })
            ->editColumn('id', 'ID: {{$id}}')
           /* ->removeColumn('password')      */        
            ->editColumn('created_at', function ($user) {
                return $user->created_at ? with(new Carbon($user->created_at))->format('m/d/Y') : '';
            })
            ->editColumn('updated_at', function ($user) {
                return $user->updated_at ? with(new Carbon($user->updated_at))->format('Y/m/d') : '';;
            })
            ->make(true);
    }
    public function ajax_blogmanan(Request $Request) 
    {
        $Blogmanagement = Blogmanagement::select(['id','category','title','link','content','image','status','created_at']);    
            return Datatables()->of($Blogmanagement)
            ->addColumn('action', function ($user) {
                return '<a href="blogmanangement/edit/'.$user->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                        <a href="blogmanangement/delete/'.$user->id.'" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-remove"></i>Remove</a>';
            })
            ->editColumn('id', 'ID: {{$id}}')
           /* ->removeColumn('password')      */        
            ->editColumn('created_at', function ($user) {
                return $user->created_at ? with(new Carbon($user->created_at))->format('m/d/Y') : '';
            })
            ->editColumn('updated_at', function ($user) {
                return $user->updated_at ? with(new Carbon($user->updated_at))->format('Y/m/d') : '';;
            })
            ->make(true);
    }
}
