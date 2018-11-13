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
       
         <link href="http://192.168.1.8/click2buy-newhtml/admin/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
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
       <link rel="shortcut icon" href="{{{ asset('public/images/favicon/favicon-96x96.png') }}}">
         <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    
</head>
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
                                <span>Masters</span>
                                <i class="fa fa-angle-right"></i>
                            </li>
                             <li>
                                <span>Product</span>                               
                            </li>                           
                        </ul>
                        
                    </div>
                    <div class="flash-message">
                              @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                                @if(Session::has($msg))
                                <p class="alert alert-{{ $msg }}">{{ Session::get($msg) }}</p>
                                @endif
                              @endforeach
                            </div>
                    <!-- END PAGE HEADER-->
                    <div class="row">
                        <div class="col-md-12">
                           
                            <!-- Begin: Demo Datatable 1 -->
                            <div class="portlet light portlet-fit portlet-datatable ">
                                <div class="portlet-title">
                                    <div class="btn-group btn-group-devided" data-toggle="buttons" style="font-size: 20px;">                           
                                        </div>
                                         <a href="{!! url('/admin/product/add') !!}" class="nav-link ">
                                              <span class="title">Add New</span>
                                         </a>
                                </div>
                                <div class="portlet-body">
                                    <div class="table-container">                                        
                                        <table id="product_table" class="table table-striped">
                                               <thead>
                                                     <th>                                                       
                                                         <td>Name</td>
                                                        <td>Image</td> 
                                                        <td>rate</td> 
                                                        <td>min_price</td>                                                                
                                                        <td>offer_price</td>                                                
                                                        <!-- <td>discount_price</td> -->                                                        
                                                        <td>category_id</td>                                                        
                                                        <td>subcategory_id</td>                                                        
                                                        <td>brand_id</td>                                                        
                                                        <td>featured_product</td>                                                        
                                                        <td>created_at</td>
                                                        <td>Action</td>            
                                                     </th>
                                                </thead>
                                          
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- End: Demo Datatable 1 -->                          
                        </div>
                    </div>
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
            <!-- BEGIN QUICK SIDEBAR -->
                    <a href="javascript:;" class="page-quick-sidebar-toggler">
                        <i class="icon-login"></i>
                    </a>              
                </div>
            </div>
            <!-- END QUICK SIDEBAR -->
        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        @include('admin.footer.footer')
    </body>

</html>