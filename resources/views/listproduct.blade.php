<!doctype html>
<html>
<head>
    @include('header.head')
</head>
<body class="index-opt-1 catalog-category-view">
    <div class="wrapper">
                @include('header.header')
        <!-- MAIN -->
        <main class="site-main">             
                <!-- MAIN -->   
            <div class="columns container">
                <div class="row">

                    <!-- Sidebar -->
                    <div class="col-lg-3 col-md-3 col-sidebar">

                        <!-- Block  Breadcrumb-->
                        
                        <ol class="breadcrumb no-hide">
                            <li><a href="#">Home    </a></li>
                            <li class="active">Product</li>
                        </ol>
                       <!-- Block  Breadcrumb-->

                        <!-- block filter products -->
                        <div id="layered-filter-block" class="block-sidebar block-filter no-hide">
                            <div class="close-filter-products"><i class="fa fa-times" aria-hidden="true"></i></div>
                            <div class="block-title">
                                <strong>SHOP BY</strong>
                            </div>
                            <div class="block-content">

                               @if($allgategories->count() > 0)
                                <!-- Filter Item  categori-->

                                <div class="filter-options-item filter-options-categori">
                                    <div class="filter-options-title">Categories</div>
                                    <div class="filter-options-content">
                                   @foreach($allgategories as $allgate)
                                        <ol class="items">
                                            <li class="item ">
                                                <a href="{{ url('/'.$allgate->category_link)}}"><label>
                                                    <span>{{ @$allgate->category_name}}</span>
                                                </label></a>
                                            </li>                                           
                                        </ol>
                                    @endforeach

                                    </div>
                                </div>
                              
                                @endif

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
                                    <div class="filter-options-title">BRAND</div>
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
                                            <a href="{!! url('productdetails') !!}" class="product-item-img">                                                
                                                {!! HTML::image('public/images/media/index1/papad1.jpg', 'product name', array('class' => 'product-item-img')) !!}
                                            </a>
                                        </div>
                                        <div class="product-item-detail">
                                            <strong class="product-item-name"><a href="{!! url('productdetails') !!}">Washing Machine Pro</a></strong>
                                            <div class="product-item-price">
                                                <a href="{!! url('productdetails') !!}"><span class="price">$45.00</span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-item">
                                    <div class="product-item-info">
                                        <div class="product-item-photo">
                                            <a href="" class="product-item-img">                                                
                                                 {!! HTML::image('public/images/media/index1/Rice1.jpg', 'product name', array('class' => 'product-item-img')) !!}
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
                                            {!! HTML::image('public/images/media/index1/wheet2.jpg', 'product name', array('class' => 'product-item-img')) !!}                                       
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
                      <!--   <div class="block-sidebar block-sidebar-tags">
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
                        </div> -->
                        <!-- Block  tags-->

                    </div><!-- Sidebar -->

                    <!-- Main Content -->
                    <div class="col-lg-9 col-md-9  col-main">

                        <!-- images categori -->
                        <div class="category-view">
                            <div class="category-image">                                
                                {!! HTML::image('public/images/media/index1/category-images.jpg','category-images') !!}
                            </div>
                        </div><!-- images categori -->

                        <!-- Toolbar -->
                        <div class=" toolbar-products toolbar-top">

                            <div class="btn-filter-products">
                                <span>Filter</span>
                            </div>
                            <div class="modes">
                                <strong  class="label">View as:</strong>
                                <a  href="{!! url('allcategories')!!}" class="modes-mode  mode-grid" title="Grid">
                                    <span>grid</span>
                                </a>
                                <strong  title="List" class="active modes-mode mode-list">
                                    <span>list</span>
                                </strong>
                            </div><!-- View as -->
                           
                            <div class="toolbar-option">
                              <form action="{{url('allcategories/list')}}" method="post">
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
                                {{ $all_product->links() }}
                            </ul>

                        </div><!-- Toolbar -->
                    @if(@$all_product)
                        <!-- List Products -->
                        <div class="products  products-list">
                            <ol class="product-items row">                               
                                
                                @foreach(@$all_product as  $all_products)
                               
                                <li class="col-sm-12 product-item product-item-opt-0">
                                    <div class="product-item-info">
                                        <div class="product-item-photo">
                                            <a href="{!! url('/'.$all_products->category->category_link.'/'.$all_products->subcategory->link.'/'.$all_products->link.'/'.$all_products->id) !!}" class="product-item-img">                                               
                                                <img src="{{ url('public/images/product/'.$all_products->image) }} " alt="" >                                    
                                            </a>
                                        </div>
                                        <div class="product-item-detail">
                                            <strong class="product-item-name"><a href="{!! url('/'.$all_products->category->category_link.'/'.$all_products->subcategory->link.'/'.$all_products->link.'/'.$all_products->id) !!}">{{ @$all_products->name }}</a></strong>
                                            <div class="product-item-review">
                                                <a href="" class="action">Wrire Your Rivew</a>
                                            </div>
                                            <div class="product-item-price">
                                                <span class="price">${{ @$all_products->rate }}</span>
                                            </div>
                                            <div class="product-item-des">
                                                {{ strip_tags(@$all_products->description) }}
                                            </div>
                                            <div class="product-item-actions">
                                                <button class="btn btn-cart" type="button"><span>Add to Cart</span></button>
                                                <a href="" class="btn btn-wishlist"><span>wishlist</span></a>
                                                <!-- <a href="" class="btn btn-compare"><span>compare</span></a> -->
                                                
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                 @endforeach
                               
                            </ol><!-- list product -->
                        </div> <!-- List Products -->
                    @endif
                        <!-- Toolbar -->
                        <div class=" toolbar-products toolbar-bottom">

                            <div class="modes">
                                <strong  class="label">View as:</strong>
                                <a  href="{!! url('allcategories')!!}" class="modes-mode  mode-grid" title="Grid">
                                    <span>grid</span>
                                </a>
                                <strong  title="List" class="active modes-mode mode-list">
                                    <span>list</span>
                                </strong>
                            </div><!-- View as -->
                           
                            <div class="toolbar-option">
                            <form action="{{url('allcategories/list')}}" method="post">
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
                                {{ $all_product->links() }}
                            </ul>

                        </div><!-- Toolbar -->

                    </div><!-- Main Content -->
                    
                </div>
            </div>          

            
           @include('footer.footer')    
        </main>
    <!-- end MAIN -->    
    </div>      
</body>
</html>