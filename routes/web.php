<?php

/*Route::get('/', function () {
    return view('welcome');
});
*/
//home pageRoute::get('/','HomeController@index');



Route::group(['middleware' => ['web']], function () {  

Route::match(array('GET','POST'),'/', 'HomeController@index');
// User details
Route::match(array('GET','POST'),'login', 'UserController@login');
Route::match(array('GET','POST'),'register', 'UserController@register');
Route::match(array('GET'),'cart', 'UserController@checkout');

Route::match(array('GET','POST'),'addItem/{id}', 'CartController@addItem');
Route::match(array('GET','POST'),'updateItem', 'CartController@updateItem');
Route::match(array('GET','POST'),'removeItem/{id}', 'CartController@removecart');
Route::match(array('GET','POST'),'removeItemall', 'CartController@removeItemall');

Route::match(array('GET','POST'),'wishlist', 'CartController@Wishlist');
Route::match(array('GET','POST'),'wishlist/{id}', 'CartController@Wishlistadd');

Route::match(array('GET'),'forgetpassword', 'UserController@forgetpassword');
Route::match(array('GET'),'user_forget_password/{param}','UserController@email_forget_password');
Route::match(array('GET'),'logout', 'UserController@logout');

Route::match(array('GET','POST'),'myaccount', 'UserController@myaccount');
Route::match(array('GET','POST'),'emailaddress/{id}', 'UserController@myaccount');
Route::match(array('GET','POST'),'password/{id}', 'UserController@myaccount');
Route::match(array('GET','POST'),'deliveryddresses', 'UserController@myaccount');
Route::match(array('GET','POST'),'editprofile', 'UserController@myaccount');

Route::match(array('GET','POST'),'recommended/{id}', 'UserController@myaccount');
Route::match(array('GET','POST'),'pastorder/{id}', 'UserController@myaccount');
Route::match(array('GET','POST'),'shoppinglist/{id}', 'UserController@myaccount');
Route::match(array('GET','POST'),'smartbasket/{id}', 'UserController@myaccount');
Route::match(array('GET','POST'),'myorder/{id}', 'UserController@myaccount');
Route::match(array('GET','POST'),'customerservice/{id}', 'UserController@myaccount');
//Blog start
Route::match(array('GET','POST'),'blog', 'BlogController@blogmanangement');
Route::match(array('GET','POST'),'blog/{param}', 'BlogController@blogcategory_detail');
Route::match(array('GET','POST'),'blog/{param}/{param1}', 'BlogController@blogmanangement_detail');


//Login user Email verfication  
Route::match(array('GET','POST'),'email_verification/{param}/{param1}', 'UserController@login_user_email_verification');



//product page details
/*Route::match(array('GET','POST'),'product', 'ProductController@product');
Route::match(array('GET','POST'),'productdetails/{id}', 'ProductController@productdetails');
Route::match(array('GET','POST'),'listproduct', 'ProductController@listproduct');*/

});

//admin start
Route::group(['prefix' => 'admin','middleware' => 'Admin_kernal'], function () { 
    
Route::match(array('GET','POST'),'/', 'AdminController@category');
Route::match(array('GET', 'POST'), '', 'AdminController@login');
Route::match(array('GET', 'POST'), 'dashboard', 'AdminController@dashboard');

Route::match(array('GET', 'POST'), 'loginprocess', 'AdminController@loginprocess');

Route::match(array('GET', 'POST'), 'banner', 'AdminController@banner');
Route::match(array('GET', 'POST'), 'banner/add', 'AdminController@addbanner');
Route::match(array('GET', 'POST'), 'banner/edit/{id}', 'AdminController@editbanner');
Route::match(array('GET', 'POST'), 'banner/delete/{id}', 'AdminController@editbanner');

Route::match(array('GET', 'POST'), 'brand', 'AdminController@brand');

Route::match(array('GET', 'POST'), 'brand/add', 'AdminController@addbrand');
Route::match(array('GET', 'POST'), 'brand/edit/{id}', 'AdminController@addbrand');
Route::match(array('GET', 'POST'), 'brand/delete/{id}', 'AdminController@addbrand');

//start sidebanner
Route::match(array('GET', 'POST'), 'sidebanner', 'AdminController@sidebannermanage');
Route::match(array('GET', 'POST'), 'sidebanner/add', 'AdminController@sidebanner');
Route::match(array('GET', 'POST'), 'sidebanner/edit/{id}', 'AdminController@sidebanner');
Route::match(array('GET', 'POST'), 'sidebanner/delete/{id}', 'AdminController@sidebanner');
//end sidebanner 

Route::match(array('GET', 'POST'), 'faq', 'Admin\Faqcontroller@faq');
Route::match(array('GET', 'POST'), 'faq/add','Admin\Faqcontroller@addfaq');
Route::match(array('GET', 'POST'), 'faq/edit/{id}', 'Admin\Faqcontroller@edit');
Route::match(array('GET', 'POST'), 'faq/delete/{id}', 'Admin\Faqcontroller@edit');
//faq end
//Blog start
Route::match(array('GET', 'POST'), 'blogcategory','Admin\BlogController@blogcategory');
Route::match(array('GET', 'POST'), 'blogcategory/add','Admin\BlogController@addblogcategory');
Route::match(array('GET', 'POST'), 'blogcategory/edit/{id}', 'Admin\BlogController@edit');
Route::match(array('GET', 'POST'), 'blogcategory/delete/{id}', 'Admin\BlogController@edit');
Route::match(array('GET', 'POST'), 'blogmanangement','Admin\BlogController@blogmanangement');
Route::match(array('GET', 'POST'), 'blogmanangement/add', 'Admin\BlogController@addblogmanangement');
Route::match(array('GET', 'POST'), 'blogmanangement/edit/{id}', 'Admin\BlogController@editblog');
Route::match(array('GET', 'POST'), 'blogmanangement/delete/{id}', 'Admin\BlogController@editblog');
//Blog end
//staticpages start
Route::match(array('GET', 'POST'), 'staticpages','Admin\StaticpagesController@staticpages');
Route::match(array('GET', 'POST'), 'staticpages/edit/{id}','Admin\StaticpagesController@edit');
Route::match(array('GET', 'POST'), 'staticpages/delete/{id}','Admin\StaticpagesController@edit');
//staticpages end
//social icons start
Route::match(array('GET', 'POST'), 'social', 'AdminController@social');
Route::match(array('GET', 'POST'), 'social/add', 'AdminController@addsocial');
Route::match(array('GET', 'POST'), 'social/edit/{id}', 'AdminController@addsocial');
Route::match(array('GET', 'POST'), 'social/delete/{id}', 'AdminController@addsocial');
//end

Route::match(array('GET', 'POST'), 'video', 'AdminController@video');
Route::match(array('GET', 'POST'), 'video/add', 'AdminController@addvideo');
Route::match(array('GET', 'POST'), 'order', 'AdminController@order');
Route::match(array('GET', 'POST'), 'customer', 'AdminController@customer');

//start category
Route::match(array('GET', 'POST'), 'category', 'AdminController@category');
Route::match(array('GET', 'POST'), 'category/add', 'AdminController@addcategory');
Route::match(array('GET', 'POST'), 'category/edit/{id}', 'AdminController@addcategory');
Route::match(array('GET', 'POST'), 'category/delete/{id}', 'AdminController@addcategory');
//end category 
//start product
Route::match(array('GET', 'POST'), 'product', 'AdminController@product');
Route::match(array('GET', 'POST'), 'product/add', 'AdminController@product');
Route::match(array('GET', 'POST'), 'product/edit/{id}', 'AdminController@product');
Route::match(array('GET', 'POST'), 'product/delete/{id}', 'AdminController@product');
//end product 
//subgategory
Route::match(array('GET', 'POST'), 'subcategory', 'AdminController@subcategory');
Route::match(array('GET', 'POST'), 'subcategory/add', 'AdminController@addsubcategory');
Route::match(array('GET', 'POST'), 'subcategory/edit/{id}', 'AdminController@editsubcategory');
Route::match(array('GET', 'POST'), 'subcategory/delete/{id}', 'AdminController@editsubcategory');
//end subgategory

Route::match(array('GET', 'POST'), 'viewprofile', 'AdminController@profile');
Route::match(array('GET', 'POST'), 'changepassword', 'AdminController@changepassword');
Route::match(array('GET', 'POST'), 'social', 'AdminController@social');
Route::match(array('GET', 'POST'), 'social/edit', 'AdminController@editsocial');
Route::match(array('GET', 'POST'), 'newsletter', 'AdminController@newsletter');
Route::match(array('GET', 'POST'), 'contact', 'AdminController@contact');
Route::match(array('GET', 'POST'), 'logout', 'AdminController@logout');

//admin ajax database url 
Route::match(array('GET','POST'),'ajax_brand', 'Ajaxcontroller@ajax_brand');
Route::match(array('GET','POST'),'ajax_satickpage', 'Ajaxcontroller@ajax_satickpage');
Route::match(array('GET','POST'),'ajax_banners', 'Ajaxcontroller@ajax_banners');
Route::match(array('GET','POST'),'ajax_faq', 'Ajaxcontroller@ajax_faq');
Route::match(array('GET','POST'),'ajax_sidebanner', 'Ajaxcontroller@ajax_sidebanner');
Route::match(array('GET','POST'),'ajax_categories', 'Ajaxcontroller@ajax_categories');
Route::match(array('GET','POST'),'ajax_subcategories', 'Ajaxcontroller@ajax_subcategories');
Route::match(array('GET','POST'),'ajax_product', 'Ajaxcontroller@ajax_product');
Route::match(array('GET','POST'),'ajax_blogcategory', 'Ajaxcontroller@ajax_blogcategory');
Route::match(array('GET','POST'),'ajax_blogmanan', 'Ajaxcontroller@ajax_blogmanan');
Route::match(array('GET','POST'),'ajax_social', 'Ajaxcontroller@ajax_social');
});


// statics page details

/*Route::match(array('GET'),'about', 'StaticPageController@about');
Route::match(array('GET'),'testimonials', 'StaticPageController@testimonials');
Route::match(array('GET'),'affiliateprogram', 'StaticPageController@affiliateprogram');
Route::match(array('GET'),'termsconditions', 'StaticPageController@termsconditions');
Route::match(array('GET'),'privacypolicy', 'StaticPageController@privacypolicy');
Route::match(array('GET'),'sitemap', 'StaticPageController@sitemap');
Route::match(array('GET'),'return', 'StaticPageController@return');
Route::match(array('GET'),'faq', 'StaticPageController@faq');*/
// statics end

// statics page details
/*Route::match(array('GET','POST'),'{name}', 'StaticPageController@contact');
Route::match(array('GET'),'{name}', 'StaticPageController@about');


Route::match(array('GET'),'{name}', 'StaticPageController@testimonials');
Route::match(array('GET'),'{name}', 'StaticPageController@affiliateprogram');
Route::match(array('GET'),'{name}', 'StaticPageController@termsconditions');
Route::match(array('GET'),'{name}', 'StaticPageController@privacypolicy');
Route::match(array('GET'),'{name}', 'StaticPageController@sitemap');
Route::match(array('GET'),'{name}', 'StaticPageController@return');
Route::match(array('GET'),'{name}', 'StaticPageController@faq');*/
// statics end

//contact page
Route::match(array('GET','POST'),'contact', 'StaticPageController@contact');
//faq details
Route::match(array('GET'),'faq', 'StaticPageController@faq');

Route::match(array('GET','POST'),'allcategories', 'ProductController@product');
Route::match(array('GET','POST'),'allcategories/list', 'ProductController@listproduct');

Route::match(['get', 'post'], '{name}', function (Request $request) {

        @$static_page = App\Staticpages::where('link', 'like', '%' .\Request::segment(1). '%')->get(); 
        if($static_page->count() > 0 )
        { 
                     return view('about', compact('static_page'));
        }
        else
        {
        	//pagination and short for subcategories
              if($_POST)
              {     @$categories_page = App\Models\Category::where('category_link', 'like', '%' .\Request::segment(1). '%')->get();
                       if($request::input('shot_by') !='' && $request::input('show_limit') !='')
                       {
                       	  if(@$request::input('show_limit') == '9'){ $show_limits= '9'; }elseif(@$request::input('show_limit') == '16'){ $show_limits= '16';}else{$show_limits=  '32'; }

                if(@$request::input('shot_by') == 'name')
                 { 
                 	   @$column_name = 'name' ;
                 	   @$order = 'asc' ;
                 	    $selected = 'name' ;
                  }elseif(@$request::input('shot_by') == 'price')
                  {
                      @$column_name = 'rate' ; @$order = 'desc' ; $selected = 'price' ; 
                  }else{ 
                   	    @$column_name = 'id' ;  @$order = 'asc' ; $selected = 'position' ;
                     }  
                      $subcategory = App\Subcategory::where('status',1)->where('category_id',@$categories_page[0]->id)->orderBy('order','asc')->paginate(9);
                      $subcategorys_menu = App\Subcategory::where('status',1)->where('category_id',@$categories_page[0]->id)->orderBy('order','asc')->get();
                     $all_product = App\Models\Admin\Product::where('status',1)->orderBy(@$column_name,@$order)->paginate(@$request::input('show_limit'));
                      return view('subcategory',compact('subcategory','subcategorys_menu','selected','show_limits','categories_page'));

                       }
                        
              }
              //end
             


        	@$categories_page = App\Models\Category::where('category_link', 'like', '%' .\Request::segment(1). '%')->get();
        	if(count($categories_page) != 0)
        	{   $selected     = 'position' ; $show_limits  = '9';
                $subcategory = App\Subcategory::where('status',1)->where('category_id',@$categories_page[0]->id)->orderBy('order','asc')->paginate(9);
                $subcategorys_menu = App\Subcategory::where('status',1)->where('category_id',@$categories_page[0]->id)->orderBy('order','asc')->get();
                return view('subcategory',compact('subcategory','subcategorys_menu','selected','show_limits','categories_page'));
                /*return redirect()->action('App\Http\Controllers\HomeController@index');*/
        	}else
        	{
        		abort(404);
        	}
        }     

});
Route::match(array('GET','POST'),'{param}/{param1}', 'ProductController@subcat_details');
Route::match(array('GET','POST'),'{param}/{param1}/{param2}/{param3}', 'ProductController@productdetails');

/*Route::match(array('GET'),'{name}', 'StaticPageController@static_comman_page');*/



Route::match(array('GET','POST'),'product/{param}/{param1}/{param2}', 'ProductController@productdetails');

//testing concept email
Route::get('mail', 'UserController@mail');

/*Route::match(array('GET'),'{param}', 'StaticPageController@static_comman_page');*/