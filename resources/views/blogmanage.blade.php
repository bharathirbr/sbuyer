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
                    <li class="active">Blogs</li>
                </ol>
            </div> <!-- breadcrumb -->


            <div class="container">

                <div class="row">

                    <!-- main -->
                    <div class="col-sm-8 col-sm-push-4 col-md-9 col-md-push-3">
                        <div class="post-list">
                            <div class="row post-items">
                                <div class="col-sm-12 post-item">
                                     @foreach($blogcategories as $key => $value)
                                    <div class="post-item-info">
                                        <div class="post-item-photo">
                                           
                                            <a href="{{ url('/blog/'.$value->blog->link.'/'.$value->link)}}" ><img src="{{ url('public/images/blog/'.$value->image) }}" alt="{!!$value->imagename !!}" width="417" height="237"></a>
                                        </div>
                                        <div class="post-item-detail">
                                            
                                            <strong class="post-item-name">
                                                <a href="">{!!$value->title!!}</a>
                                            </strong>
                                            
                                            <div class="post-item-des">
                                               	{!!$value->shortcontent!!}
                                            </div> 
                                            <div class="post-item-actions">
                                                <a href="{{ url('/blog/'.$value->blog->link.'/'.$value->link)}}" class="btn">Read more </a>
                                            </div>
                                              
                                        </div>
                                    </div><br>
                                     @endforeach
                                </div>
                                
                               
                            </div>
                        </div>
                        <ul class="pagination">                           
                           {{ $blogcategories->links() }}
                        </ul>
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
                                        <li><a href="{{ url('/blog/'.$value->link)}}">{!!$value->title!!}<span class="count">({!! $value->category_count($value->id) !!})</span></a></li>
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