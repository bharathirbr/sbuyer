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
                        <li class="active">Returns & Refunds</li>
                    </ol>
                    <h1>Returns & Refunds</h1>
                    <div>{!!html_entity_decode(@$faqall[6]->head)!!}</div>
                </div>
                <!-- breadcrumb -->

                                                                


                @include('footer.footer')    
            </main>
            <!-- end MAIN -->    
        </div>      
    </body>
</html>