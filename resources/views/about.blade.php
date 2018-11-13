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

             <!-- breadcrumb -->
            <div class="container breadcrumb-page">
                <ol class="breadcrumb">
                    <li><a href="#">Home </a></li>
                    <li class="active">{{ @Request::segment(1) }} </li>
                </ol>
            </div>
             <!-- breadcrumb -->

 <!-- about page  start -->
    <!-- MAIN -->   
          
                             <div class="container">
              
                <div class="row">
                    <div class="col-md-12 ">
                        <div class="block-about-us">
                            <div class="block-title">
                                 {{ @$static_page[0]->title }}
                            </div>
                            <div class="block-content row">
                                <!-- <div class="col-md-5 ">
                                    <div class="img">
                                        <img src="images/media/index1/about.jpg" alt="about">
                                    </div>
                                </div> -->

                                <div class="col-md-12 text  ">
                                    {!! @$static_page[0]->contents !!}
                                </div>

                            </div>
                        </div>
                    </div>
                   <!--  <div class="col-sm-3">
                        <div class="block-why-choos-us">
                            <div class="block-title">
                                Why Choose Us
                            </div>
                            <div class="block-content">
                                <ul>
                                    <li>
                                        <span>Shipping & Returns  </span>
                                    </li>
                                    <li><span>Secure Shopping </span></li>
                                    <li><span>International Shipping</span></li>
                                    <li><span>Affiliates</span></li>
                                    <li><span>Group Sales</span></li>
                                </ul>
                            </div>
                        </div>
                    </div> -->
                </div>
                                 
            </div>

<!--                        <div class="container">
                <div class="block-our-member">
                    <div class="block-title">
                        <span class="title">OUR MEMBER</span>
                        <p> Consectetur adipiscing elit. Donec pellentesque venenatis elits malesuada vel. Donec vitae libero dolor, eget dapibus justo. Aenean facilisis aliquet feugiat. Suspendisse lacinia congue est ac semper. Nulla ut elit magna, vitae volutpat magna.</p>
                    </div>
                    <div class="block-content">
                        <div class="owl-carousel " 
                            data-nav="false" 
                            data-dots="true" 
                            data-margin="30" 
                            data-responsive='{
                            "0":{"items":1},
                            "480":{"items":2},
                            "600":{"items":3},
                            "992":{"items":4}
                        }'>
                            <div class="item">
                                <div class="item-photo">
                                   {!! HTML::image('public/images/media/index1/member1.jpg', 'img', array('class' => '')) !!}
                                </div>
                                <span class="name">Micheal Jack </span>
                                <span class="team">Mannager</span>
                                <p class="des">Pellentesque semper congue sodales. In cons quat, metus eget co</p>
                            </div>
                            <div class="item">
                                <div class="item-photo">
                                    {!! HTML::image('public/images/media/index1/member2.jpg', 'img', array('class' => '')) !!}                                   
                                </div>
                                <span class="name">Henrry Ford   </span>
                                <span class="team">Art Director</span>
                                <p class="des">Pellentesque semper congue sodales. In cons quat, metus eget co</p>
                            </div>
                            <div class="item">
                                <div class="item-photo">
                                    {!! HTML::image('public/images/media/index1/member3.jpg', 'img', array('class' => '')) !!}                                    
                                </div>
                                <span class="name">Anna Simson </span>
                                <span class="team">Design Leader</span>
                                <p class="des">Pellentesque semper congue sodales. In cons quat, metus eget co</p>
                            </div>
                            <div class="item">
                                <div class="item-photo">
                                    {!! HTML::image('public/images/media/index1/member4.jpg', 'img', array('class' => '')) !!}                                   
                                </div>
                                <span class="name">Jennifer Thomson  </span>
                                <span class="team">Tech Leader </span>
                                <p class="des">Pellentesque semper congue sodales. In cons quat, metus eget co</p>
                            </div>
                            <div class="item">
                                <div class="item-photo">
                                    {!! HTML::image('public/images/media/index1/member4.jpg', 'img', array('class' => '')) !!}                                    
                                </div>
                                <span class="name">Micheal Jack </span>
                                <span class="team">Mannager</span>
                                <p class="des">Pellentesque semper congue sodales. In cons quat, metus eget co</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->



  <!-- end MAIN -->
 <!-- end about page  -->                                                       

        
           @include('footer.footer')    
        </main>
    <!-- end MAIN -->    
    </div>      
</body>
</html>