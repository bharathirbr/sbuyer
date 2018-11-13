<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin;
use App\Models\faq;
use Session;

class AdminController extends Controller {
   
    /*protected $redirectPath = 'home';*/
     public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function dashboard(Request $Request) {       
        return view('admin.layout');
    }

    public function login(Request $Request) {        
        return view('admin.login.login');
    }
     public function loginprocess(Request $Request)
     {     

       if($_POST)
         {  
              // input values set after validation faild
              $username  = $Request->old('username'); 
              //                 
             // create the validation rules ------------------------
            $rules = array(                         
                'username'         => 'required',     // required and must be unique in the ducks table
                'password'         => 'required',
                /*'password_confirm' => 'required|same:password' */     // required and has to match the password field
            );
            // create custom validation messages ------------------
            $messages = array();
            // do the validation ----------------------------------
            // validate against the inputs from our form
            $validator = Validator::make($Request->all(), $rules, $messages);
            // check if the validator failed -----------------------
            if ($validator->fails())
             {                  
                return redirect()->back()->withErrors($validator->errors())->withInput();
                /*return Redirect::to('ducks')->withErrors($validator)->withInput(Input::except('password', 'password_confirm'));*/
            }else
            {   

                $admin_check = Admin::where('first_name', @$Request->get('username'))->orwhere('email',@$Request->get('username'))->get(); 
                $password_check =  Admin::where('password',@$Request->get('password'))->get();  
                $password_match =  Admin::where('password',@$password_check[0]->password)->where('first_name',@$admin_check[0]->first_name)->where('email',@$admin_check[0]->email)->get();                            
                if($admin_check->count()  > 0)
                {                                     
                            if($password_match->count() > 0)
                            {   
                                 $session_values = array('first_name'=>@$password_match[0]->first_name,                                          
                                          'last_name'=>@$password_match[0]->last_name,
                                          'email'=>@$password_match[0]->email,
                                          'phone'=>@$password_match[0]->phone,
                                          'status'=>@$password_match[0]->status,                                         
                                      ); 
                                 if(Session::get('admin_id')){ $Request->session()->forget('admin_id'); }                                                                         
                                 $Request->session()->push('admin_id', $session_values);
                                return redirect('admin/dashboard');
                            }
                        else{ 
                                  Session::flash('login_failed_password','Please Check Your Password');
                                 return redirect('admin')->withInput();
                             }
                }else{  

                    Session::flash('login_failed_username','Please Check Your Yourname Or Email ');
                    return redirect('admin')->withInput();
                }

            }

       }
    else{            
            return redirect('admin/login');
        }
    }
    public function logout(Request $Request)
    {  
         if(Session::get('admin_id')){ $Request->session()->forget('admin_id');} 
         return redirect('admin'); 
    }
    public function addbanner(Request $Request) {
        return view('admin.addbanner');
    }

    public function banner(Request $Request) {
        return view('admin.banner');
    }

    public function brand(Request $Request) {
        return view('admin.brand');
    }

    public function addbrand(Request $Request) {
        return view('admin.addbrand');
    }

    

    public function video(Request $Request) {
        return view('admin.video');
    }

    public function addvideo(Request $Request) {
        return view('admin.addvideo');
    }

    public function order(Request $Request) {
        return view('admin.order');
    }

    public function customer(Request $Request) {
        return view('admin.customer');
    }

    public function category(Request $Request) {
        return view('admin.category');
    }

    public function addcategory(Request $Request) {
        return view('admin.addcategory');
    }

    public function subcategory(Request $Request) {
        return view('admin.subcategory');
    }

    public function addsubcategory(Request $Request) {
        return view('admin.addsubcategory');
    }

    public function profile(Request $Request) {
        return view('admin.viewprofile');
    }

    public function changepassword(Request $Request) {
        return view('admin.changepassword');
    }

    public function social(Request $Request) {
        return view('admin.social');
    }

    public function editsocial(Request $Request) {
        return view('admin.editsocial');
    }

    public function newsletter(Request $Request) {
        return view('admin.newsletterr');
    }

    public function contact(Request $Request) {
        return view('admin.contact');
    }

}
