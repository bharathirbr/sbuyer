<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use App\Models\User;
use App\Models\Admin\Brand;
use App\Models\Admin\Sidebanner;
use App\Models\Category;
use App\Staticpages;
use App\Subcategory;
use App\Models\Admin\Blogmanagement;
use App\Models\Admin\Socialmedia;
use App\Banner;


class CommonServiceProvider extends ServiceProvider
{


    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

              
        /* View::share(compact($cat));*/

         view()->composer('*', function ($view)
        {                       
                 //for seo concept
                 if(\Request::segment(1) !='' && \Request::segment(2) =='')
                 { 
                     @$static_pages_seo = Staticpages::where('link',\Request::segment(1))->get(); 
                     if(count(@$static_pages_seo) != 0 ){ @$static_pages_seo = @$static_pages_seo ; }
                 }               

             //como menu package 
             @$combo_menu = Category::where('category_name','COMBO')->where('status','1')->orderBy('order','asc')->get();
            /* dd($combo_menu->count());*/
              //NUTRITION menu package 
             @$nutrition_menu = Category::where('category_name','NUTRITION')->where('status','1')->orderBy('order','asc')->get();
              //GIFT  menu package 
             @$gifts_menu = Category::where('category_name','GIFTS')->where('status','1')->orderBy('order','asc')->get();
             @$cat = Category::where('page_type','home_page')->where('status','1')->orderBy('order','asc')->get(); 
             @$cat_menu_page = Category::where('page_type','menu_page')->where('status','1')->orderBy('order','asc')->get();
             @$allgategories = Category::where('page_type','menu_page')->orwhere('page_type','home_page')->where('status','1')->orderBy('order','asc')->get();
            
             /* dd(\Request::segment(1));*/
             //footer static pages
             @$static_pages = Staticpages::all(); 
              //footer socialmedia pages
             @$socialmedia = Socialmedia::where('status',1)->orderBy('order','asc')->get();  
             $view->with(compact('cat','cat_menu_page','allgategories','combo_menu','nutrition_menu','gifts_menu','static_pages','static_pages_seo','socialmedia'));
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
