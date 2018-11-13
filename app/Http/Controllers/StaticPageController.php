<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Contact_form;
use App\Staticpages;
use Session;
use Mapper;

class StaticPageController extends Controller {

    public function contact(Request $Request)
     {
/*          $faqall = DB::table('staticpages')->get();
          return view('contact', compact('faqall'));*/
        if ($_POST) 
        {

            //values set after validation fails
            $name = $Request->old('name');
            $email = $Request->old('email');
            $subject = $Request->old('subject');
            $message = $Request->old('message');
            $phone = $Request->old('phone');

            /* Session::flash('register_form', ""); */
            // create the validation rules ------------------------
            $rules = array(
                'name' => 'required', // required and must be unique in the ducks table
                'email' => 'required|email|unique:users', // required and must be unique in the ducks table
                'subject' => 'required', // required and must be unique in the ducks table
                'message' => 'required|min:5', // required and must be unique in the ducks table
                'phone' => 'required',
                    /* 'password_confirm' => 'required|same:password' */     // required and has to match the password field
            );

            // create custom validation messages ------------------
            $messages = array();
            // do the validation ----------------------------------
            // validate against the inputs from our form
            $validator = Validator::make($Request->all(), $rules, $messages);
            // check if the validator failed -----------------------
            if ($validator->fails()) {
                /* return redirect()->back()->withErrors($validator->errors()); */
                return redirect()->back()->withErrors($validator->errors())->withInput();
            } else {
                $code = $Request->input('CaptchaCode');
                $isHuman = captcha_validate($code);
                if (!$isHuman) {
                    Session::flash('CaptchaCodes', " Invalid CaptchaCode Please Try Again");
                    /* return redirect('login'); */
                    return redirect('contact')->withInput();
                }

                $newuser = new Contact_form;
                $newuser->name = $Request->input('name');
                $newuser->phone = $Request->input('phone');
                $newuser->email = $Request->input('email');
                $newuser->subject = $Request->input('subject');
                $newuser->message = $Request->input('message');
                $newuser->save();

                Session::flash('contact_success_message', "Thank You For Contacting We Will get back Contact You");
                /* return redirect('login'); */
                return redirect('contact');
            }
        } 
  else {
            Mapper::map(9.9220117, 78.1146341, ['zoom' => 15, 'markers' => ['title' => 'Sbuyer Online Grocery Store', 'animation' => 'DROP'], 'clusters' => ['size' => 10, 'center' => true, 'zoom' => 20]]);
            return view('contact');
        }
    }
  
    public function static_comman_page(Request $Request)
    {
        $static_page = Staticpages::where('link', 'like', '%' .@$Request->segment(1). '%')->get(); 
        if($static_page->count() > 0 )
        {
              return view('about', compact('static_page'));
        }
        else
        {          
             abort(404);
        }       
    } 

   public function faq(Request $Request)
    {
        @$faqall = DB::table('faq')->get(); 
        if($faqall->count() > 0 )
        {               
            @$count = $faqall->count();
            return view('faq', compact('faqall', 'count'));
        }
        else
        {          
             return view('faq', compact('faqall'));
        }       
    }
}
