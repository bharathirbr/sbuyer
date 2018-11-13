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
                        <li class="active">Faq's</li>
                    </ol>
                    <div id="block-contact-us" style="margin-bottom: 85px;margin-left: 85px">
                     @if (@$count == 0)
                        No FAQ'S Available
                        @else
                     @foreach(@$faqall as $faq )    
                         <ul class="faq">
                            <li class="q" class="col-md-12"><img src="{{URL::asset('public/assets/img/arrow.png')}}">{{@$faq->question}}</li>
                            <li class="a">{{strip_tags(@$faq->answer) }} </li>
                        </ul>            
                     @endforeach
                      @endif
                      </div>
                </div>               
                <!-- breadcrumb -->   
                @include('footer.footer')    
            </main>
            <!-- end MAIN -->    
        </div>      
    </body>
</html>