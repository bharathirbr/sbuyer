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
                        <li class="active">Terms & conditions</li>
                    </ol>
                    <div>TERMS AND CONDITIONS</div>
                    <div>{!!html_entity_decode(@$fa)!!}</div>
                </div>
                <!-- breadcrumb -->

                                                                


                @include('footer.footer')    
            </main>
            <!-- end MAIN -->    
        </div>      
    </body>
</html>