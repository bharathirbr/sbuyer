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
                        <li class="active">Site Map</li>
                    </ol>
                    <div>{!!html_entity_decode(@$faqall[4]->head)!!}</div><br>
                </div>
                <!-- breadcrumb -->

                <!-- about page  start -->
                <!-- MAIN -->   



                <!-- end MAIN -->
                <!-- end about page  -->                                                       


                @include('footer.footer')    
            </main>
            <!-- end MAIN -->    
        </div>      
    </body>
</html>