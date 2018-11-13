<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.7
Version: 4.7.5
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

     <head>
        <meta charset="utf-8" />
        <title>Metronic Admin Theme #2 | Admin Dashboard 2</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Preview page of Metronic Admin Theme #2 for statistics, charts, recent events and reports" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        
        <link href="{{URL::asset('public/assets/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
        
        
        <link href="{{URL::asset('public/assets/global/plugins/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css" />
        
        <link href="{{URL::asset('public/assets/global/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        
        <link href="{{URL::asset('public/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')}}" rel="stylesheet" type="text/css" />
       
        
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="{{URL::asset('public/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css')}}" rel="stylesheet" type="text/css" />
<!--        <link href="../assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />-->
        <link href="{{URL::asset('public/assets/global/plugins/morris/morris.css')}}" rel="stylesheet" type="text/css" />
<!--        <link href="../assets/global/plugins/morris/morris.css" rel="stylesheet" type="text/css" />-->
        <link href="{{URL::asset('public/assets/global/plugins/fullcalendar/fullcalendar.min.css')}}" rel="stylesheet" type="text/css" />
<!--        <link href="../assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />-->
        <link href="{{URL::asset('public/assets/global/plugins/jqvmap/jqvmap/jqvmap.css')}}" rel="stylesheet" type="text/css" />
<!--        <link href="../assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css" />-->
        <link href="{{URL::asset('public/assets/global/css/components.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
<!--        <link href="../assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />-->
        <link href="{{URL::asset('public/assets/global/css/plugins.min.css')}}" rel="stylesheet" type="text/css" />
<!--        <link href="../assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />-->
<!--        <link href="{{URL::asset('public/assets/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />-->
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="{{URL::asset('public/assets/layouts/layout2/css/layout.min.css')}}" rel="stylesheet" type="text/css" />
<!--        <link href="../assets/layouts/layout2/css/layout.min.css" rel="stylesheet" type="text/css" />-->
        <link href="{{URL::asset('public/assets/layouts/layout2/css/themes/blue.min.css')}}" rel="stylesheet" type="text/css" />
<!--        <link href="../assets/layouts/layout2/css/themes/blue.min.css" rel="stylesheet" type="text/css" id="style_color" />-->
        <link href="{{URL::asset('public/assets/layouts/layout2/css/custom.min.css')}}" rel="stylesheet" type="text/css" />
<!--        <link href="../assets/layouts/layout2/css/custom.min.css" rel="stylesheet" type="text/css" />-->
        <link href="{{URL::asset('public/assets/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="{{{ asset('public/images/favicon/favicon-96x96.png') }}}"> </head>
    <!-- END HEAD -->

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid">
        <!-- BEGIN HEADER -->
         @include('admin.header.header')
         
        <!-- END HEADER -->
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
       
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->
             @include('admin.sidebar.sidebar')
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
               
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->
                     
                    <!-- BEGIN THEME PANEL -->
                    
                    <!-- END THEME PANEL -->
                    
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <i class="icon-home"></i>
                                <a href="index.html">Home</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <span>Cms</span>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <span>Staticpage</span>
                                <i class="fa fa-angle-right"></i>
                            </li>
                             <li>
                                <span>Edit</span>                               
                            </li>
                        </ul>
                        
                    </div>
                    <!-- END PAGE HEADER-->
                    <div class="row">
                        <div class="col-md-6 ">                           
                            <!-- BEGIN SAMPLE FORM PORTLET-->
                            
                            <!-- END SAMPLE FORM PORTLET-->
                        </div>
                        <div class="col-md-12 ">
                            <!-- BEGIN SAMPLE FORM PORTLET-->
                            <div class="portlet-body form">
                            <div class="portlet light ">
                                <div class="portlet-title">                                   

                                </div>                      

                                    <div class="box-body">
                                <div class="portlet-body form">
                                    <form class="form-horizontal" role="form" method="post" action='{!! request::segment(5)!!}'>
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <div class="form-body">

                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Title</label>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" placeholder="Enter Title"  name="title" value="{{@$post->title}}">
                                                   
                                                </div>
                                                 
                                            </div>   
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Link</label>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" placeholder="Enter Link"  name="link" value="{{@$post->link}}">
                                                   
                                                </div>                                                 
                                            </div>   
                                                                               
                                         
                                            <div class="form-group last">
                                                <label class="control-label col-md-3">Content                               
                                                    
                                                </label>
                                                <div class="col-md-9">
                                                    <textarea class="ckeditor form-control" name="contents" rows="6" data-error-container="#editor2_error">{{@$post->contents}}</textarea>
                                                    <div id="editor2_error"> </div>
                                                </div>
                                            </div>

                                             <div class="form-group">
                                                <label class="col-md-3 control-label">Footer Tybe</label>
                                                <div class="col-md-6">                                                  
                                                 <select name="footer_type" placeholder="Enter Type">
                                                        <option value="1"  @if(@$post->footer_type == 1 ) selected @endif >Information</option>
                                                        <option value="2"  @if(@$post->footer_type == 2 ) selected @endif > Service</option> 
                                                </select>                                                   
                                                </div>
                                            </div>  

                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Meta Title</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" placeholder="Enter Meta Title"  name="metatitle" value="{{@$post->metatitle}}">
                                                   
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Meta Keywords</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" placeholder="Enter Meta Keyword"  name="metakeyword" value="{{@$post->metakeyword}}">
                                                   
                                                </div>
                                            </div>

                                           <div class="form-group last">
                                                <label class="control-label col-md-3">Meta Description                                            
                                                </label>
                                                <div class="col-md-9">
                                                    <textarea rows="3" cols="30" name="metadescription" id="metadescription" class="form-control" placeholder="Enter the Meta Description">{{@$post->metadescription}}</textarea>
                                                </div>
                                            </div>
                                            
                                            </div>
                                       
                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-9">
                                                    <button type="submit" class="btn green" style="float:right">Update</button>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                             
                                    </form>
                                </div>
                                        </div>
    
           
                            </div>
                                </div>
                            <!-- END SAMPLE FORM PORTLET-->
                            <!-- BEGIN SAMPLE FORM PORTLET-->                
                          
                            
                            
                        </div>
                    </div>

                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
            <!-- BEGIN QUICK SIDEBAR -->
            
        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        @include('admin.footer.footer')
    </body>

</html>