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
                    <li class="active">Forgetpassword</li>
                </ol>
            </div>
             <!-- breadcrumb -->

 <!-- login  start -->
            <div class="page-title-base container">
                <h1 class="title-base">Forgetpassword</h1>
            </div>

    <div class="container">

                
                <div class="block-form-login">
                    <!-- block Create an Account -->
                    <div class="block-form-create">
                        <div class="block-title">
                             Change Password
                        </div>                                                    
                        <div class="block-content">                          
                            <form name="forget_password_form" id="forget_password_form"  action="{!! url('forgetpasswordform'); !!}" method="post" class="myForm">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <input type="text"  name="email" class="form-control" placeholder="Your email" />                                    
                                     @if (@$errors->has('email'))
                                          <label class="error">{{ @$errors->first('email') }}</label>
                                     @endif                                   
                               </div>                               
                                <div class="checkbox">
                                   <!--  <label>
                                        <input type="checkbox"><span>Remember me!</span>
                                    </label> -->
                                </div>
                                <button type="submit" class="btn btn-inline">Send</button>
                            </form>
                        
                       

                        
                    </div>   <!-- block Registered-->

                </div>
             </div>
        </div>

                <!-- Already registered -->
                <div class="block-forgot-pass">
                    Already Registered? <a href="{!! url('login') !!}">Click Here</a>
                </div><!-- Already registered -->

            </div>

       <!-- end login  -->




                                                       

        
           @include('footer.footer')    
        </main>
    <!-- end MAIN -->    
    </div>      
</body>
</html>