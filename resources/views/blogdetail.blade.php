<!DOCTYPE html>
<html lang="en">
<head>
		@include('header.head')

</head>


<body class="index-opt-1 cms-page cms-blog">

	<div class="wrapper">
 @include('header.header')
		<!-- HEADER -->
     

		<!-- MAIN -->
		<main class="site-main">

            <!-- breadcrumb -->
            <div class="container breadcrumb-page">
                <ol class="breadcrumb">
                    <li><a href="#">Home </a></li>
                    <li class="active">Blog</li>
                </ol>
            </div> <!-- breadcrumb -->


            <div class="container">

                <div class="row">

                    <!-- main -->
                    <div class="col-sm-8 col-sm-push-4 col-md-9 col-md-push-3">
                        <div class="post-detail">
                            <div class="post-item-info">
                                 @foreach($blog as $key => $value)
                                <div class="post-item-photo">
                                    
                                    <img src="{{ url('public/images/blog/'.$value->image) }}" alt="{!!$value->imagename!!}" width="800" height="600">
                                </div>
                                   
                                       <?php $date = \Carbon\Carbon::parse($value->created_at); ?> </br>                                          
                                           
                                       Created By {{@$value->author}} - {{ $date->day }}   {{ str_limit($date->format('F'), $limit = 3, $end = '') }}
                                  
                                <div class="post-item-detail">
                                    <strong class="post-item-name">
                                       {{$value->title}}
                                    </strong>
                                    <div class="post-item-des">
                                       <p> {!!html_entity_decode($value->content)!!}</p>
                                       
                                    </div>
                                </div>
                                  @endforeach
                            </div>
                        </div>
                    </div><!-- main -->

                    <!-- sidebar -->
                    <div class="col-sm-4 col-sm-pull-8 col-md-3 col-md-pull-9">
                        <div class="sidebar-blog">

                            <div class="block block-categori-blog">
                                <div class="block-title">
                                    Categories
                                </div>
                                <div class="block-content">
                                    @foreach($faqall as $key => $value)
                                    <ul>
                                        <li><a href=" {{ url('/blog/'.$value->link)}} ">{!!$value->title!!}<span class="count">({!! $value->category_count($value->id) !!})</span></a></li>
                                        
                                    </ul>
                                    @endforeach
                                </div>
                            </div>

                           

                        </div>
                    </div><!-- sidebar -->
               </div>
            </div>


		 @include('footer.footer')    
        </main>
    <!-- end MAIN -->    
    </div>      
</body>
</html>