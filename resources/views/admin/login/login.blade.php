
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>Metronic Admin Theme #2 | User Login 1</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Preview page of Metronic Admin Theme #2 for " name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        
        <link href="{{URL::asset('public/assets/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{URL::asset('public/assets/global/plugins/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css" />
        
        <link href="{{URL::asset('public/assets/global/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        
        <link href="{{URL::asset('public/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')}}" rel="stylesheet" type="text/css" />
       
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="{{URL::asset('public/assets/global/plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
        
        <link href="{{URL::asset('public/assets/global/plugins/select2/css/select2-bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
   
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="{{URL::asset('public/assets/global/css/components.min.css')}}" rel="stylesheet" type="text/css" />
        
        <link href="{{URL::asset('public/assets/global/css/plugins.min.css')}}" rel="stylesheet" type="text/css" />
        
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="{{URL::asset('public/assets/pages/css/login.min.css')}}" rel="stylesheet" type="text/css" />
      
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <!-- END THEME LAYOUT STYLES -->
       <link rel="shortcut icon" href="{{{ asset('public/images/favicon/favicon-96x96.png') }}}"> </head>
    <!-- END HEAD -->

    <body class=" login">
        <!-- BEGIN LOGO -->
        <div class="logo">
            <a href="{{url('')}}">
                
                <img src="{{URL::asset('public/images/media/index1/logo.png')}}" alt="" /> </a>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN LOGIN -->
         
        <div class="content">          
            <!-- BEGIN REGISTRATION FORM -->

         {!!Form::open(['url' => 'admin/loginprocess', 'method' => 'post','class'=>'admin_login_form','name'=>'admin_login_form'])!!}
            {!!Form::token()!!}
                <h3 class="form-title font-green">Sign In</h3>
               <!--  <div class="alert alert-danger display-hide">
                    <button class="close" data-close="alert"></button>
                    <span> Enter Username and Password. </span>
                </div> -->
                <div class="form-group">
                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                    <label class="control-label visible-ie8 visible-ie9">Username</label>
                    {{ Form::text('username', '', array('class' => 'form-control form-control-solid placeholder-no-fix','placeholder'=>'Username')) }}                    
                        @if (@$errors->has('username'))
                            <label class="error">{{ @$errors->first('username') }}</label>
                        @endif
                        @if (Session::has('login_failed_username'))                                 
                                    <label class="error"> {{ Session::get('login_failed_username') }} </label>                                 
                        @endif                 

                </div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Password</label>                    
                    {{ Form::password('password', array('id' => 'password','class' => 'form-control form-control-solid placeholder-no-fix','placeholder'=>'Password')) }}
                     @if (@$errors->has('password'))
                            <label class="error">{{ @$errors->first('password') }}</label>
                        @endif
                        @if (Session::has('login_failed_password'))                                 
                                    <label class="error"> {{ Session::get('login_failed_password') }} </label>                                 
                        @endif        
                 

                </div>
                <div class="form-actions">
                    {{ Form::submit('Login', array('class' => 'btn green uppercase')) }}

                </div>                

            {!!Form::close()!!}
     
            <!-- END REGISTRATION FORM -->
        </div>
        <div class="copyright"> {!! date('Y') !!} © Powered by Nbays IT SolusenZ. </div> 
       
        <!-- BEGIN CORE PLUGINS -->
       
        <script src="{{URL::asset('public/assets/global/plugins/jquery.min.js')}}" type="text/javascript"></script>
       <script src="{{URL::asset('public/assets/global/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
       
        <script src="{{URL::asset('public/assets/global/plugins/js.cookie.min.js')}}" type="text/javascript"></script>
        
        <script src="{{URL::asset('public/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
       
        <script src="{{URL::asset('public/assets/global/plugins/jquery.blockui.min.js')}}" type="text/javascript"></script>
        
        <script src="{{URL::asset('public/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}" type="text/javascript"></script>
       
        
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="{{URL::asset('public/assets/global/plugins/jquery-validation/js/jquery.validate.min.js')}}" type="text/javascript"></script>
       
        <script src="{{URL::asset('public/assets/global/plugins/jquery-validation/js/additional-methods.min.js')}}" type="text/javascript"></script>
        
        <script src="{{URL::asset('public/assets/global/plugins/select2/js/select2.full.min.js')}}" type="text/javascript"></script>
         <script src="{{ URL::asset('public/assets/pages/form-validation.js') }}" type="text/javascript"></script>
        
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="{{URL::asset('public/assets/global/scripts/app.min.js')}}" type="text/javascript"></script>
     
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="{{URL::asset('public/assets/pages/scripts/login.min.js')}}" type="text/javascript"></script>
        
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <!-- END THEME LAYOUT SCRIPTS -->
        <script>
            $(document).ready(function()
            {
                $('#clickmewow').click(function()
                {
                    $('#radio1003').attr('checked', 'checked');
                });
            })
        </script>
    </body>

</html>