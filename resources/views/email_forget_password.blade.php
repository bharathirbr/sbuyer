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
                    <li class="active">Change Password</li>
                </ol>
            </div>
             <!-- breadcrumb -->

 <!-- login  start -->
            <div class="page-title-base container">
                <h1 class="title-base">Change Password</h1>
            </div>

    <div class="container">                
                <div class="block-form-login">
                    <!-- block Create an Account -->
                    <div class="block-form-create">
                        <div class="block-title">
                             Change Password
                        </div>                                                    
                        <div class="block-content">                          
                            <form name="email_forget_password" id="email_forget_password"  action="{!! url('email_forget_password/'.Request::segment(1)); !!}" method="post" class="myForm">
                                {{ csrf_field() }}
                                <div class="form-group">
                                <input type="password"  name="password" class="form-control" placeholder="Your Password" />    
                                     @if (@$errors->has('password'))
                                          <label class="error">{{ @$errors->first('password') }}</label>
                                     @endif                                   
                               </div>
                                <div class="form-group">
                                <input type="password"  name="password_confirm" class="form-control" placeholder="Your Confirm Password" />    
                                     @if (@$errors->has('password_confirm'))
                                          <label class="error">{{ @$errors->first('password_confirm') }}</label>
                                     @endif                                   
                               </div>                        
                                <button type="submit" class="btn btn-inline">Send</button>
                            </form>                   
                    </div>   <!-- block Registered-->

                </div>
             </div>
        </div>             

            </div>
       <!-- end login  -->  
           @include('footer.footer')    
        </main>
    <!-- end MAIN -->    
    </div>      
</body>
</html>