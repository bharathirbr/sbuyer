<!doctype html>
<html>
<head>
    @include('header.head')
</head>
<body class="cms-index-index index-opt-1 static_page">
    <div class="wrapper">
                @include('header.header')
        <!-- MAIN -->
        <main class="site-main"> 
            <div class="container breadcrumb-page">
                <ol class="breadcrumb">
                    <li><a href="#">Home </a></li>
                    <li class="active">404</li>
                </ol>
            </div>
           <div class="container">              
                <div class="row">
                    <div class="col-md-12 ">                       

                              <img src=" {{url('public/images/404/404-image.png')}} " width="100%" style="margin-top: 30px; margin-bottom: 80px;">

                    </div>                   
                </div>  
            </div>       
           @include('footer.footer')    
        </main>
    <!-- end MAIN -->    
    </div>      
</body>
</html>