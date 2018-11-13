<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Feedback;
use App\Helpers\MyFunction;
use Session;
use Image;
use Cart;
use Mail;

class UserController extends Controller
{


    public function mail()
    {  
                  //admin send mail
                   $admin = User::find(18)->toArray();
                   $admin['password']     = '123456' ;
                   Mail::send('emails.admin.welcome_user',$admin, function($message) use ($admin)
                  {
                      $message->from('sbuyerdotcom@gmail.com','Sbuyer');
                      $message->to('sbuyerdotcom@gmail.com');                     
                      $message->subject('New User Registration for Sbuyer!');
                  });
                  //end email template
                  dd('Succeessfully sent');
    } 
      
    public function checkout()
    {   
         return view('checkout');
    }   

   public function login(Request $Request)
    {   
    	if($_POST)
    	 {  
    	      // input values set after validation faild
    	      $email  = $Request->old('email'); 
    	      //     	  	 	 
            Session::flash('login_form', "");
		     // create the validation rules ------------------------
			$rules = array(							
				'email'            => 'required|email', 	// required and must be unique in the ducks table
				'password'         => 'required',
				/*'password_confirm' => 'required|same:password' */		// required and has to match the password field
			);
			// create custom validation messages ------------------
			$messages = array();
			// do the validation ----------------------------------
			// validate against the inputs from our form
			$validator = Validator::make($Request->all(), $rules, $messages);
			// check if the validator failed -----------------------
			if ($validator->fails()) {		
				// also redirect them back with old inputs so they dont have to fill out the form again
				// but we wont redirect them with the password they entered
				return redirect()->back()->withErrors($validator->errors())->withInput();
				/*return Redirect::to('ducks')->withErrors($validator)->withInput(Input::except('password', 'password_confirm'));*/
			}else
			{    
                   /*$if_user = User::where('id', $Request->input('email'))->where('password',$Request->input('password'))->get();*/
                   $user_email_check = User::where('email', $Request->input('email'))->get();
                   $user_password_post = User::where('password',md5($Request->input('password')))->get();                
                   $user_db_password_check = User::where('password',@$user_password_post[0]->password)->where('email',@$Request->input('email'))->get();
                   if($user_email_check->count() > 0)
                   { 
                     if($user_password_post->count() != 0  && @$user_db_password_check->count() != 0)
                         {       $user_data = User::find(@$user_db_password_check[0]->id);
                                 if($user_data->email_verify == '0')
                                 {
                                        Session::flash('email_varify_warning', 'Please Activate Your E-mail Account'); 
                                        return redirect('login');
                                 }
                                     
                                 if(Session::get('user_id')){ $Request->session()->forget('user_id'); }                       	                
                                  $Request->session()->push('user_id', $user_data);
                                  Session::flash('success', 'Welcome to Sbuyer'); 
                                  return redirect('/'); 
                         }
                     else{
                                Session::flash('password_wrong', 'Please Check Your password!');
               	                return redirect('login')->withInput();
                         }
                   }
               else{ 
               	         Session::flash('Email_wrong', 'Please Check Your Email id!');
               	         return redirect('login')->withInput();

                   }
			}

    	 }
     else{  

          return view('login');
    	 }
    	
    }    

        public function register(Request $Request)
    {   
    	if($_POST)
    	 {         	 	  
    	 	  //values set after validation fails
			     $first_names = $Request->old('first_name');
    	 	   $last_names  = $Request->old('last_name');
    	 	   $phone       = $Request->old('phone');
    	 	   $email  = $Request->old('email');
           Session::flash('register_form', "");
		     // create the validation rules ------------------------
			$rules = array(							
				'first_name'       => 'required', 	// required and must be unique in the ducks table
				'last_name'        => 'required', 	// required and must be unique in the ducks table
				'phone'            => 'required', 	// required and must be unique in the ducks table
				'email'            => 'required|email|unique:users', 	// required and must be unique in the ducks table
				'password'         => 'required|min:5',
				/*'password_confirm' => 'required|same:password' */		// required and has to match the password field
			);

			// create custom validation messages ------------------
			$messages = array();
			// do the validation ----------------------------------
			// validate against the inputs from our form
			$validator = Validator::make($Request->all(), $rules, $messages);
			// check if the validator failed -----------------------
			if ($validator->fails())
			{		dd($validator->fails());			
				/*return redirect()->back()->withErrors($validator->errors());*/
				return redirect()->back()->withErrors($validator->errors())->withInput();				
				
			}else
			{                  	 	  
    	 	   
               // validate the user-entered Captcha code when the form is submitted
			    $code = $Request->input('CaptchaCode');
			    $isHuman = captcha_validate($code);
			    if (!$isHuman)
			    {  		           
                       Session::flash('CaptchaCodes', " Invalid CaptchaCode Please Try Again");
                       /*return redirect('login');*/
                       return redirect('login')->withInput();
			    }

                 $user_check =  User::where('phone',$Request->input('phone'))->get();       
			     if($user_check->count() == 0)
			 { 		
                 $newuser =  new User;
                 $newuser->first_name = @$Request->input('first_name');
                 $newuser->last_name = @$Request->input('last_name');
                 $newuser->user_name = 'null';
                 $newuser->phone = @$Request->input('phone');
                 $newuser->land_line= 'null'; 
                 $newuser->email    = @$Request->input('email');
                 $newuser->email1   = 'null';
                 $newuser->email2   = 'null';
                 $newuser->email3   = 'null';
                 $newuser->address  = 'null';
                 $newuser->password =  md5($Request->input('password'));       
                 $newuser->image    = 'null';                 
                 $newuser->status   = 'Active';
                 $newuser->email_verify   = '0';
                 $newuser->dob      =  date('Y-m-d H:i:s');                                    
                 /*$newuser->dob   = ''; */                                
                 $newuser->save();  
               
                  $data['first_name'] =  @$Request->input('first_name');
                  $data['last_name']  =  @$Request->input('last_name');
                  $data['email']      =  @$Request->input('email');

                //email process start
                  $user = User::find(@$newuser->id)->toArray();
                  /* $admin_user_mail = ''.$user['email'].',sbuyerdotcom@gmail.com,admin2@site.com';*/
                  /* $to = explode(',',$admin_user_mail);*/
                 /* Mail::send('emails.welcome', $user, function($message) use ($user,$to)
                 {
                      $message->from('sbuyerdotcom@gmail.com','Sbuyer Testing');
                      $message->to($to);                     
                      $message->subject('Welcome to the Sbuyer!');
                  });*/

                  //user  send mail
                  $user['verify_token'] =  MyFunction::generateRandomString('30');
                  Mail::send('emails.user.welcome_user', $user, function($message) use ($user)
                 {
                      $message->from('sbuyerdotcom@gmail.com','Sbuyer');
                      $message->to($user['email']);                     
                      $message->subject('Welcome to Sbuyer!');
                  });


                  //admin send mail
                   $admin = User::find(@$newuser->id)->toArray();
                   $admin['password']     =  @$Request->input('password');
                   Mail::send('emails.admin.welcome_user',$admin, function($message) use ($admin)
                  {
                      $message->from('sbuyerdotcom@gmail.com','Sbuyer');
                      $message->to('sbuyerdotcom@gmail.com');                     
                      $message->subject('New User Registration for Sbuyer!');
                  });
                  //end email template


                 $insertedId = $newuser->id;                 
                 $user_data = User::find($insertedId);
                 /* $session_values = array('first_name'=>$Request->input('first_name'),
                  	                      'last_name'=>$Request->input('last_name'),
                  	                      'last_name'=>$Request->input('last_name'),
                  	                      'email'=>$Request->input('email'),
                  	                      'status'=>'Active',
                  	                  ); */
                 if(Session::get('user_id') != '' ){ $Request->session()->forget('user_id'); }     
                 $Request->session()->push('user_id', $user_data);                            
                 //session end //
                 Session::flash('success', " Your Data Was Registered Succeessfully Please Verify Your E-mail Account");
                 return redirect('login');
              }else{                           	
                 Session::flash('danger', " Your Phone Already Exists Please use Another One");
                 return redirect('login')->withInput();
			        	
              }
			}

    	 }   
    	
    }

    public function forgetpassword(Request $Request)
    {     if($_POST)
       {  
            // input values set after validation faild
            $email  = $Request->old('email');   
            $rules = array(             
              'email'            => 'required|email',            
              /*'password_confirm' => 'required|same:password' */   // required and has to match the password field
                         );          
            $messages = array();           
            $validator = Validator::make($Request->all(), $rules, $messages);          
            if ($validator->fails())
              {    
                return redirect()->back()->withErrors($validator->errors())->withInput();
              }
              else
              {                    
                   $user_email_check = User::where('email', $Request->input('email'))->get();
                   if(count($user_email_check) != '0')
                   {
                        //user  send mail
                        $user_email_check['link'] = url('user_forget_password/'.@$user_email_check[0]->password);
                        $user_email_check['name'] = $user_email_check[0]->first_name;
                        Mail::send('emails.user.forget_password', $user_email_check, function($message) use ($user_email_check)
                        {
                            $message->from('sbuyerdotcom@gmail.com','Sbuyer');
                            $message->to($user_email_check[0]->email);                     
                            $message->subject('Password Change!');
                        });

                        //admin send mail
                        /* $admin = User::find(@$newuser->id)->toArray();
                         $admin['password']     =  @$Request->input('password');
                         Mail::send('emails.admin.welcome_user',$admin, function($message) use ($admin)
                        {
                            $message->from('sbuyerdotcom@gmail.com','Sbuyer');
                            $message->to('sbuyerdotcom@gmail.com');                     
                            $message->subject('New User Registration for Sbuyer!');
                        });*/
                        //end email template
                   }else
                   {
                          Session::flash('warning', " This email Not exists!");
                          return redirect()->back(); 
                   }
              }

       }
  else{
        return view('forgetpassword');
      }
    }
  public function email_forget_password(Request $Request)
    {     
       if($_POST)
       {              
            $password          = $Request->old('password');
            $password_confirm  = $Request->old('password_confirm');    
            $rules = array(             
              'password'         => 'required',            
              'password_confirm' => 'required|same:password' 
                         );          
            $messages = array();           
            $validator = Validator::make($Request->all(), $rules, $messages);          
            if ($validator->fails())
              {    
                return redirect()->back()->withErrors($validator->errors())->withInput();
              }
              else
              {                    
                   $user_email_check = User::where('password',md5($Request->segment(1)))->get();
                   if(count($user_email_check) != '0')
                   {
                        //user  send mail
                        $user_email_check->password = md5(@$Request->input('password'));
                        $user_email_check->password->save();
                        if(Session::get('user_id') != '' ){ $Request->session()->forget('user_id'); }     
                        $Request->session()->push('user_id', $user_email_check);
                        Session::flash('success', " You have Succeessfully Logedin!");
                        return redirect('/'); 
                       
                   }else
                   {
                          Session::flash('warning', " This email Not exists!");
                          return redirect()->back(); 
                   }
              }

       }
    else{
          /*$user_email_check = User::where('email', $Request->input('email'))->get();*/
          return view('email_forget_password');
        }
    }   

    public function myaccount(Request $Request) 
    {
     //check if session or not 
     if(@Session::get('user_id')[0]['id'] != '')
      {   


          //profile function start
        if (@$Request->segment(1) == 'editprofile')
        {   
           if($_POST)
           {                    
                  
                  $dob = date('Y-m-d', strtotime($Request->input('dob')));               
                  $rules = array(             
                          'first_name'           => 'required',              
                          'last_name'            => 'required',              
                          'user_name'            => 'required',              
                          'email'                => 'required|email',              
                          'dob'                  => 'required',              
                          'phone'                => 'required',              
                          'address'              => 'required', 
                          'photo'                => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',             
                         );          
                  $messages = array();            
                  $validator = Validator::make($Request->all(), $rules, $messages);          
                  if ($validator->fails())
                  {    
                      return redirect()->back()->withErrors($validator->errors())->withInput();            
                  }
              else{

                        $user = User::where('email',@$Request->input('email'))->whereNotIn('id',[@Session::get('user_id')[0]['id']])->get();                                          
                        if($user->count() > 0 )
                        {
                          Session::flash('warning', " This email alerady exists");
                          return redirect()->back();    
                        }
                    else{  

                         $myimage = MyFunction::image_upload(@$Request->file('photo'),'/images/userimages/','/images/userimages/thum_images');                       
                         $user = User::find(@Session::get('user_id')[0]['id']);
                         $user->first_name = @$Request->input('first_name');
                         $user->last_name  = @$Request->input('last_name');
                         $user->user_name  = @$Request->input('user_name');
                         $user->phone      = @$Request->input('phone');
                         $user->email      = @$Request->input('email');
                         $user->land_line  = @$Request->input('land_line');
                         $user->address    = @$Request->input('address');
                         $user->dob        = @$dob ;
                         $user->image      = (@$myimage) ? @$myimage : @$user->image ;
                         $user->save();
                         $user_data = User::find(@Session::get('user_id')[0]['id']);              
                         if(Session::get('user_id') != '' ){ $Request->session()->forget('user_id'); }     
                         $Request->session()->push('user_id', $user_data); 
                         Session::flash('success', "Your Profile Updated Succeessfully");
                         return redirect()->back();  
                        }
                  }
              

             }
        else{ 
                  $user_data = User::where('id',@Session::get('user_id')[0]['id'])->get();
                  return view('myaccount')->with('user_data',$user_data);
             }
         }
         //end profile function   



        //email address function start
        if (@$Request->segment(1) == 'emailaddress')
        {   
           if($_POST)
           {
               if(@$Request->input('alter_email') == '')
               { 
                   Session::flash('warning', " Please Enter Your email ");
                   return redirect()->back();                   
               }else
               {       
                   
                  $email  = $Request->old('alter_email');          
                  $rules = array(             
                          'alter_email'            => 'required|email',              
                         );          
                  $messages = array();            
                  $validator = Validator::make($Request->all(), $rules, $messages);          
                  if ($validator->fails())
                  {    
                      return redirect()->back()->withErrors($validator->errors())->withInput();            
                  }
              else{
                        $user = User::where('email',@$Request->input('alter_email'))->whereNotIn('id',[@$Request->segment(2)])->get();                                          
                        if($user->count()  != 0 )
                        {
                          Session::flash('warning', " This email alerady exists");
                          return redirect()->back();    
                        }
                    else{
                           /*$newuser =  new User;        
                           $newuser->email1 = $Request->input('alter_email');                                          
                           $newuser->save();  */

                           $update_values =  array('email1' =>@$Request->input('alter_email'));
                           User::where('id',@$Request->segment(2))->update($update_values);

                           Session::flash('success', "Your email Updated Succeessfully");
                           return redirect()->back();  
                        }
                  }
                } 

             }
        else{
                  $user_data = User::where('id',@Session::get('user_id')[0]['id'])->get();
                  return view('myaccount')->with('user_data',$user_data);
             }
         }
         //end email change function                     
            
      



        //password function start
         if (@$Request->segment(1) == 'password')
        {  
            if($_POST)
            {    $rules = array(             
                    'oldpassword'          => 'required',  
                    'password'             => 'required',                        
                    'passworda'            => 'required',                        
                  ); 
                  $messages = array();    
                  $validator = Validator::make($Request->all(), $rules, $messages);     
                  if ($validator->fails())
                  {       
                    return redirect()->back()->withErrors($validator->errors())->withInput();      
                  }
                  else
                  {
                       $user = User::where('id',@$Request->segment(2))->where('password',md5(@$Request->input('oldpassword')))->get();                                      
                      if($user->count() != 0 )
                      {
                         $user = User::find(@$Request->segment(2));
                         $user->password = md5(@$Request->input('passworda'));
                         $user->save();
                         Session::flash('success', " Your Password Changed Succeessfully");
                         return redirect()->back();    
                      }
                   else{ 
                         Session::flash('warning', " Your old password not matching");
                         return redirect()->back();
                       }
                  }

            }else{
                     $user_data = User::where('id',@$Request->segment(2))->get();
                    return view('myaccount')->with('user_data',$user_data);
                 }


        }
        //end password 



         //feedback function start
         if (@$Request->segment(1) == 'customerservice')
        {  
            if($_POST)
            {                   
                 $rules = array(             
                    'feedback'          => 'required',                                        
                  ); 
                  $messages = array();    
                  $validator = Validator::make($Request->all(), $rules, $messages);     
                  if ($validator->fails())
                  {       
                    return redirect()->back()->withErrors($validator->errors())->withInput();      
                  }
                  else
                  {
                       $users = User::find(@$Request->segment(2))->get();    
                       /*dd($user[0]->id); */                                 
                      if($users)
                      {
                         $user = new Feedback ;
                         $user->user_id  = @$users[0]->id;
                         $user->email    = @$users[0]->email;
                         $user->feedback = @$Request->input('feedback') ;
                         $user->save();
                         Session::flash('success', " Thanks for Your feedback");
                         return redirect()->back();    
                      }
                  
                  }

            }else{
                     $user_data = User::where('id',@$Request->segment(2))->get();
                    return view('myaccount')->with('user_data',$user_data);
                 }


        }
        //end feedback fomr

         $user_data = User::where('id',@Session::get('user_id')[0]['id'])->get();
         return view('myaccount')->with('user_data',$user_data);
        
    }
else{
         return redirect('login');
    }
  }


  public function login_user_email_verification(Request $Request)
    {        
        $user_data = User::where('email',@$Request->segment(2))->get();
      if(count($user_data) !='0') 
        { 
             if($user_data[0]->status == 'Active')
             {
                         $users = User::where('email',@$Request->segment(2))->get();
                         $users->email_verify = '1';                       
                         $users->save();
                         Session::flash('success', "Your Account was Verify Ready to Use");
                         return redirect('login');
             }
        else{
              Session::flash('danger', " Sorry Your Account was Blocked Please contact administration");
              return redirect('login');
             }           
        } 
    else{
          Session::flash('danger', " Sorry Your Email Not Exists");
          return redirect('login');
        }
       
    }

 public function logout(Request $Request)
    {
      if(Session::get('user_id')){ $Request->session()->forget('user_id');} 
       return redirect('');
    }
}
