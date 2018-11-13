<!DOCTYPE html>
<html lang="en">   
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
         <link href="https://datatables.yajrabox.com/css/datatables.bootstrap.css" rel="stylesheet">
        
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
                                <span>Banner</span>
                            </li>
                        </ul>
                        
                    </div>
                    <!-- END PAGE HEADER-->
                    <div class="row">
                        <div class="col-md-12">
                           
                            <!-- Begin: Demo Datatable 1 -->
                            <div class="portlet light portlet-fit portlet-datatable ">
                                <div class="portlet-title">
                                    <div class="btn-group btn-group-devided" data-toggle="buttons" style="font-size: 20px;">                             
                                        </div>
                                       <a href="{!! url('/admin/faq/add') !!}" class="nav-link ">
                                       <span class="title">Add New </span>
                                    </a>
                                </div>
                                <div class="portlet-body">
                                    <div class="table-container">
                                        
                                      
                                       <table id="faq_tables" class="table table-striped">
                                                <thead>
                                                     <th>                                               
                                                        <td>Question</td>             
                                                        <td>Answer</td>                                                          
                                                        <td>Status</td> 
                                                        <td>created_at</td>
                                                        <td>Action</td>            
                                                     </th>
                                                </thead>
                                              </table>      

                                    </div>
                                </div>
                            </div>
                          
                            <!-- End: Demo Datatable 2 -->
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
            <!-- END QUICK SIDEBAR -->
        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        @include('admin.footer.footer')
    </body>

</html>