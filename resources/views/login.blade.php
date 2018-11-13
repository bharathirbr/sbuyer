<!doctype html>
<html>
<head>
    @include('header.head')
</head>
<body class="cms-index-index index-opt-1">
    <div class="wrapper">
                @include('header.header')
        <!-- MAIN -->
        <main class="site-main"> 

             <!-- breadcrumb -->
            <div class="container breadcrumb-page">
                <ol class="breadcrumb">
                    <li><a href="#">Home </a></li>
                    <li class="active">Authentication</li>
                </ol>
            </div>
             <!-- breadcrumb -->

 <!-- login  start -->
                           <div class="flash-message">
                              @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                                @if(Session::has($msg))
                                <p class="alert alert-{{ $msg }}">{{ Session::get($msg) }}</p>
                                @endif
                              @endforeach
                            </div>

            <div class="page-title-base container">
                <h1 class="title-base">authentication</h1>
            </div>

            <div class="container">

                
                <div class="block-form-login">
                    <!-- block Create an Account -->
                    <div class="block-form-create">
                        <div class="block-title">
                            Create an Account
                        </div>
                        <div class="block-content">
                            <p>Please enter your email address to create an account!</p>

                            <!--  @if (Session::has('register_success_form')) 
                                    <div class="alert alert-success">
                                   {{ Session::get('register_success_form')}} 
                                   </div>
                             @endif -->                           

                            <form name="register_form" id="register_form"  action="{!! url('register'); !!}" method="post" class="register_form">
                                {{ csrf_field() }}
                                <div class="form-group">

                                    <input type="text"  name="first_name" value="{{ old('first_name') }}" class="form-control"  placeholder="Your first Name"/>
                                     @if (Session::has('register_form')) 
                                     @if (@$errors->has('first_name'))
                                         <label class="error">{{ @$errors->first('first_name') }}</label>
                                      @endif
                                     @endif
                               </div>

                              <div class="form-group">
                                    <input type="text"  name="last_name" value="{{ old('last_name') }}" class="form-control"   placeholder="Your last Name"/>
                                     @if (Session::has('register_form')) 
                                     @if (@$errors->has('last_name'))
                                         <label class="error">{{ @$errors->first('last_name') }}</label>
                                    @endif
                                    @endif
                               </div>

                               <div class="form-group">
                                    <input type="text"  name="phone" value="{{ old('phone') }}" class="form-control" placeholder=" (+91) Phone Number"/>
                                     @if (Session::has('register_form')) 
                                     @if (@$errors->has('phone'))
                                         <label class="error">{{ @$errors->first('phone') }}</label>
                                    @endif
                                    @endif
                               </div>

                               <div class="form-group">
                                    <input type="text"  value="{{ old('email') }}" name="email" class="form-control" placeholder="Your email"/>
                                    @if (Session::has('register_form')) 
                                     @if (@$errors->has('email'))
                                         <label class="error">{{ @$errors->first('email') }}</label>
                                    @endif
                                    @endif
                               </div>

                                <div class="form-group">
                                    <input type="password" name="password"  class="form-control" placeholder="Password">
                                    @if (Session::has('register_form')) 
                                     @if (@$errors->has('password'))
                                         <label class="error">{{ @$errors->first('password') }}</label>
                                    @endif
                                    @endif
                                </div>

                                <!-- show captcha image html -->
                                 <div class="form-group">
                                <label>Retype the characters from the picture</label>
                                {!! captcha_image_html('ContactCaptcha') !!}
                                <input type="text" class="form-control" id="CaptchaCode" name="CaptchaCode" placeholder="Enter captcha">

                                @if (Session::has('CaptchaCodes'))                                 
                                    <label class="error"> {{ Session::get('CaptchaCodes') }} </label>                                 
                                @endif
                               </div>

                            <button type="submit" class="btn btn-inline">Register</button>
                          </form>
                        </div>
                    </div>
                   
                

                    <!-- block Create an Account -->

                    <!-- block Registered-->
                    <div class="block-form-registered">
                       
                        <div class="block-title">
                            Already Registered?
                        </div>
                                   @if (Session::has('email_varify_warning'))                                 
                                         <label class="error"> {{ Session::get('email_varify_warning') }} </label>                               
                                    @endif
                                    @if (Session::has('email_not_Exists_warning'))                                 
                                         <label class="error"> {{ Session::get('email_not_Exists_warning') }} </label>                               
                                    @endif
                                    @if (Session::has('account_block'))                                 
                                         <label class="error"> {{ Session::get('account_block') }} </label>                               
                                    @endif                           
                        <div class="block-content">
                            <p>If you have an account please enter the username & password here !</p>
                            <form name="login_form" id="login_form"  action="{!! url('login'); !!}" method="post" class="myForm">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <input type="text"  name="email" value="{{ old('email') }}" class="form-control" placeholder="Your email" />
                                     @if (Session::has('login_form')) 
                                    @if (@$errors->has('email'))
                                          <label class="error">{{ @$errors->first('email') }}</label>
                                     @endif
                                     @endif
                                      @if (Session::has('Email_wrong'))                                 
                                         <label class="error"> {{ Session::get('Email_wrong') }} </label>                                 
                                      @endif
                               </div>
                                <div class="form-group">
                                    <input type="password" name="password"  class="form-control" placeholder="Password">
                                     @if (Session::has('login_form')) 
                                    @if (@$errors->has('password'))
                                         <label class="error">{{ @$errors->first('password') }}</label>
                                    @endif
                                    @endif
                                     @if (Session::has('password_wrong'))                                 
                                         <label class="error"> {{ Session::get('password_wrong') }} </label>                                 
                                    @endif
                                </div>

   
    
                                <div class="checkbox">
                                   <!--  <label>
                                        <input type="checkbox"><span>Remember me!</span>
                                    </label> -->
                                </div>
                                <button type="submit" class="btn btn-inline">Login</button>
                            </form>
                        </div>
                       

                        
                    </div><!-- block Registered-->

                </div>

                <!-- Forgot your password -->
                <div class="block-forgot-pass">
                    Forgot your password ? <a href="{!! url('forgetpassword') !!}">Click Here</a>
                </div><!-- Forgot your password -->

            </div>

       <!-- end login  -->




                                                       

        
           @include('footer.footer')    
        </main>
    <!-- end MAIN -->    
    </div>      
</body>
</html>