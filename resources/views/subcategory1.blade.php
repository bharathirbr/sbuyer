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

 <!-- about page  start -->
    <!-- MAIN -->   
          
                       <div class="columns container">
                         <div class="row">
                            <!-- Sidebar -->
                            <div class="col-lg-3 col-md-3 col-sidebar">
                                <!-- Block  Breadcrumb-->
                        
                        <ol class="breadcrumb no-hide">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">{{ Request::segment(1) }}</a></li>                            
                            <li class="active">{{ Request::segment(2) }}</li>
                        </ol>
                       <!-- Block  Breadcrumb-->

                        <!-- block filter products -->
                        <div id="layered-filter-block" class="block-sidebar block-filter no-hide">
                            <div class="close-filter-products"><i class="fa fa-times" aria-hidden="true"></i></div>
                            <div class="block-title">
                                <strong>SHOP BY</strong>
                            </div>
                            <div class="block-content">


                         <!--       @if($subcategories_page->count() > 0)
                              <div class="filter-options-item filter-options-categori">
                                    <div class="filter-options-title">Categories</div>
                                    <div class="filter-options-content">
                                    @foreach($subcategories_page as $allgate)                                   
                                        <ol class="items">
                                            <li class="item ">
                                                <a href="{{ url('/'.$allgate->category->category_link.'/'.$allgate->link) }}"><label>
                                                    <span>{{ @$allgate->subcategory}}</span>
                                                </label></a>
                                            </li>                                           
                                        </ol>
                                    @endforeach
                                    </div>
                                </div>
                              
                                @endif -->


                                <!-- Filter Item  categori-->

                                <!-- filter price -->
                                <div class="filter-options-item filter-options-price">
                                    <div class="filter-options-title">Price</div>
                                    <div class="filter-options-content">
                                        <div class="slider-range">
                                            <div class="action">
                                                <span class="price">
                                                    <span id="amount-left"></span>
                                                    <span id="amount-right"></span>
                                                </span>

                                                <button type="button" class="btn default"><span>Search</span></button>
                                            </div>
                                            <div id="slider-range" ></div>
                                            <span class="amount-min">$3</span>
                                            <span class="amount-max">$6789</span>
                                        </div>
                                    </div>
                                </div><!-- filter price -->

                                <!-- filter Manufacture-->
                                <div class="filter-options-item filter-options-manufacture">
                                    <div class="filter-options-title">Manufacture</div>
                                    <div class="filter-options-content">
                                        <ol class="items">
                                            <li class="item ">
                                                <label>
                                                    <input type="checkbox"><span>Ercol  </span>
                                                </label>
                                            </li>
                                            <li class="item ">
                                                <label>
                                                    <input type="checkbox"><span>Duresta</span>
                                                </label>
                                            </li>
                                            <li class="item ">
                                                <label>
                                                    <input type="checkbox"><span>G Plan</span>
                                                </label>
                                            </li>
                                            <li class="item ">
                                                <label>
                                                    <input type="checkbox"><span>Parker Knoll</span>
                                                </label>
                                            </li>
                                            <li class="item ">
                                                <label>
                                                    <input type="checkbox"><span>Collins & Hayes</span>
                                                </label>
                                            </li>

                                        </ol>
                                    </div>
                                </div><!-- Filter Item -->

                                <!-- filter color-->
                              <!--   <div class="filter-options-item filter-options-color">
                                    <div class="filter-options-title">COLOR</div>
                                    <div class="filter-options-content">
                                        <ol class="items">
                                            <li class="item">
                                                <label>
                                                    <input type="checkbox">
                                                    <span>
                                                        <span class="img" style="background-color: #fca53c;"></span>          
                                                        <span class="count">(30)</span>
                                                    </span>
                                                    
                                                </label>
                                            </li>
                                            <li class="item">
                                                <label>
                                                    <input type="checkbox">
                                                    <span>
                                                        <span class="img" style="background-color: #6b5a5c;"></span>          
                                                        <span class="count">(20)</span>
                                                    </span>
                                                    
                                                </label>
                                            </li>
                                            <li class="item">
                                                <label>
                                                    <input type="checkbox">
                                                    <span>
                                                        <span class="img" style="background-color: #000000;"></span>          
                                                        <span class="count">(20)</span>
                                                    </span>
                                                    
                                                </label>
                                            </li>
                                            <li class="item">
                                                <label>
                                                    <input type="checkbox">
                                                    <span>
                                                        <span class="img" style="background-color: #3063f2;"></span>          
                                                        <span class="count">(20)</span>
                                                    </span>
                                                    
                                                </label>
                                            </li>
                                            <li class="item">
                                                <label>
                                                    <input type="checkbox">
                                                    <span>
                                                        <span class="text" >CYal</span>          
                                                        <span class="count">(20)</span>
                                                    </span>
                                                    
                                                </label>
                                            </li>
                                            <li class="item">
                                                <label>
                                                    <input type="checkbox">
                                                    <span>
                                                        <span class="img" style="background-color: #f9334a;"></span>          
                                                        <span class="count">(20)</span>
                                                    </span>
                                                    
                                                </label>
                                            </li>
                                           
                                           
                                        </ol>
                                    </div>
                                </div> -->
                                <!-- Filter Item -->

                            </div>
                        </div><!-- Filter -->

                        <!-- Block  Compare-->
                        <div class="block-sidebar block-sidebar-compare">
                            <div class="block-title">
                                <strong>compare products</strong>
                            </div>
                            <div class="block-content">
                                You have no product to compare
                            </div>
                        </div><!-- Block  Compare-->

                        <!-- Block  bestseller products-->
                        <div class="block-sidebar block-sidebar-products">
                            <div class="block-title">
                                <strong>bestseller products</strong>
                            </div>
                            <div class="block-content">
                                <div class="product-item">
                                    <div class="product-item-info">
                                        <div class="product-item-photo">
                                            <a href="" class="product-item-img">                                               
                                                {!! HTML::image('public/images/media/index1/wheet2.jpg', 'product name', array('class' => 'product name')) !!}
                                            </a>
                                        </div>
                                        <div class="product-item-detail">
                                            <strong class="product-item-name"><a href="">Washing Machine Pro</a></strong>
                                            <div class="product-item-price">
                                                <span class="price">$45.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-item">
                                    <div class="product-item-info">
                                        <div class="product-item-photo">
                                            <a href="" class="product-item-img">                                              
                                                {!! HTML::image('public/images/media/index1/papad1.jpg', 'product name', array('class' => 'product name')) !!}
                                            </a>
                                        </div>
                                        <div class="product-item-detail">
                                            <strong class="product-item-name"><a href="">Washing Machine Pro</a></strong>
                                            <div class="product-item-price">
                                                <span class="price">$45.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-item">
                                    <div class="product-item-info">
                                        <div class="product-item-photo">
                                            <a href="" class="product-item-img">                                                
                                                {!! HTML::image('public/images/media/index1/dal1.jpg', 'product name', array('class' => 'product name')) !!}
                                            </a>
                                        </div>
                                        <div class="product-item-detail">
                                            <strong class="product-item-name"><a href="">Washing Machine Pro </a></strong>
                                            <div class="product-item-price">
                                                <span class="price">$45.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- Block  bestseller products-->

                        <!-- Block  tags-->
                        <!-- <div class="block-sidebar block-sidebar-tags">
                            <div class="block-title">
                                <strong>product tags</strong>
                            </div>
                            <div class="block-content">
                                <ul>
                                    <li><a href="">Top</a></li>
                                    <li><a href="">Fashion</a></li>
                                    <li><a href="">Collection Men</a></li>
                                    <li><a href="">Collection Women</a></li>
                                    <li><a href="">Gallery</a></li>
                                    <li><a href="">New</a></li>
                                    <li><a href="">Top</a></li>
                                    <li><a href="">Fashion</a></li>
                                    <li></li>
                                </ul>
                                <a href="" class="view-all">View all tags <i class="fa fa-caret-right" aria-hidden="true"></i></a>
                            </div>
                        </div> --><!-- Block  tags-->

                    </div><!-- Sidebar -->

                    <!-- Main Content -->
                    <div class="col-lg-9 col-md-9  col-main">

                        <!-- images categori -->
                        <div class="category-view">
                            <div class="category-image">
                        {!! HTML::image('public/images/media/index1/category-images.jpg','category-image',array('class'=>'')) !!}                                
                            </div>
                        </div><!-- images categori -->

                        <!-- Toolbar -->
                    @foreach ($subcategories_page as $object)                              
                      @if($object->product->count() != 0)  
                        <div class=" toolbar-products toolbar-top">

                            <div class="btn-filter-products">
                                <span>Filter</span>
                            </div>
                            <div class="modes">
                                <strong  class="label">View as:</strong>
                                <strong  class="modes-mode active mode-grid" title="Grid">
                                    <span>grid</span>
                                </strong>
                                <a  href="{!! url('/'.Request::segment(1).'/'.Request::segment(2)) !!}" title="List" class="modes-mode mode-list">
                                    <span>list</span>
                                </a>
                            </div><!-- View as -->
                           
                            <div class="toolbar-option">

                                <form action="{{ url('/'.Request::segment(1).'/'.Request::segment(2)) }}" method="post">
                                     {{ csrf_field() }}
                                <div class="toolbar-sorter ">
                                    <label    class="label">Short by:</label> 
                                    <select class="sorter-options form-control"  name="shot_by" onchange="this.form.submit()">
                                        <option  value="position" @if(@$selected == 'position')  selected="selected"  @endif >Position</option>
                                        <option value="name" @if(@$selected == 'name')  selected="selected"  @endif>Name</option>
                                        <option value="price" @if(@$selected == 'price')  selected="selected"  @endif >Price</option>
                                    </select>
                                </div><!-- Short by -->                      

                                <div class="toolbar-limiter">
                                    <label   class="label">
                                        <span>Show:</span>
                                    </label>
                                   
                                    <select class="limiter-options form-control" name="show_limit" onchange="this.form.submit()">
                                        <option @if(@$show_limits == '9')  selected="selected"  @endif value="9">9</option>
                                        <option @if(@$show_limits == '16')  selected="selected"  @endif value="16">16</option>
                                        <option @if(@$show_limits == '32')  selected="selected"  @endif value="32">32</option>
                                    </select>
                                    
                                </div><!-- Show per page -->
                            </form>

                            </div>

                            <ul class="pagination">
                              
                            </ul>

                        </div><!-- Toolbar -->

                        @if(@$subcategories_page->count() > 0)
                    
                        <!-- List Products -->
                        <div class="products  products-grid">
                            <ol class="product-items row">

                                 
                                @foreach ($subcategories_page as $object)  
                                 @foreach ($object->product as $objects)
                                <li class="col-sm-4 product-item product-item-opt-0">
                                    <div class="product-item-info">
                                        <div class="product-item-photo">
                                            <a href="{!! url('/'.$objects->link) !!}" class="product-item-img">
                                        <img src="{!! url('public/images/product/'.$objects->image) !!}" alt="" >   
                                        </a>
                                        </div>
                                        <div class="product-item-detail">
                                            <strong class="product-item-name"><a href="{!!url('/'.$object->category->category_link.'/'.$object->link.'/'.$objects->title.'/'.$objects->id) !!}">
                                                
                                                        {{ $objects->name}}
                                                        </a></strong>
                                            <a href="{!! url('/'.$objects->link) !!}"><div class="product-item-price">
                                                <span class="price">₹{{ @$objects->rate }}</span>
                                            </div></a>
                                            <div class="product-item-actions">
                                                <a href="{{url('addItem/'.$objects->id)}}"><button class="btn btn-cart" type="button"><span>Add to Cart</span></button></a>
                                                <a href="{{ url('wishlist/'.$objects->id) }}" class="btn btn-wishlist"><span>wishlist</span></a>
                                                <!-- <a href="" class="btn btn-compare"><span>compare</span></a> -->                     
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                 @endforeach                                                                     
                                @endforeach
                               
                                
                            </ol><!-- list product -->
                        </div> <!-- List Products -->
                        
                        @endif
                        <!-- Toolbar -->
                        <div class=" toolbar-products toolbar-bottom">

                            <div class="modes">
                                <strong  class="label">View as:</strong>
                                <strong  class="modes-mode active mode-grid" title="Grid">
                                    <span>grid</span>
                                </strong>
                                <a  href="{!! url('/'.Request::segment(1).'/'.Request::segment(2)) !!}" title="List" class="modes-mode mode-list">
                                    <span>list</span>
                                </a>
                            </div><!-- View as -->
                           
                            <div class="toolbar-option">

                                <form action="{{ url('/'.Request::segment(1).'/'.Request::segment(2)) }}" method="post">
                                     {{ csrf_field() }}
                                <div class="toolbar-sorter ">
                                    <label    class="label">Short by:</label> 
                                    <select class="sorter-options form-control"  name="shot_by" onchange="this.form.submit()">
                                        <option  value="position" @if(@$selected == 'position')  selected="selected"  @endif >Position</option>
                                        <option value="name" @if(@$selected == 'name')  selected="selected"  @endif>Name</option>
                                        <option value="price" @if(@$selected == 'price')  selected="selected"  @endif >Price</option>
                                    </select>
                                </div><!-- Short by -->                      

                                <div class="toolbar-limiter">
                                    <label   class="label">
                                        <span>Show:</span>
                                    </label>
                                   
                                    <select class="limiter-options form-control" name="show_limit" onchange="this.form.submit()">
                                        <option @if(@$show_limits == '9')  selected="selected"  @endif value="9">9</option>
                                        <option @if(@$show_limits == '16')  selected="selected"  @endif value="16">16</option>
                                        <option @if(@$show_limits == '32')  selected="selected"  @endif value="32">32</option>
                                    </select>
                                    
                                </div><!-- Show per page -->
                            </form>

                            </div>

                            <ul class="pagination">                              
                               
                            </ul>

                        </div><!-- Toolbar -->
                        
                        @else
                           <div class="text-center col-md-12"  style="margin-top: 30px;">No Product Here</div>
                        @endif
                        @endforeach

                    </div><!-- Main Content -->                    
                </div>
            </div>



  <!-- end MAIN -->
 <!-- end about page  -->                                                       

        
           @include('footer.footer')    
        </main>
    <!-- end MAIN -->    
    </div>      
</body>
</html>