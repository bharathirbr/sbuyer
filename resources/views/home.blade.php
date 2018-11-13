<!doctype html>
<html>
<head>
    @include('header.head')
       <style type="">
        .home_product .item {
    float: left;
    width: 50%;
}
.home_product .product-item {
    margin-left: -1px;
    height: 191px !important;
}
    </style>
</head>
<body class="cms-index-index index-opt-1">
    <div class="wrapper">
                @include('header.header')
        <!-- MAIN -->
        <main class="site-main">
            <!--  Popup Newsletter-->
            <!-- <div class="modal fade" id="popup-newsletter" tabindex="-1" role="dialog" >
                <div class="modal-dialog" role="document">
                    <div class="modal-content" style="background-image: url(public/images/media/index1/Popup_Newsletter.jpg);">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <div class="block-newletter">
                            <div class="block-title">Newsletter</div>
                            <div class="block-content">
                                <p class="text-des">Sign up for our newsletter & <b>Get 25% </b> off first purchase!</p>
                                <form>
                                    <div class="input-group">
                                        <input type="text" placeholder="Your Email..." class="form-control">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-subcribe"><span>Subscribe</span></button>
                                        </span>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="block-social">
                            <div class="block-title">Get In Touch! </div>
                            <div class="block-content">
                                <a href=""><i aria-hidden="true" class="fa fa-facebook-square"></i></a>
                                <a href=""><i aria-hidden="true" class="fa fa-twitter"></i></a>
                                <a href=""><i aria-hidden="true" class="fa fa-youtube-play"></i></a>
                                <a href=""><i aria-hidden="true" class="fa fa-wifi"></i></a>
                                <a href=""><i aria-hidden="true" class="fa fa-pinterest-square"></i></a>
                                <a href=""><i aria-hidden="true" class="fa fa-skype"></i></a>
                            </div>
                        </div>

                        <div class="checkbox btn-checkbox">
                            <label>
                                <input type="checkbox"><span>Don’t show this popup again</span>
                            </label>
                        </div>
                        
                    </div>
                </div>
            </div> -->


            <!--  Popup Newsletter-->

            <!-- section top -->
            <div class="block-section-top block-section-top1"> 

                <!-- categories -->
                <div class="container">
                    <div class="block-nav-categori ">
                        <div class="block-title">
                            <span>Categories</span>
                        </div>
                        <div class="block-content">
                            <ul class="ui-categori">
                      @if(@$cat_menu_page->count() > 0)
                      <?php $i = 0; ?>
                          @foreach(@$cat_menu_page as $key=>$cat_menu)  
                          @if(++$i < 8)                        
                                <li class="parent">
                                    <a href="{{ url('/'.$cat_menu->category_link) }}">
                                        <span class="icon">                                           
                                          <img src="{{ url('public/images/category/icons/'.$cat_menu->image) }} " alt="" width="22" height="25">                                    
                                        </span>
                                        {{ @$cat_menu->category_name }}
                                    </a>
                                    <span class="toggle-submenu"></span>
                                    <div class="submenu">
                                        <div class="categori-img">
                                            <a href="">                                              
                                                 <img src="{{ url('public/images/category/'.$cat_menu->image) }} " alt="" width="850" height="132">
                                            </a>
                                        </div>
                                        <ul class="categori-list">
                                           @foreach ($cat_menu->subcategory as $object) 
                                              <li class="col-sm-3">                                      
                                                <h5>
                                                       <a href="{{ url('/'.$cat_menu->category_link.'/'.$object->link) }}">                                                 
                                                            {{ $object->subcategory }}
                                                        </a></h5>
                                                   <!--  <ul>
                                                    <li>
                                                        @foreach ($object->product as $objects)
                                                        <a href="{{ url('/'.$cat_menu->category_link.'/'.$object->link.'/'.$objects->link.'/'.$objects->id) }}">{{ $objects->name}} </a>
                                                        @endforeach
                                                   </li>                                                   
                                                 </ul>      -->                                 
                                               </li> 
                                           @endforeach   
                                         </ul>
                                    </div>
                                </li>
                        @endif
                     @endforeach
                @endif                            

                            <div class="view-all-categori">
                                <!-- <a  class="open-cate btn-view-all">All Categories</a> -->
                                <a href="{{url('allcategories')}}">All Categories</a>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <!-- categories -->
                

                
                <!-- block slide top -->
                <div class="block-slide-main slide-opt-1">
                    <div class="owl-carousel" 
                        data-nav="true" 
                        data-dots="false" 
                        data-margin="0" 
                        data-items='1' 
                        data-autoplayTimeout="700" 
                        data-autoplay="true" 
                        data-loop="true">
                        @if(@$banner)
                          @foreach(@$banner as $key => $value)
                        <div class="item item1" style="background-image:url({{url('public/images/banners/'.$value->image)}})">
                            <div class="container">
                                <div class="description">
                                    <span class="title">{{ $value->name }} </span>
                                    <span class="subtitle">{{ $value->title }}</span>
                                    <span class="des">{{ strip_tags($value->content) }}</span>
                                    <a href="{{ $value->link }} " class="btn">shop now</a>
                                </div>
                            </div>
                        </div>
                          @endforeach
                          @endif
                    </div>
                </div><!-- block slide top -->

            </div>
            <!-- section top -->
            <!-- Block deals of -->
            <div class="block-floor-products block-floor-products-opt3 block-floor-1" id="floor1-0">
            <div class="container ">
                  
                    <div class="block-title heading-opt-1">   
            <span class="title" style="background-color: #f44336;">
                          Latest Deals </span>
                         <div id="countdowntimer"><span id="future_date"><span></div>
                    </div>

                    <div class="block-content" style="padding-left: 0;">
                        <div class="block-deals-of block-deals-of-opt3" style="padding: 15px;">
                    <!--<div class="block-title ">
                        <span class="title"></span>
                        <div class="deals-of-countdown">
                            <span class="title">End In</span>
                            <div class="count-down-time" data-countdown="2016/8/27"></div>
                        </div>
                    </div>-->
                        <div class="owl-carousel" 
                            data-nav="true" 
                            data-dots="false" 
                            data-margin="30" 
                            data-responsive='{
                            "0":{"items":1},
                            "480":{"items":2},
                            "640":{"items":3},
                            "992":{"items":4},
                            "1200":{"items":5}
                            }'>                            
                           
                            <div class="product-item product-item-opt-1">
                                <div class="product-item-info">
                                    <div class="product-item-photo">
                                        <a class="product-item-img" href="{{ url ('allcategories') }}">                  
                                            {!! HTML::image('public/images/media/index1/dal3.jpg', 'product name', array('class' => '','max-width' =>'180', ' max-height'=>'210')) !!}
                                        </a>
                                    </div>
                                    <div class="product-item-detail">
                                        <strong class="product-item-name"><a href="{{ url ('allcategories') }}">Washing Machine Pro</a></strong>
                                        <div class="product-item-price">
                                            <span class="price">$150.00</span>
                                        </div>
                                        <div class="product-item-actions">
                                            <a class="btn btn-wishlist" href="{{ url ('allcategories') }}"><span>wishlist</span></a>
                                           <!--  <a class="btn btn-compare" href=""><span>compare</span></a> -->
                                          <a href="{{url('allcategories')}}"><button type="button" class="btn btn-cart"><span>Add to Cart</span></button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-item product-item-opt-1">
                                <div class="product-item-info">
                                    <div class="product-item-photo">
                                        <a class="product-item-img" href="{{ url ('allcategories') }}">                  
                                            {!! HTML::image('public/images/media/index1/dal3.jpg', 'product name', array('class' => '','max-width' =>'180', ' max-height'=>'210')) !!}
                                        </a>
                                    </div>
                                    <div class="product-item-detail">
                                        <strong class="product-item-name"><a href="{{ url ('allcategories') }}">Washing Machine Pro</a></strong>
                                        <div class="product-item-price">
                                            <span class="price">$150.00</span>
                                        </div>
                                        <div class="product-item-actions">
                                            <a class="btn btn-wishlist" href="{{ url ('allcategories') }}"><span>wishlist</span></a>
                                           <!--  <a class="btn btn-compare" href=""><span>compare</span></a> -->
                                          <a href="{{url('allcategories')}}"><button type="button" class="btn btn-cart"><span>Add to Cart</span></button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                             <div class="product-item product-item-opt-1">
                                <div class="product-item-info">
                                    <div class="product-item-photo">
                                        <a class="product-item-img" href="{{ url ('allcategories') }}">                  
                                            {!! HTML::image('public/images/media/index1/dal3.jpg', 'product name', array('class' => '','max-width' =>'180', ' max-height'=>'210')) !!}
                                        </a>
                                    </div>
                                    <div class="product-item-detail">
                                        <strong class="product-item-name"><a href="{{ url ('allcategories') }}">Washing Machine Pro</a></strong>
                                        <div class="product-item-price">
                                            <span class="price">$150.00</span>
                                        </div>
                                        <div class="product-item-actions">
                                            <a class="btn btn-wishlist" href="{{ url ('allcategories') }}"><span>wishlist</span></a>
                                           <!--  <a class="btn btn-compare" href=""><span>compare</span></a> -->
                                          <a href="{{url('allcategories')}}"><button type="button" class="btn btn-cart"><span>Add to Cart</span></button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-item product-item-opt-1">
                                <div class="product-item-info">
                                    <div class="product-item-photo">
                                        <a class="product-item-img" href="{{ url ('allcategories') }}">                  
                                            {!! HTML::image('public/images/media/index1/dal3.jpg', 'product name', array('class' => '','max-width' =>'180', ' max-height'=>'210')) !!}
                                        </a>
                                    </div>
                                    <div class="product-item-detail">
                                        <strong class="product-item-name"><a href="{{ url ('allcategories') }}">Washing Machine Pro</a></strong>
                                        <div class="product-item-price">
                                            <span class="price">$150.00</span>
                                        </div>
                                        <div class="product-item-actions">
                                            <a class="btn btn-wishlist" href="{{ url ('allcategories') }}"><span>wishlist</span></a>
                                           <!--  <a class="btn btn-compare" href=""><span>compare</span></a> -->
                                          <a href="{{url('allcategories')}}"><button type="button" class="btn btn-cart"><span>Add to Cart</span></button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-item product-item-opt-1">
                                <div class="product-item-info">
                                    <div class="product-item-photo">
                                        <a class="product-item-img" href="{{ url ('allcategories') }}">                  
                                            {!! HTML::image('public/images/media/index1/dal3.jpg', 'product name', array('class' => '','max-width' =>'180', ' max-height'=>'210')) !!}
                                        </a>
                                    </div>
                                    <div class="product-item-detail">
                                        <strong class="product-item-name"><a href="{{ url ('allcategories') }}">Washing Machine Pro</a></strong>
                                        <div class="product-item-price">
                                            <span class="price">$150.00</span>
                                        </div>
                                        <div class="product-item-actions">
                                            <a class="btn btn-wishlist" href="{{ url ('allcategories') }}"><span>wishlist</span></a>
                                           <!--  <a class="btn btn-compare" href=""><span>compare</span></a> -->
                                          <a href="{{url('allcategories')}}"><button type="button" class="btn btn-cart"><span>Add to Cart</span></button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                             <div class="product-item product-item-opt-1">
                                <div class="product-item-info">
                                    <div class="product-item-photo">
                                        <a class="product-item-img" href="{{ url ('allcategories') }}">                  
                                            {!! HTML::image('public/images/media/index1/dal3.jpg', 'product name', array('class' => '','max-width' =>'180', ' max-height'=>'210')) !!}
                                        </a>
                                    </div>
                                    <div class="product-item-detail">
                                        <strong class="product-item-name"><a href="{{ url ('allcategories') }}">Washing Machine Pro</a></strong>
                                        <div class="product-item-price">
                                            <span class="price">$150.00</span>
                                        </div>
                                        <div class="product-item-actions">
                                            <a class="btn btn-wishlist" href="{{ url ('allcategories') }}"><span>wishlist</span></a>
                                           <!--  <a class="btn btn-compare" href=""><span>compare</span></a> -->
                                          <a href="{{url('allcategories')}}"><button type="button" class="btn btn-cart"><span>Add to Cart</span></button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                             <div class="product-item product-item-opt-1">
                                <div class="product-item-info">
                                    <div class="product-item-photo">
                                        <a class="product-item-img" href="{{ url ('allcategories') }}">                  
                                            {!! HTML::image('public/images/media/index1/dal3.jpg', 'product name', array('class' => '','max-width' =>'180', ' max-height'=>'210')) !!}
                                        </a>
                                    </div>
                                    <div class="product-item-detail">
                                        <strong class="product-item-name"><a href="{{ url ('allcategories') }}">Washing Machine Pro</a></strong>
                                        <div class="product-item-price">
                                            <span class="price">$150.00</span>
                                        </div>
                                        <div class="product-item-actions">
                                            <a class="btn btn-wishlist" href="{{ url ('allcategories') }}"><span>wishlist</span></a>
                                           <!--  <a class="btn btn-compare" href=""><span>compare</span></a> -->
                                          <a href="{{url('allcategories')}}"><button type="button" class="btn btn-cart"><span>Add to Cart</span></button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                             <div class="product-item product-item-opt-1">
                                <div class="product-item-info">
                                    <div class="product-item-photo">
                                        <a class="product-item-img" href="{{ url ('allcategories') }}">                  
                                            {!! HTML::image('public/images/media/index1/dal3.jpg', 'product name', array('class' => '','max-width' =>'180', ' max-height'=>'210')) !!}
                                        </a>
                                    </div>
                                    <div class="product-item-detail">
                                        <strong class="product-item-name"><a href="{{ url ('allcategories') }}">Washing Machine Pro</a></strong>
                                        <div class="product-item-price">
                                            <span class="price">$150.00</span>
                                        </div>
                                        <div class="product-item-actions">
                                            <a class="btn btn-wishlist" href="{{ url ('allcategories') }}"><span>wishlist</span></a>
                                           <!--  <a class="btn btn-compare" href=""><span>compare</span></a> -->
                                          <a href="{{url('allcategories')}}"><button type="button" class="btn btn-cart"><span>Add to Cart</span></button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                             <div class="product-item product-item-opt-1">
                                <div class="product-item-info">
                                    <div class="product-item-photo">
                                        <a class="product-item-img" href="{{ url ('allcategories') }}">                  
                                            {!! HTML::image('public/images/media/index1/dal3.jpg', 'product name', array('class' => '','max-width' =>'180', ' max-height'=>'210')) !!}
                                        </a>
                                    </div>
                                    <div class="product-item-detail">
                                        <strong class="product-item-name"><a href="{{ url ('allcategories') }}">Washing Machine Pro</a></strong>
                                        <div class="product-item-price">
                                            <span class="price">$150.00</span>
                                        </div>
                                        <div class="product-item-actions">
                                            <a class="btn btn-wishlist" href="{{ url ('allcategories') }}"><span>wishlist</span></a>
                                           <!--  <a class="btn btn-compare" href=""><span>compare</span></a> -->
                                          <a href="{{url('allcategories')}}"><button type="button" class="btn btn-cart"><span>Add to Cart</span></button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>    
                                    
                    </div>
                </div>
            </div> <!-- Block deals of -->
        </div>





          @if(@$cat_menu_page->count() > 0)
          @foreach(@$cat_menu_page as $key=>$cat_menu)
          @if($key == 0)
            <!-- block -floor -products / floor : GROCERIES & STABLES-->
            <div class="block-floor-products block-floor-products-opt3 block-floor-1" id="floor1-1">
                <div class="container">
                    <div class="block-title heading-opt-1">   
            <span class="title" style="background-color: #f44336;">
                          {{ @$cat_menu->category_name }} </span>
                        <ul class="links">
                            <li role="presentation" class="active"><a href="#all1"  role="tab" data-toggle="tab">All Products</a></li>
                           <!--  <li role="presentation"><a href="#Bestseller1"  role="tab" data-toggle="tab">Bestseller</a></li>
                            <li role="presentation"><a href="#Most1"  role="tab" data-toggle="tab">Most reviews</a></li>
                            <li role="presentation"><a href="#Specials1"  role="tab" data-toggle="tab">Specials</a></li> -->
                        </ul>
                        <div class="actions">
                            <a href="" class="action action-up"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
                            <a href="#floor1-2" class="action action-down"><i class="fa fa-angle-down" aria-hidden="true"></i></a>
                        </div>
                    </div>

                    <div class="block-content">

                        <div class="col-categori">
                            <ul>

                                @foreach($cat_menu->subcategory as $object) 
                                <li><a href="{{ url('/'.$cat_menu->category_link.'/'.$object->link)}}">{{ $object->subcategory }}</a></li>
                                 @endforeach


                            </ul>
                        </div>

                    <div class="col-products home_product">
                          <?php  $count1 = 0 ?>                         
                          @foreach($cat_menu->subcategory as $object)                                 
                               @foreach ($object->product as $keyy=>$objects)         
                                            @if($count1 < 6 )
                                            @if($objects->featured_product == 0 )
                               <?php  $count1++ ;  ?>                                                
                                    <div class="item">                                       
                                        <div class=" product-item product-item-opt-1">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href="{{ url('/'.$cat_menu->category_link.'/'.$object->link.'/'.$objects->link.'/'.$objects->id) }}">                                              
                                                         <img src="{{url('public/images/product/'.$objects->image)}}" max-width="110" height="125">
                                                    </a>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="{{ url('/'.$cat_menu->category_link.'/'.$object->link.'/'.$objects->link.'/'.$objects->id) }} ">{{ $objects->name}}</a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">₹{{ $objects->rate}}</span>
                                                    </div>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href="{{ url('wishlist/'.$objects->id) }}"><span>wishlist</span></a>
                                                        <!-- <a class="btn btn-compare" href=""><span>compare</span></a> -->
                                                        <a href="{{ url('addItem/'.$objects->id)  }}"><button type="button" class="btn btn-cart"><span>Add to Cart</span></button></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>                                                                           
                                    </div>    
                                     @endif
                                     @endif
                                @endforeach
                         @endforeach 



                        <!--     <div class="box-tab   fade " id="Bestseller1" role="tabpanel">
                                <div class="owl-carousel" 
                                    data-nav="true" 
                                    data-dots="false" 
                                    data-margin="0" 
                                    data-responsive='{
                                    "0":{"items":1},
                                    "420":{"items":2},
                                    "600":{"items":2},
                                    "768":{"items":2},
                                    "992":{"items":2},
                                    "1200":{"items":2}
                                }'>

                                    <div class="item">
                                        <div class=" product-item product-item-opt-1">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href="">{!! HTML::image('public/images/noimage/sbuyer.jpg', '', array('class' => 'img')) !!}</a>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Sony Ultral Shap HD </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$45.00</span>
                                                    </div>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" product-item product-item-opt-1">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href="">{!! HTML::image('public/images/noimage/sbuyer.jpg', '', array('class' => 'img')) !!}</a>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Washing Machine Pro </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$45.00</span>
                                                    </div>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class=" product-item product-item-opt-1">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href="">{!! HTML::image('public/images/noimage/sbuyer.jpg', '', array('class' => 'img')) !!}</a>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Electronics Machine Pro </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$45.00</span>
                                                    </div>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-item product-item-opt-1">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href="">{!! HTML::image('public/images/noimage/sbuyer.jpg', '', array('class' => 'img')) !!}</a>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">SamSung HSD Television </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$45.00</span>
                                                    </div>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->

                          <!--   <div class="box-tab   fade " id="Most1" role="tabpanel">
                                <div class="owl-carousel" 
                                    data-nav="true" 
                                    data-dots="false" 
                                    data-margin="0" 
                                    data-responsive='{
                                    "0":{"items":1},
                                    "420":{"items":2},
                                    "600":{"items":2},
                                    "768":{"items":2},
                                    "992":{"items":2},
                                    "1200":{"items":2}
                                }'>

                                    <div class="item">
                                        <div class=" product-item product-item-opt-1">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href="">{!! HTML::image('public/images/noimage/sbuyer.jpg', '', array('class' => 'img')) !!}</a>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Sony Ultral Shap HD </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$45.00</span>
                                                    </div>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" product-item product-item-opt-1">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href="">{!! HTML::image('public/images/noimage/sbuyer.jpg', '', array('class' => 'img')) !!}</a>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Washing Machine Pro </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$45.00</span>
                                                    </div>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class=" product-item product-item-opt-1">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href="">{!! HTML::image('public/images/noimage/sbuyer.jpg', '', array('class' => 'img')) !!}</a>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Electronics Machine Pro </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$45.00</span>
                                                    </div>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-item product-item-opt-1">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href="">{!! HTML::image('public/images/noimage/sbuyer.jpg', '', array('class' => 'img')) !!}</a>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">SamSung HSD Television </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$45.00</span>
                                                    </div>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->


                         <!--    <div class="box-tab  fade " id="Specials1" role="tabpanel">
                                <div class="owl-carousel" 
                                    data-nav="true" 
                                    data-dots="false" 
                                    data-margin="0" 
                                    data-responsive='{
                                    "0":{"items":1},
                                    "420":{"items":2},
                                    "600":{"items":2},
                                    "768":{"items":2},
                                    "992":{"items":2},
                                    "1200":{"items":2}
                                }'>

                                    <div class="item">
                                        <div class=" product-item product-item-opt-1">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href="">{!! HTML::image('public/images/noimage/sbuyer.jpg', '', array('class' => 'img')) !!}</a>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Sony Ultral Shap HD </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$45.00</span>
                                                    </div>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" product-item product-item-opt-1">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href="">{!! HTML::image('public/images/noimage/sbuyer.jpg', '', array('class' => 'img')) !!}</a>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Washing Machine Pro </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$45.00</span>
                                                    </div>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class=" product-item product-item-opt-1">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href="">{!! HTML::image('public/images/noimage/sbuyer.jpg', '', array('class' => 'img')) !!}</a>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Electronics Machine Pro </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$45.00</span>
                                                    </div>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-item product-item-opt-1">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href="">{!! HTML::image('public/images/noimage/sbuyer.jpg', '', array('class' => 'img')) !!}</a>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">SamSung HSD Television </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$45.00</span>
                                                    </div>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div> -->


                        </div>

                         
                        <div class="col-featured">
                            <span class="label-featured">    

                                {!! HTML::image('public/images/icon/index1/label-featured.png', 'label-featured', array('class' => 'img')) !!}
                                
                            </span>
                            <div class="owl-carousel" 
                                data-nav="true" 
                                data-dots="false" 
                                data-margin="0" 
                                data-responsive='{
                                "0":{"items":1},
                                "380":{"items":2},
                                "480":{"items":2},
                                "600":{"items":1},
                                "992":{"items":1}
                                }'>

                                <div class="item">
                                    <?php  $count1 = 0 ?>                         
                                      @foreach($cat_menu->subcategory as $object)                                   
                                        @foreach ($object->product as $keyy=>$objects)  
                                          @if(@$objects->featured_product == 1 )
                                            @if($count1 < 3 )
                                                <?php  $count1++ ;  ?> 
                                    <div class="product-item product-item-opt-1">
                                        <div class="product-item-info">
                                            <div class="product-item-photo">
                                                <a class="product-item-img" href="{{ url('/'.$cat_menu->category_link.'/'.$object->link.'/'.$objects->link.'/'.$objects->id) }}">                                                    
                                                    <!-- {!! HTML::image('public/images/media/index1/Fetured1.jpg', 'label-featured', array('class' => 'img')) !!} -->
                                            <img src="{{url('public/images/product/'.$objects->image)}}" max-width="110" height="125">
                                                </a>
                                            </div>
                                            <div class="product-item-detail">
                                                <strong class="product-item-name"><a href="{{ url('/'.$cat_menu->category_link.'/'.$object->link.'/'.$objects->link.'/'.$objects->id) }}">{{ $objects->name }} </a></strong>
                                                <div class="product-item-price">
                                                    <span class="price">₹{{ $objects->rate }}</span>
                                                </div>
                                                <div class="product-item-actions">
                                                   <a class="btn btn-wishlist" href="{{ url('wishlist/'.$objects->id) }}"><span>wishlist</span></a>
                                                   <!--  <a class="btn btn-compare" href=""><span>compare</span></a> -->
                                                    <a href="{{ url('addItem/'.$objects->id)  }}"><button type="button" class="btn btn-cart"><span>Add to Cart</span></button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @endif
                                    @endforeach
                                    @endforeach


                                </div>

<!-- 
                                <div class="item">
                                    <div class="product-item product-item-opt-1">
                                        <div class="product-item-info">
                                            <div class="product-item-photo">
                                                <a class="product-item-img" href="">                                                   
                                                     {!! HTML::image('public/images/media/index1/Fetured1.jpg', 'label-featured', array('class' => 'product name')) !!}
                                                </a>
                                            </div>
                                            <div class="product-item-detail">
                                                <strong class="product-item-name"><a href="">Asus Ispiron 20</a></strong>
                                                <div class="product-item-price">
                                                    <span class="price">$45.00</span>
                                                </div>
                                                <div class="product-item-actions">
                                                    <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                    <a class="btn btn-compare" href=""><span>compare</span></a>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-item product-item-opt-1">
                                        <div class="product-item-info">
                                            <div class="product-item-photo">
                                                <a class="product-item-img" href="">                                                  
                                                     {!! HTML::image('public/images/media/index1/Fetured1.jpg', 'label-featured', array('class' => 'product name')) !!}
                                                </a>
                                            </div>
                                            <div class="product-item-detail">
                                                <strong class="product-item-name"><a href="">Electronics Ispiron 20 </a></strong>
                                                <div class="product-item-price">
                                                    <span class="price">$45.00</span>
                                                </div>
                                                <div class="product-item-actions">
                                                    <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                    <a class="btn btn-compare" href=""><span>compare</span></a>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-item product-item-opt-1">
                                        <div class="product-item-info">
                                            <div class="product-item-photo">
                                                <a class="product-item-img" href="">                                                    
                                                     {!! HTML::image('public/images/media/index1/Fetured1.jpg', 'label-featured', array('class' => 'product name')) !!}
                                                </a>
                                            </div>
                                            <div class="product-item-detail">
                                                <strong class="product-item-name"><a href="">Samsung Ispiron 20 </a></strong>
                                                <div class="product-item-price">
                                                    <span class="price">$45.00</span>
                                                </div>
                                                <div class="product-item-actions">
                                                    <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                    <a class="btn btn-compare" href=""><span>compare</span></a>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->


                            </div>
                        </div>


                   @if(@$side_banner->count() > 0)
                        <div class="col-banner">
                              @foreach(@$side_banner as $key=>$side_ban)
                                @if(@$key == 0)                        
                            <a href="" class="img">
                                 <img src="{{ url('public/images/sidebanner/'.$side_ban->image) }}"></a>                                
                            </a>                            
                            <div class="description">
                                <strong class="title"> {{ @$side_ban->name }}</strong>
                                <div class="des">{{ strip_tags(@$side_ban->content) }}</div>
                                <a href="{{ @$side_ban->link }}" class="btn btn-default">shop now</a>
                            </div>
                             @endif                            
                             
                             @endforeach
                        </div>
                     @endif

                        
                    </div>

                </div>
            </div>

            <!-- block -floor -products / floor : GROCERIES & STABLES-->
            
            @endif
            @endforeach
            @endif



<!-- 2 -->

            <!-- block -floor -products / floor :FRUITS-->
          @if(@$cat_menu_page->count() > 0)
          @foreach(@$cat_menu_page as $key=>$cat_menu)
          @if($key == 1)
            <!-- block -floor -products / floor : GROCERIES & STABLES-->
            <div class="block-floor-products block-floor-products-opt3 block-floor-1" id="floor1-2">
                <div class="container">
                    <div class="block-title heading-opt-1">   
            <span class="title" style="background-color: #f44336;">
                          {{ @$cat_menu->category_name }} </span>
                        <ul class="links">
                            <li role="presentation" class="active"><a href="#all2"  role="tab" data-toggle="tab">All Products</a></li>
                          <!--   <li role="presentation"><a href="#Bestseller2"  role="tab" data-toggle="tab">Bestseller</a></li>
                            <li role="presentation"><a href="#Most2"  role="tab" data-toggle="tab">Most reviews</a></li>
                            <li role="presentation"><a href="#Specials2"  role="tab" data-toggle="tab">Specials</a></li> -->
                        </ul>
                        <div class="actions">
                            <a href="#floor1-1" class="action action-up"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
                            <a href="#floor1-3" class="action action-down"><i class="fa fa-angle-down" aria-hidden="true"></i></a>
                        </div>
                    </div>

                    <div class="block-content">

                        <div class="col-categori">
                            <ul>
                                 @foreach($cat_menu->subcategory as $object) 
                                <li><a href="{{ url('/'.$cat_menu->category_link.'/'.$object->link)}}">{{ $object->subcategory }}</a></li>
                                 @endforeach
                            </ul>
                        </div>

                     <div class="col-products home_product">
                        <?php  $count1 = 0 ?>                         
                          @foreach($cat_menu->subcategory as $object)  
                                 
                               @foreach ($object->product as $keyy=>$objects)         
                                            @if($count1 < 6 )
                                            @if($objects->featured_product == 0 )
                               <?php  $count1++ ;  ?>                                                
                                    <div class="item">                                       
                                        <div class=" product-item product-item-opt-1">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href="{{ url('/'.$cat_menu->category_link.'/'.$object->link.'/'.$objects->link.'/'.$objects->id) }}">                                                       
                                                         <img src="{{url('public/images/product/'.$objects->image)}}" max-width="110" height="125">
                                                    </a>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="{{ url('/'.$cat_menu->category_link.'/'.$object->link.'/'.$objects->link.'/'.$objects->id) }}">{{ $objects->name}}</a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">₹{{ $objects->rate}}</span>
                                                    </div>
                                                    <div class="product-item-actions">
                                                       <a class="btn btn-wishlist" href="{{ url('wishlist/'.$objects->id) }}"><span>wishlist</span></a>
                                                        <!-- <a class="btn btn-compare" href=""><span>compare</span></a> -->
                                                        <a href="{{ url('addItem/'.$objects->id)  }}"><button type="button" class="btn btn-cart"><span>Add to Cart</span></button></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>                                                                           
                                    </div>    
                                     @endif
                                     @endif
                                @endforeach
                         @endforeach 



                           <!--  <div class="box-tab   fade " id="Bestseller2" role="tabpanel">
                                <div class="owl-carousel" 
                                    data-nav="true" 
                                    data-dots="false" 
                                    data-margin="0" 
                                    data-responsive='{
                                    "0":{"items":1},
                                    "420":{"items":2},
                                    "600":{"items":2},
                                    "768":{"items":2},
                                    "992":{"items":2},
                                    "1200":{"items":2}
                                }'>

                                    <div class="item">
                                        <div class=" product-item product-item-opt-1">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href="">{!! HTML::image('public/images/noimage/sbuyer.jpg', '', array('class' => 'img')) !!}</a>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Sony Ultral Shap HD </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$45.00</span>
                                                    </div>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" product-item product-item-opt-1">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href="">{!! HTML::image('public/images/noimage/sbuyer.jpg', '', array('class' => 'img')) !!}</a>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Washing Machine Pro </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$45.00</span>
                                                    </div>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class=" product-item product-item-opt-1">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href="">{!! HTML::image('public/images/noimage/sbuyer.jpg', '', array('class' => 'img')) !!}</a>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Electronics Machine Pro </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$45.00</span>
                                                    </div>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-item product-item-opt-1">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href="">{!! HTML::image('public/images/noimage/sbuyer.jpg', '', array('class' => 'img')) !!}</a>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">SamSung HSD Television </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$45.00</span>
                                                    </div>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->

                         <!--    <div class="box-tab   fade " id="Most2" role="tabpanel">
                                <div class="owl-carousel" 
                                    data-nav="true" 
                                    data-dots="false" 
                                    data-margin="0" 
                                    data-responsive='{
                                    "0":{"items":1},
                                    "420":{"items":2},
                                    "600":{"items":2},
                                    "768":{"items":2},
                                    "992":{"items":2},
                                    "1200":{"items":2}
                                }'>

                                    <div class="item">
                                        <div class=" product-item product-item-opt-1">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href="">{!! HTML::image('public/images/noimage/sbuyer.jpg', '', array('class' => 'img')) !!}</a>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Sony Ultral Shap HD </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$45.00</span>
                                                    </div>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" product-item product-item-opt-1">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href="">{!! HTML::image('public/images/noimage/sbuyer.jpg', '', array('class' => 'img')) !!}</a>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Washing Machine Pro </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$45.00</span>
                                                    </div>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class=" product-item product-item-opt-1">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href="">{!! HTML::image('public/images/noimage/sbuyer.jpg', '', array('class' => 'img')) !!}</a>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Electronics Machine Pro </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$45.00</span>
                                                    </div>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-item product-item-opt-1">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href="">{!! HTML::image('public/images/noimage/sbuyer.jpg', '', array('class' => 'img')) !!}</a>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">SamSung HSD Television </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$45.00</span>
                                                    </div>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->

                          <!--   <div class="box-tab  fade " id="Specials2" role="tabpanel">
                                <div class="owl-carousel" 
                                    data-nav="true" 
                                    data-dots="false" 
                                    data-margin="0" 
                                    data-responsive='{
                                    "0":{"items":1},
                                    "420":{"items":2},
                                    "600":{"items":2},
                                    "768":{"items":2},
                                    "992":{"items":2},
                                    "1200":{"items":2}
                                }'> -->
<!-- 
                                    <div class="item">
                                        <div class=" product-item product-item-opt-1">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href="">{!! HTML::image('public/images/noimage/sbuyer.jpg', '', array('class' => 'img')) !!}</a>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Sony Ultral Shap HD </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$45.00</span>
                                                    </div>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" product-item product-item-opt-1">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href="">{!! HTML::image('public/images/noimage/sbuyer.jpg', '', array('class' => 'img')) !!}</a>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Washing Machine Pro </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$45.00</span>
                                                    </div>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class=" product-item product-item-opt-1">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href="">{!! HTML::image('public/images/noimage/sbuyer.jpg', '', array('class' => 'img')) !!}</a>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Electronics Machine Pro </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$45.00</span>
                                                    </div>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-item product-item-opt-1">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href="">{!! HTML::image('public/images/noimage/sbuyer.jpg', '', array('class' => 'img')) !!}</a>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">SamSung HSD Television </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$45.00</span>
                                                    </div>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->

                        </div>


                     <div class="col-featured">
                            <span class="label-featured">
                              {!! HTML::image('public/images/icon/index1/label-featured.png', 'label-featured', array('class' => 'img')) !!}
                                
                            </span>
                            <div class="owl-carousel" 
                                data-nav="true" 
                                data-dots="false" 
                                data-margin="0" 
                                data-responsive='{
                                "0":{"items":1},
                                "380":{"items":2},
                                "480":{"items":2},
                                "600":{"items":1},
                                "992":{"items":1}
                                }'>
                              
                                <div class="item">
                                     <?php  $count1 = 0 ?>                         
                                      @foreach($cat_menu->subcategory as $object)                                   
                                        @foreach ($object->product as $keyy=>$objects)  
                                          @if(@$objects->featured_product == 1 )
                                            @if($count1 < 3 )
                                                <?php  $count1++ ;  ?> 
                                    <div class="product-item product-item-opt-1">
                                        <div class="product-item-info">
                                            <div class="product-item-photo">
                                                <a class="product-item-img" href="{{ url('/'.$cat_menu->category_link.'/'.$object->link.'/'.$objects->link.'/'.$objects->id) }}">                                                    
                                                    <!-- {!! HTML::image('public/images/media/index1/Fetured1.jpg', 'label-featured', array('class' => 'img')) !!} -->
                                            <img src="{{url('public/images/product/'.$objects->image)}}" max-width="110" height="125">
                                                </a>
                                            </div>
                                            <div class="product-item-detail">
                                                <strong class="product-item-name"><a href="{{ url('/'.$cat_menu->category_link.'/'.$object->link.'/'.$objects->link.'/'.$objects->id) }}">{{ $objects->name }} </a></strong>
                                                <div class="product-item-price">
                                                    <span class="price">₹{{ $objects->rate }}</span>
                                                </div>
                                                <div class="product-item-actions">
                                                    <a class="btn btn-wishlist" href="{{ url('wishlist/'.$objects->id) }}"><span>wishlist</span></a>
                                                    <!-- <a class="btn btn-compare" href=""><span>compare</span></a> -->
                                                    <a href="{{ url('addItem/'.$objects->id)  }}"><button type="button" class="btn btn-cart"><span>Add to Cart</span></button></a>
                                              </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @endif
                                    @endforeach
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        

                      @if(@$side_banner->count() > 0)
                        <div class="col-banner">
                              @foreach(@$side_banner as $key=>$side_ban)
                                @if(@$key == 1)                        
                            <a href="" class="img">
                                 <img src="{{ url('public/images/sidebanner/'.$side_ban->image) }}"></a>                                
                            </a>                            
                            <div class="description">
                                <strong class="title"> {{ @$side_ban->name }}</strong>
                                <div class="des">{{ strip_tags(@$side_ban->content) }}</div>
                                <a href="{{ @$side_ban->link }}" class="btn btn-default">shop now</a>
                            </div>
                             @endif                            
                             
                             @endforeach
                        </div>
                     @endif
                    </div>

                </div>
            </div>

            @endif
            @endforeach
            @endif

            <!-- block -floor -products / floor : FRUITS -->
<!-- 2 -->


<!-- 3 -->
            <!-- block -floor -products / floor :  VEGETABLES & GREENS-->
          @if(@$cat_menu_page->count() > 0)
          @foreach(@$cat_menu_page as $key=>$cat_menu)
          @if($key == 2)
            <!-- block -floor -products / floor : GROCERIES & STABLES-->
            <div class="block-floor-products block-floor-products-opt3 block-floor-1" id="floor1-3">
                <div class="container">
                    <div class="block-title heading-opt-1">   
            <span class="title" style="background-color: #f44336;">
                          {{ @$cat_menu->category_name }} </span>
                        <ul class="links">
                            <li role="presentation" class="active"><a href="#all3"  role="tab" data-toggle="tab">All Products</a></li>
                           <!--  <li role="presentation"><a href="#Bestseller3"  role="tab" data-toggle="tab">Bestseller</a></li>
                            <li role="presentation"><a href="#Most3"  role="tab" data-toggle="tab">Most reviews</a></li>
                            <li role="presentation"><a href="#Specials3"  role="tab" data-toggle="tab">Specials</a></li> -->
                        </ul>
                        <div class="actions">
                            <a href="#floor1-2" class="action action-up"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
                            <a href="#floor1-4" class="action action-down"><i class="fa fa-angle-down" aria-hidden="true"></i></a>
                        </div>
                    </div>

                    <div class="block-content">

                        <div class="col-categori">
                            <ul>
                                @foreach($cat_menu->subcategory as $object) 
                                <li><a href="{{ url('/'.$cat_menu->category_link.'/'.$object->link)}}">{{ $object->subcategory }}</a></li>
                                 @endforeach
                            </ul>
                        </div>

       <div class="col-products home_product">
                        <?php  $count1 = 0 ?>                         
                          @foreach($cat_menu->subcategory as $object)                                   
                               @foreach ($object->product as $keyy=>$objects)         
                                            @if($count1 < 6 )
                                            @if($objects->featured_product == 0 )
                               <?php  $count1++ ;  ?>                                                
                                    <div class="item">                                       
                                        <div class=" product-item product-item-opt-1">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href="{{ url('/'.$cat_menu->category_link.'/'.$object->link.'/'.$objects->link.'/'.$objects->id) }}">                                                       
                                                         <img src="{{url('public/images/product/'.$objects->image)}}" max-width="110" height="125">
                                                    </a>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="{{ url('/'.$cat_menu->category_link.'/'.$object->link.'/'.$objects->link.'/'.$objects->id) }}">{{ $objects->name}}</a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">₹{{ $objects->rate}}</span>
                                                    </div>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href="{{ url('wishlist/'.$objects->id) }}"><span>wishlist</span></a>
                                                       <!--  <a class="btn btn-compare" href=""><span>compare</span></a> -->
                                                         <a href="{{ url('addItem/'.$objects->id)  }}"><button type="button" class="btn btn-cart"><span>Add to Cart</span></button></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>                                                                           
                                    </div>    
                                     @endif
                                     @endif
                                @endforeach
                         @endforeach



                         <!--    <div class="box-tab   fade " id="Bestseller3" role="tabpanel">
                                <div class="owl-carousel" 
                                    data-nav="true" 
                                    data-dots="false" 
                                    data-margin="0" 
                                    data-responsive='{
                                    "0":{"items":1},
                                    "420":{"items":2},
                                    "600":{"items":2},
                                    "768":{"items":2},
                                    "992":{"items":2},
                                    "1200":{"items":2}
                                }'>

                                    <div class="item">
                                        <div class=" product-item product-item-opt-1">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href="">{!! HTML::image('public/images/noimage/sbuyer.jpg', '', array('class' => 'img')) !!}</a>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Sony Ultral Shap HD </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$45.00</span>
                                                    </div>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" product-item product-item-opt-1">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href="">{!! HTML::image('public/images/noimage/sbuyer.jpg', '', array('class' => 'img')) !!}</a>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Washing Machine Pro </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$45.00</span>
                                                    </div>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class=" product-item product-item-opt-1">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href="">{!! HTML::image('public/images/noimage/sbuyer.jpg', '', array('class' => 'img')) !!}</a>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Electronics Machine Pro </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$45.00</span>
                                                    </div>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-item product-item-opt-1">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href="">{!! HTML::image('public/images/noimage/sbuyer.jpg', '', array('class' => 'img')) !!}</a>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">SamSung HSD Television </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$45.00</span>
                                                    </div>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->

                          <!--   <div class="box-tab   fade " id="Most3" role="tabpanel">
                                <div class="owl-carousel" 
                                    data-nav="true" 
                                    data-dots="false" 
                                    data-margin="0" 
                                    data-responsive='{
                                    "0":{"items":1},
                                    "420":{"items":2},
                                    "600":{"items":2},
                                    "768":{"items":2},
                                    "992":{"items":2},
                                    "1200":{"items":2}
                                }'>

                                    <div class="item">
                                        <div class=" product-item product-item-opt-1">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href="">{!! HTML::image('public/images/noimage/sbuyer.jpg', '', array('class' => 'img')) !!}</a>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Sony Ultral Shap HD </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$45.00</span>
                                                    </div>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" product-item product-item-opt-1">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href="">{!! HTML::image('public/images/noimage/sbuyer.jpg', '', array('class' => 'img')) !!}</a>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Washing Machine Pro </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$45.00</span>
                                                    </div>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class=" product-item product-item-opt-1">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href="">{!! HTML::image('public/images/noimage/sbuyer.jpg', '', array('class' => 'img')) !!}</a>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Electronics Machine Pro </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$45.00</span>
                                                    </div>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-item product-item-opt-1">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href="">{!! HTML::image('public/images/noimage/sbuyer.jpg', '', array('class' => 'img')) !!}</a>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">SamSung HSD Television </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$45.00</span>
                                                    </div>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>  -->

                        <!--      <div class="box-tab  fade " id="Specials3" role="tabpanel">
                                <div class="owl-carousel" 
                                    data-nav="true" 
                                    data-dots="false" 
                                    data-margin="0" 
                                    data-responsive='{
                                    "0":{"items":1},
                                    "420":{"items":2},
                                    "600":{"items":2},
                                    "768":{"items":2},
                                    "992":{"items":2},
                                    "1200":{"items":2}
                                }'>

                                    <div class="item">
                                        <div class=" product-item product-item-opt-1">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href="">{!! HTML::image('public/images/noimage/sbuyer.jpg', '', array('class' => 'img')) !!}</a>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Sony Ultral Shap HD </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$45.00</span>
                                                    </div>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" product-item product-item-opt-1">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href="">{!! HTML::image('public/images/noimage/sbuyer.jpg', '', array('class' => 'img')) !!}</a>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Washing Machine Pro </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$45.00</span>
                                                    </div>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class=" product-item product-item-opt-1">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href="">{!! HTML::image('public/images/noimage/sbuyer.jpg', '', array('class' => 'img')) !!}</a>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Electronics Machine Pro </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$45.00</span>
                                                    </div>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-item product-item-opt-1">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href="">{!! HTML::image('public/images/noimage/sbuyer.jpg', '', array('class' => 'img')) !!}</a>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">SamSung HSD Television </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$45.00</span>
                                                    </div>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->

                        </div>


                        <div class="col-featured">
                            <span class="label-featured">    

                                {!! HTML::image('public/images/icon/index1/label-featured.png', 'label-featured', array('class' => 'img')) !!}
                                
                            </span>
                            <div class="owl-carousel" 
                                data-nav="true" 
                                data-dots="false" 
                                data-margin="0" 
                                data-responsive='{
                                "0":{"items":1},
                                "380":{"items":2},
                                "480":{"items":2},
                                "600":{"items":1},
                                "992":{"items":1}
                                }'>
                                <div class="item">
                                   
                                   
                                      <?php  $count1 = 0 ?>                         
                                      @foreach($cat_menu->subcategory as $object)                                   
                                        @foreach ($object->product as $keyy=>$objects)  
                                          @if(@$objects->featured_product == 1 )
                                            @if($count1 < 3 )
                                                <?php  $count1++ ;  ?> 
                                    <div class="product-item product-item-opt-1">
                                        <div class="product-item-info">
                                            <div class="product-item-photo">
                                                <a class="product-item-img" href="{{ url('/'.$cat_menu->category_link.'/'.$object->link.'/'.$objects->link.'/'.$objects->id) }}">                                                    
                                                    <!-- {!! HTML::image('public/images/media/index1/Fetured1.jpg', 'label-featured', array('class' => 'img')) !!} -->
                                            <img src="{{url('public/images/product/'.$objects->image)}}" max-width="110" height="125">
                                                </a>
                                            </div>
                                            <div class="product-item-detail">
                                                <strong class="product-item-name"><a href="{{ url('/'.$cat_menu->category_link.'/'.$object->link.'/'.$objects->link.'/'.$objects->id) }}">{{ $objects->name }} </a></strong>
                                                <div class="product-item-price">
                                                    <span class="price">₹{{ $objects->rate }}</span>
                                                </div>
                                                <div class="product-item-actions">
                                                    <a class="btn btn-wishlist" href="{{ url('wishlist/'.$objects->id) }}"><span>wishlist</span></a>
                                                    <!-- <a class="btn btn-compare" href=""><span>compare</span></a> -->
                                                    <a href="{{ url('addItem/'.$objects->id)  }}"><button type="button" class="btn btn-cart"><span>Add to Cart</span></button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @endif
                                    @endforeach
                                    @endforeach        
                                   
                                </div>
                            </div>
                        </div>
                        

                       @if(@$side_banner->count() > 0)
                        <div class="col-banner">
                              @foreach(@$side_banner as $key=>$side_ban)
                                @if(@$key == 2)                        
                            <a href="" class="img">
                                 <img src="{{ url('public/images/sidebanner/'.$side_ban->image) }}"></a>                                
                            </a>                            
                            <div class="description">
                                <strong class="title"> {{ @$side_ban->name }}</strong>
                                <div class="des">{{ strip_tags(@$side_ban->content) }}</div>
                                <a href="{{ @$side_ban->link }}" class="btn btn-default">shop now</a>
                            </div>
                             @endif                            
                             
                             @endforeach
                        </div>
                     @endif
                        
                    </div>

                </div>
            </div>
            @endif
            @endforeach
            @endif

            <!-- block -floor -products / floor : BEVERAGES -->
<!-- 3 -->


<!-- 4 -->
            <!-- block -floor -products / floor :  VEGETABLES & GREENS-->
          @if(@$cat_menu_page->count() > 0)
          @foreach(@$cat_menu_page as $key=>$cat_menu)
          @if($key == 3)
            <!-- block -floor -products / floor : GROCERIES & STABLES-->
            <div class="block-floor-products block-floor-products-opt3 block-floor-1" id="floor1-4">
                <div class="container">
                    <div class="block-title heading-opt-1">   
            <span class="title" style="background-color: #f44336;">
                          {{ @$cat_menu->category_name }} </span>
                        <ul class="links">
                            <li role="presentation" class="active"><a href="#all4"  role="tab" data-toggle="tab">All Products</a></li>
                           <!--  <li role="presentation"><a href="#Bestseller4"  role="tab" data-toggle="tab">Bestseller</a></li>
                            <li role="presentation"><a href="#Most4"  role="tab" data-toggle="tab">Most reviews</a></li>
                            <li role="presentation"><a href="#Specials4"  role="tab" data-toggle="tab">Specials</a></li> -->
                        </ul>
                        <div class="actions">
                            <a href="#floor1-3" class="action action-up"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
                            <a href="#floor1-5" class="action action-down"><i class="fa fa-angle-down" aria-hidden="true"></i></a>
                        </div>
                    </div>

                    <div class="block-content">

                        <div class="col-categori">
                            <ul> @foreach($cat_menu->subcategory as $object) 
                                <li><a href="{{ url('/'.$cat_menu->category_link.'/'.$object->link)}}">{{ $object->subcategory }}</a></li>
                                 @endforeach
                            </ul>
                        </div>

        <div class="col-products home_product">

                        <?php  $count1 = 0 ?>                         
                          @foreach($cat_menu->subcategory as $object)  
                                 
                               @foreach ($object->product as $keyy=>$objects)         
                                            @if($count1 < 6 )
                                            @if($objects->featured_product == 0 )
                               <?php  $count1++ ;  ?>                                                
                                    <div class="item">                                       
                                        <div class=" product-item product-item-opt-1">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href="{{ url('/'.$cat_menu->category_link.'/'.$object->link.'/'.$objects->link.'/'.$objects->id) }}">                                                       
                                                         <img src="{{url('public/images/product/'.$objects->image)}}" max-width="110" height="125">
                                                    </a>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="{{ url('/'.$cat_menu->category_link.'/'.$object->link.'/'.$objects->link.'/'.$objects->id) }}">{{ $objects->name}}</a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">₹{{ $objects->rate}}</span>
                                                    </div>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href="{{ url('wishlist/'.$objects->id) }}"><span>wishlist</span></a>
                                                        <!-- <a class="btn btn-compare" href=""><span>compare</span></a> -->
                                                        <a href="{{ url('addItem/'.$objects->id)  }}"><button type="button" class="btn btn-cart"><span>Add to Cart</span></button></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>                                                                           
                                    </div>    
                                     @endif
                                     @endif
                                @endforeach
                         @endforeach


<!-- 
                            <div class="box-tab   fade " id="Bestseller4" role="tabpanel">
                                <div class="owl-carousel" 
                                    data-nav="true" 
                                    data-dots="false" 
                                    data-margin="0" 
                                    data-responsive='{
                                    "0":{"items":1},
                                    "420":{"items":2},
                                    "600":{"items":2},
                                    "768":{"items":2},
                                    "992":{"items":2},
                                    "1200":{"items":2}
                                }'>

                                    <div class="item">
                                        <div class=" product-item product-item-opt-1">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href="">{!! HTML::image('public/images/noimage/sbuyer.jpg', '', array('class' => 'img')) !!}</a>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Sony Ultral Shap HD </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$45.00</span>
                                                    </div>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" product-item product-item-opt-1">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href="">{!! HTML::image('public/images/noimage/sbuyer.jpg', '', array('class' => 'img')) !!}</a>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Washing Machine Pro </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$45.00</span>
                                                    </div>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class=" product-item product-item-opt-1">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href="">{!! HTML::image('public/images/noimage/sbuyer.jpg', '', array('class' => 'img')) !!}</a>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Electronics Machine Pro </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$45.00</span>
                                                    </div>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-item product-item-opt-1">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href="">{!! HTML::image('public/images/noimage/sbuyer.jpg', '', array('class' => 'img')) !!}</a>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">SamSung HSD Television </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$45.00</span>
                                                    </div>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->

                   <!--          <div class="box-tab   fade " id="Most4" role="tabpanel">
                                <div class="owl-carousel" 
                                    data-nav="true" 
                                    data-dots="false" 
                                    data-margin="0" 
                                    data-responsive='{
                                    "0":{"items":1},
                                    "420":{"items":2},
                                    "600":{"items":2},
                                    "768":{"items":2},
                                    "992":{"items":2},
                                    "1200":{"items":2}
                                }'>

                                    <div class="item">
                                        <div class=" product-item product-item-opt-1">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href="">{!! HTML::image('public/images/noimage/sbuyer.jpg', '', array('class' => 'img')) !!}</a>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Sony Ultral Shap HD </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$45.00</span>
                                                    </div>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" product-item product-item-opt-1">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href="">{!! HTML::image('public/images/noimage/sbuyer.jpg', '', array('class' => 'img')) !!}</a>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Washing Machine Pro </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$45.00</span>
                                                    </div>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class=" product-item product-item-opt-1">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href="">{!! HTML::image('public/images/noimage/sbuyer.jpg', '', array('class' => 'img')) !!}</a>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Electronics Machine Pro </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$45.00</span>
                                                    </div>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-item product-item-opt-1">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href="">{!! HTML::image('public/images/noimage/sbuyer.jpg', '', array('class' => 'img')) !!}</a>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">SamSung HSD Television </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$45.00</span>
                                                    </div>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->

                          <!--   <div class="box-tab  fade " id="Specials4" role="tabpanel">
                                <div class="owl-carousel" 
                                    data-nav="true" 
                                    data-dots="false" 
                                    data-margin="0" 
                                    data-responsive='{
                                    "0":{"items":1},
                                    "420":{"items":2},
                                    "600":{"items":2},
                                    "768":{"items":2},
                                    "992":{"items":2},
                                    "1200":{"items":2}
                                }'>

                                    <div class="item">
                                        <div class=" product-item product-item-opt-1">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href="">{!! HTML::image('public/images/noimage/sbuyer.jpg', '', array('class' => 'img')) !!}</a>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Sony Ultral Shap HD </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$45.00</span>
                                                    </div>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" product-item product-item-opt-1">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href="">{!! HTML::image('public/images/noimage/sbuyer.jpg', '', array('class' => 'img')) !!}</a>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Washing Machine Pro </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$45.00</span>
                                                    </div>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class=" product-item product-item-opt-1">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href="">{!! HTML::image('public/images/noimage/sbuyer.jpg', '', array('class' => 'img')) !!}</a>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Electronics Machine Pro </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$45.00</span>
                                                    </div>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-item product-item-opt-1">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href="">{!! HTML::image('public/images/noimage/sbuyer.jpg', '', array('class' => 'img')) !!}</a>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">SamSung HSD Television </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$45.00</span>
                                                    </div>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->

                        </div>


                        <div class="col-featured">
                            <span class="label-featured">    

                                {!! HTML::image('public/images/icon/index1/label-featured.png', 'label-featured', array('class' => 'img')) !!}
                                
                            </span>
                            <div class="owl-carousel" 
                                data-nav="true" 
                                data-dots="false" 
                                data-margin="0" 
                                data-responsive='{
                                "0":{"items":1},
                                "380":{"items":2},
                                "480":{"items":2},
                                "600":{"items":1},
                                "992":{"items":1}
                                }'>
                           
                                <div class="item">
                                
                                      <?php  $count1 = 0 ?>                         
                                      @foreach($cat_menu->subcategory as $object)                                   
                                        @foreach ($object->product as $keyy=>$objects)  
                                          @if(@$objects->featured_product == 1 )
                                            @if($count1 < 3 )
                                                <?php  $count1++ ;  ?> 
                                    <div class="product-item product-item-opt-1">
                                        <div class="product-item-info">
                                            <div class="product-item-photo">
                                                <a class="product-item-img" href="{{ url('/'.$cat_menu->category_link.'/'.$object->link.'/'.$objects->link.'/'.$objects->id) }}">                                                    
                                                    <!-- {!! HTML::image('public/images/media/index1/Fetured1.jpg', 'label-featured', array('class' => 'img')) !!} -->
                                            <img src="{{url('public/images/product/'.$objects->image)}}" max-width="110" height="125">
                                                </a>
                                            </div>
                                            <div class="product-item-detail">
                                                <strong class="product-item-name"><a href="{{ url('/'.$cat_menu->category_link.'/'.$object->link.'/'.$objects->link.'/'.$objects->id) }}">{{ $objects->name }} </a></strong>
                                                <div class="product-item-price">
                                                    <span class="price">₹{{ $objects->rate }}</span>
                                                </div>
                                                <div class="product-item-actions">
                                                   <a class="btn btn-wishlist" href="{{ url('wishlist/'.$objects->id) }}"><span>wishlist</span></a>
                                                   <!--  <a class="btn btn-compare" href=""><span>compare</span></a> -->
                                                    <a href="{{ url('addItem/'.$objects->id)  }}"><button type="button" class="btn btn-cart"><span>Add to Cart</span></button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @endif
                                    @endforeach
                                    @endforeach
                                   
                                </div>
                            </div>
                        </div>
                        

                       @if(@$side_banner->count() > 0)
                        <div class="col-banner">
                              @foreach(@$side_banner as $key=>$side_ban)
                                @if(@$key == 3)                        
                            <a href="" class="img">
                                 <img src="{{ url('public/images/sidebanner/'.$side_ban->image) }}"></a>                                
                            </a>                            
                            <div class="description">
                                <strong class="title"> {{ @$side_ban->name }}</strong>
                                <div class="des">{{ strip_tags(@$side_ban->content) }}</div>
                                <a href="{{ @$side_ban->link }}" class="btn btn-default">shop now</a>
                            </div>
                             @endif                            
                             
                             @endforeach
                        </div>
                     @endif
                        
                    </div>

                </div>
            </div>
            @endif
            @endforeach
            @endif

            <!-- block -floor -products / floor : BEVERAGES -->
<!-- 4 -->


<!-- 5 -->

<!-- block -floor -products / floor :BRANDED FOODS-->
          @if(@$cat_menu_page->count() > 0)
          @foreach(@$cat_menu_page as $key=>$cat_menu)
          @if($key == 4)
            <!-- block -floor -products / floor : GROCERIES & STABLES-->
            <div class="block-floor-products block-floor-products-opt3 block-floor-1" id="floor1-5">
                <div class="container">
                    <div class="block-title heading-opt-1">   
            <span class="title" style="background-color: #f44336;">
                          {{ @$cat_menu->category_name }} </span>
                        <ul class="links">
                            <li role="presentation" class="active"><a href="#all5"  role="tab" data-toggle="tab">All Products</a></li>
                            <!-- <li role="presentation"><a href="#Bestseller5"  role="tab" data-toggle="tab">Bestseller</a></li>
                            <li role="presentation"><a href="#Most5"  role="tab" data-toggle="tab">Most reviews</a></li>
                            <li role="presentation"><a href="#Specials5"  role="tab" data-toggle="tab">Specials</a></li> -->
                        </ul>
                        <div class="actions">
                            <a href="#floor1-4" class="action action-up"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
                            <a href="#floor1-6" class="action action-down"><i class="fa fa-angle-down" aria-hidden="true"></i></a>
                        </div>
                    </div>

                    <div class="block-content">

                        <div class="col-categori">
                            <ul> @foreach($cat_menu->subcategory as $object) 
                                <li><a href="{{ url('/'.$cat_menu->category_link.'/'.$object->link)}}">{{ $object->subcategory }}</a></li>
                                 @endforeach
                            </ul>
                        </div>


       <div class="col-products home_product">

                        <?php  $count1 = 0 ?>                         
                          @foreach($cat_menu->subcategory as $object)  
                                 
                               @foreach ($object->product as $keyy=>$objects)         
                                            @if($count1 < 6 )
                                            @if($objects->featured_product == 0 )
                               <?php  $count1++ ;  ?>                                                
                                    <div class="item">                                       
                                        <div class=" product-item product-item-opt-1">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href="{{ url('/'.$cat_menu->category_link.'/'.$object->link.'/'.$objects->link.'/'.$objects->id) }}">                                     
                                                         <img src="{{url('public/images/product/'.$objects->image)}}" max-width="110" height="125">
                                                    </a>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="{{ url('/'.$cat_menu->category_link.'/'.$object->link.'/'.$objects->link.'/'.$objects->id) }}">{{ $objects->name}}</a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">₹{{ $objects->rate}}</span>
                                                    </div>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href="{{ url('wishlist/'.$objects->id) }}"><span>wishlist</span></a>
                                                        <!-- <a class="btn btn-compare" href=""><span>compare</span></a> -->
                                                        <a href="{{ url('addItem/'.$objects->id)  }}"><button type="button" class="btn btn-cart"><span>Add to Cart</span></button></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>                                                                           
                                    </div>    
                                     @endif
                                     @endif
                                @endforeach
                         @endforeach



                           <!--  <div class="box-tab   fade " id="Bestseller5" role="tabpanel">
                                <div class="owl-carousel" 
                                    data-nav="true" 
                                    data-dots="false" 
                                    data-margin="0" 
                                    data-responsive='{
                                    "0":{"items":1},
                                    "420":{"items":2},
                                    "600":{"items":2},
                                    "768":{"items":2},
                                    "992":{"items":2},
                                    "1200":{"items":2}
                                }'>

                                    <div class="item">
                                        <div class=" product-item product-item-opt-1">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href="">{!! HTML::image('public/images/noimage/sbuyer.jpg', '', array('class' => 'img')) !!}</a>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Sony Ultral Shap HD </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$45.00</span>
                                                    </div>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" product-item product-item-opt-1">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href="">{!! HTML::image('public/images/noimage/sbuyer.jpg', '', array('class' => 'img')) !!}</a>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Washing Machine Pro </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$45.00</span>
                                                    </div>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class=" product-item product-item-opt-1">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href="">{!! HTML::image('public/images/noimage/sbuyer.jpg', '', array('class' => 'img')) !!}</a>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Electronics Machine Pro </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$45.00</span>
                                                    </div>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-item product-item-opt-1">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href="">{!! HTML::image('public/images/noimage/sbuyer.jpg', '', array('class' => 'img')) !!}</a>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">SamSung HSD Television </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$45.00</span>
                                                    </div>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->

                       <!--      <div class="box-tab   fade " id="Most5" role="tabpanel">
                                <div class="owl-carousel" 
                                    data-nav="true" 
                                    data-dots="false" 
                                    data-margin="0" 
                                    data-responsive='{
                                    "0":{"items":1},
                                    "420":{"items":2},
                                    "600":{"items":2},
                                    "768":{"items":2},
                                    "992":{"items":2},
                                    "1200":{"items":2}
                                }'>

                                    <div class="item">
                                        <div class=" product-item product-item-opt-1">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href="">{!! HTML::image('public/images/noimage/sbuyer.jpg', '', array('class' => 'img')) !!}</a>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Sony Ultral Shap HD </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$45.00</span>
                                                    </div>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" product-item product-item-opt-1">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href="">{!! HTML::image('public/images/noimage/sbuyer.jpg', '', array('class' => 'img')) !!}</a>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Washing Machine Pro </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$45.00</span>
                                                    </div>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class=" product-item product-item-opt-1">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href="">{!! HTML::image('public/images/noimage/sbuyer.jpg', '', array('class' => 'img')) !!}</a>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Electronics Machine Pro </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$45.00</span>
                                                    </div>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-item product-item-opt-1">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href="">{!! HTML::image('public/images/noimage/sbuyer.jpg', '', array('class' => 'img')) !!}</a>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">SamSung HSD Television </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$45.00</span>
                                                    </div>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->

                        <!--     <div class="box-tab  fade " id="Specials5" role="tabpanel">
                                <div class="owl-carousel" 
                                    data-nav="true" 
                                    data-dots="false" 
                                    data-margin="0" 
                                    data-responsive='{
                                    "0":{"items":1},
                                    "420":{"items":2},
                                    "600":{"items":2},
                                    "768":{"items":2},
                                    "992":{"items":2},
                                    "1200":{"items":2}
                                }'>

                                    <div class="item">
                                        <div class=" product-item product-item-opt-1">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href="">{!! HTML::image('public/images/noimage/sbuyer.jpg', '', array('class' => 'img')) !!}</a>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Sony Ultral Shap HD </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$45.00</span>
                                                    </div>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" product-item product-item-opt-1">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href="">{!! HTML::image('public/images/noimage/sbuyer.jpg', '', array('class' => 'img')) !!}</a>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Washing Machine Pro </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$45.00</span>
                                                    </div>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class=" product-item product-item-opt-1">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href="">{!! HTML::image('public/images/noimage/sbuyer.jpg', '', array('class' => 'img')) !!}</a>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Electronics Machine Pro </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$45.00</span>
                                                    </div>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-item product-item-opt-1">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href="">{!! HTML::image('public/images/noimage/sbuyer.jpg', '', array('class' => 'img')) !!}</a>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">SamSung HSD Television </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$45.00</span>
                                                    </div>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
 -->
                        </div>


                        <div class="col-featured">
                            <span class="label-featured">    

                                {!! HTML::image('public/images/icon/index1/label-featured.png', 'label-featured', array('class' => 'img')) !!}
                                
                            </span>
                            <div class="owl-carousel" 
                                data-nav="true" 
                                data-dots="false" 
                                data-margin="0" 
                                data-responsive='{
                                "0":{"items":1},
                                "380":{"items":2},
                                "480":{"items":2},
                                "600":{"items":1},
                                "992":{"items":1}
                                }'>
                                
                                <div class="item">
                                    
                                      <?php  $count1 = 0 ?>                         
                                      @foreach($cat_menu->subcategory as $object)                                   
                                        @foreach ($object->product as $keyy=>$objects)  
                                          @if(@$objects->featured_product == 1 )
                                            @if($count1 < 3 )
                                                <?php  $count1++ ;  ?> 
                                    <div class="product-item product-item-opt-1">
                                        <div class="product-item-info">
                                            <div class="product-item-photo">
                                                <a class="product-item-img" href="{{ url('/'.$cat_menu->category_link.'/'.$object->link.'/'.$objects->link.'/'.$objects->id) }}">                                                    
                                                    <!-- {!! HTML::image('public/images/media/index1/Fetured1.jpg', 'label-featured', array('class' => 'img')) !!} -->
                                            <img src="{{url('public/images/product/'.$objects->image)}}" max-width="110" height="125">
                                                </a>
                                            </div>
                                            <div class="product-item-detail">
                                                <strong class="product-item-name"><a href="{{ url('/'.$cat_menu->category_link.'/'.$object->link.'/'.$objects->link.'/'.$objects->id) }}">{{ $objects->name }} </a></strong>
                                                <div class="product-item-price">
                                                    <span class="price">₹{{ $objects->rate }}</span>
                                                </div>
                                                <div class="product-item-actions">
                                                    <a class="btn btn-wishlist" href="{{ url('wishlist/'.$objects->id) }}"><span>wishlist</span></a>
                                                    <!-- <a class="btn btn-compare" href=""><span>compare</span></a> -->
                                                    <a href="{{ url('addItem/'.$objects->id)  }}"><button type="button" class="btn btn-cart"><span>Add to Cart</span></button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @endif
                                    @endforeach
                                    @endforeach
                                    
                                </div>
                            </div>
                        </div>
                        

                        @if(@$side_banner->count() > 0)
                        <div class="col-banner">
                              @foreach(@$side_banner as $key=>$side_ban)
                                @if(@$key == 4)                        
                            <a href="" class="img">
                                 <img src="{{ url('public/images/sidebanner/'.$side_ban->image) }}"></a>                                
                            </a>                            
                            <div class="description">
                                <strong class="title"> {{ @$side_ban->name }}</strong>
                                <div class="des">{{ strip_tags(@$side_ban->content) }}</div>
                                <a href="{{ @$side_ban->link }}" class="btn btn-default">shop now</a>
                            </div>
                             @endif                            
                             
                             @endforeach
                        </div>
                     @endif
                        
                    </div>

                </div>
            </div>
            @endif
            @endforeach
            @endif
    <!-- block -floor -products / floor :BRANDED FOODS-->

<!-- 5 -->

<!-- 6 -->

<!-- block -floor -products / floor :PERSONAL CARE-->
          @if(@$cat_menu_page->count() > 0)
          @foreach(@$cat_menu_page as $key=>$cat_menu)
          @if($key == 5)
            <!-- block -floor -products / floor : GROCERIES & STABLES-->
            <div class="block-floor-products block-floor-products-opt3 block-floor-1" id="floor1-6">
                <div class="container">
                    <div class="block-title heading-opt-1">   
            <span class="title" style="background-color: #f44336;">
                          {{ @$cat_menu->category_name }} </span>
                        <ul class="links">
                            <li role="presentation" class="active"><a href="#all6"  role="tab" data-toggle="tab">All Products</a></li>
                            <!-- <li role="presentation"><a href="#Bestseller6"  role="tab" data-toggle="tab">Bestseller</a></li>
                            <li role="presentation"><a href="#Most6"  role="tab" data-toggle="tab">Most reviews</a></li>
                            <li role="presentation"><a href="#Specials6"  role="tab" data-toggle="tab">Specials</a></li> -->
                        </ul>
                        <div class="actions">
                            <a href="#floor1-5" class="action action-up"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
                            <a href="#floor1-7" class="action action-down"><i class="fa fa-angle-down" aria-hidden="true"></i></a>
                        </div>
                    </div>

                    <div class="block-content">

                        <div class="col-categori">
                            <ul> @foreach($cat_menu->subcategory as $object) 
                                <li><a href="{{ url('/'.$cat_menu->category_link.'/'.$object->link)}}">{{ $object->subcategory }}</a></li>
                                 @endforeach
                            </ul>
                        </div>


                       <div class="col-products home_product">

                        <?php  $count1 = 0 ?>                         
                          @foreach($cat_menu->subcategory as $object)  
                                 
                               @foreach ($object->product as $keyy=>$objects)         
                                            @if($count1 < 6 )
                                            @if($objects->featured_product == 0 )
                               <?php  $count1++ ;  ?>                                                
                                    <div class="item">                                       
                                        <div class=" product-item product-item-opt-1">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href="{{ url('/'.$cat_menu->category_link.'/'.$object->link.'/'.$objects->link.'/'.$objects->id) }}">                                                       
                                                         <img src="{{url('public/images/product/'.$objects->image)}}" max-width="110" height="125">
                                                    </a>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="{{ url('/'.$cat_menu->category_link.'/'.$object->link.'/'.$objects->link.'/'.$objects->id) }}">{{ $objects->name}}</a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">₹{{ $objects->rate}}</span>
                                                    </div>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href="{{ url('wishlist/'.$objects->id) }}"><span>wishlist</span></a>
                                                        <!-- <a class="btn btn-compare" href=""><span>compare</span></a> -->
                                                       <a href="{{ url('addItem/'.$objects->id)  }}"><button type="button" class="btn btn-cart"><span>Add to Cart</span></button></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>                                                                           
                                    </div>    
                                     @endif
                                     @endif
                                @endforeach
                         @endforeach



                          <!--   <div class="box-tab   fade " id="Bestseller6" role="tabpanel">
                                <div class="owl-carousel" 
                                    data-nav="true" 
                                    data-dots="false" 
                                    data-margin="0" 
                                    data-responsive='{
                                    "0":{"items":1},
                                    "420":{"items":2},
                                    "600":{"items":2},
                                    "768":{"items":2},
                                    "992":{"items":2},
                                    "1200":{"items":2}
                                }'>

                                    <div class="item">
                                        <div class=" product-item product-item-opt-1">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href="">{!! HTML::image('public/images/noimage/sbuyer.jpg', '', array('class' => 'img')) !!}</a>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Sony Ultral Shap HD </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$45.00</span>
                                                    </div>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" product-item product-item-opt-1">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href="">{!! HTML::image('public/images/noimage/sbuyer.jpg', '', array('class' => 'img')) !!}</a>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Washing Machine Pro </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$45.00</span>
                                                    </div>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class=" product-item product-item-opt-1">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href="">{!! HTML::image('public/images/noimage/sbuyer.jpg', '', array('class' => 'img')) !!}</a>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Electronics Machine Pro </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$45.00</span>
                                                    </div>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-item product-item-opt-1">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href="">{!! HTML::image('public/images/noimage/sbuyer.jpg', '', array('class' => 'img')) !!}</a>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">SamSung HSD Television </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$45.00</span>
                                                    </div>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
 -->
                    <!--         <div class="box-tab   fade " id="Most6" role="tabpanel">
                                <div class="owl-carousel" 
                                    data-nav="true" 
                                    data-dots="false" 
                                    data-margin="0" 
                                    data-responsive='{
                                    "0":{"items":1},
                                    "420":{"items":2},
                                    "600":{"items":2},
                                    "768":{"items":2},
                                    "992":{"items":2},
                                    "1200":{"items":2}
                                }'>

                                    <div class="item">
                                        <div class=" product-item product-item-opt-1">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href="">{!! HTML::image('public/images/noimage/sbuyer.jpg', '', array('class' => 'img')) !!}</a>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Sony Ultral Shap HD </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$45.00</span>
                                                    </div>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" product-item product-item-opt-1">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href="">{!! HTML::image('public/images/noimage/sbuyer.jpg', '', array('class' => 'img')) !!}</a>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Washing Machine Pro </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$45.00</span>
                                                    </div>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class=" product-item product-item-opt-1">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href="">{!! HTML::image('public/images/noimage/sbuyer.jpg', '', array('class' => 'img')) !!}</a>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Electronics Machine Pro </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$45.00</span>
                                                    </div>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-item product-item-opt-1">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href="">{!! HTML::image('public/images/noimage/sbuyer.jpg', '', array('class' => 'img')) !!}</a>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">SamSung HSD Television </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$45.00</span>
                                                    </div>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->

                        <!--     <div class="box-tab  fade " id="Specials6" role="tabpanel">
                                <div class="owl-carousel" 
                                    data-nav="true" 
                                    data-dots="false" 
                                    data-margin="0" 
                                    data-responsive='{
                                    "0":{"items":1},
                                    "420":{"items":2},
                                    "600":{"items":2},
                                    "768":{"items":2},
                                    "992":{"items":2},
                                    "1200":{"items":2}
                                }'>

                                    <div class="item">
                                        <div class=" product-item product-item-opt-1">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href="">{!! HTML::image('public/images/noimage/sbuyer.jpg', '', array('class' => 'img')) !!}</a>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Sony Ultral Shap HD </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$45.00</span>
                                                    </div>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" product-item product-item-opt-1">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href="">{!! HTML::image('public/images/noimage/sbuyer.jpg', '', array('class' => 'img')) !!}</a>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Washing Machine Pro </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$45.00</span>
                                                    </div>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class=" product-item product-item-opt-1">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href="">{!! HTML::image('public/images/noimage/sbuyer.jpg', '', array('class' => 'img')) !!}</a>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Electronics Machine Pro </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$45.00</span>
                                                    </div>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-item product-item-opt-1">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href="">{!! HTML::image('public/images/noimage/sbuyer.jpg', '', array('class' => 'img')) !!}</a>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">SamSung HSD Television </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$45.00</span>
                                                    </div>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->

                        </div>

                         <div class="col-featured">
                            <span class="label-featured">    

                                {!! HTML::image('public/images/icon/index1/label-featured.png', 'label-featured', array('class' => 'img')) !!}
                                
                            </span>
                            <div class="owl-carousel" 
                                data-nav="true" 
                                data-dots="false" 
                                data-margin="0" 
                                data-responsive='{
                                "0":{"items":1},
                                "380":{"items":2},
                                "480":{"items":2},
                                "600":{"items":1},
                                "992":{"items":1}
                                }'>                               
                                <div class="item">                                  
                                     <?php  $count1 = 0 ?>                         
                                      @foreach($cat_menu->subcategory as $object)                                   
                                        @foreach ($object->product as $keyy=>$objects)  
                                          @if(@$objects->featured_product == 1 )
                                            @if($count1 < 3 )
                                                <?php  $count1++ ;  ?> 
                                    <div class="product-item product-item-opt-1">
                                        <div class="product-item-info">
                                            <div class="product-item-photo">
                                                <a class="product-item-img" href="{{ url('/'.$cat_menu->category_link.'/'.$object->link.'/'.$objects->link.'/'.$objects->id) }}">                                                    
                                                    <!-- {!! HTML::image('public/images/media/index1/Fetured1.jpg', 'label-featured', array('class' => 'img')) !!} -->
                                            <img src="{{url('public/images/product/'.$objects->image)}}" max-width="110" height="125">
                                                </a>
                                            </div>
                                            <div class="product-item-detail">
                                                <strong class="product-item-name"><a href="{{ url('/'.$cat_menu->category_link.'/'.$object->link.'/'.$objects->link.'/'.$objects->id) }}">{{ $objects->name }} </a></strong>
                                                <div class="product-item-price">
                                                    <span class="price">₹{{ $objects->rate }}</span>
                                                </div>
                                                <div class="product-item-actions">
                                                    <a class="btn btn-wishlist" href="{{ url('wishlist/'.$objects->id) }}"><span>wishlist</span></a>
                                                    <!-- <a class="btn btn-compare" href=""><span>compare</span></a> -->
                                                   <a href="{{ url('addItem/'.$objects->id)  }}"><button type="button" class="btn btn-cart"><span>Add to Cart</span></button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @endif
                                    @endforeach
                                    @endforeach
                                   
                                </div>
                            </div>
                        </div>
                        
                         @if(@$side_banner->count() > 0)
                        <div class="col-banner">
                              @foreach(@$side_banner as $key=>$side_ban)
                                @if(@$key == 5)                        
                            <a href="" class="img">
                                 <img src="{{ url('public/images/sidebanner/'.$side_ban->image) }}"></a>                                
                            </a>                            
                            <div class="description">
                                <strong class="title"> {{ @$side_ban->name }}</strong>
                                <div class="des">{{ strip_tags(@$side_ban->content) }}</div>
                                <a href="{{ @$side_ban->link }}" class="btn btn-default">shop now</a>
                            </div>
                             @endif                            
                             
                             @endforeach
                        </div>
                     @endif
                        
                    </div>

                </div>
            </div>
            @endif
            @endforeach
            @endif
    <!-- block -floor -products / floor :PERSONAL CARE-->

<!-- 6 -->



<!-- 7 -->

<!-- block -floor -products / floor :PERSONAL CARE-->
          @if(@$cat_menu_page->count() > 0)
          @foreach(@$cat_menu_page as $key=>$cat_menu)
          @if($key == 6)
            <!-- block -floor -products / floor : GROCERIES & STABLES-->
            <div class="block-floor-products block-floor-products-opt3 block-floor-1" id="floor1-7">
                <div class="container">
                    <div class="block-title heading-opt-1">   
            <span class="title" style="background-color: #f44336;">
                          {{ @$cat_menu->category_name }} </span>
                        <ul class="links">
                            <li role="presentation" class="active"><a href="#all7"  role="tab" data-toggle="tab">All Products</a></li>
                            <!-- <li role="presentation"><a href="#Bestseller7"  role="tab" data-toggle="tab">Bestseller</a></li>
                            <li role="presentation"><a href="#Most7"  role="tab" data-toggle="tab">Most reviews</a></li>
                            <li role="presentation"><a href="#Specials7"  role="tab" data-toggle="tab">Specials</a></li> -->
                        </ul>
                        <div class="actions">
                            <a href="#floor1-6" class="action action-up"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
                            <a href="#floor1-1" class="action action-down"><i class="fa fa-angle-down" aria-hidden="true"></i></a>
                        </div>
                    </div>

                    <div class="block-content">

                        <div class="col-categori">
                            <ul> @foreach($cat_menu->subcategory as $object) 
                                <li><a href="{{ url('/'.$cat_menu->category_link.'/'.$object->link)}}">{{ $object->subcategory }}</a></li>
                                 @endforeach
                            </ul>
                        </div>


                        <div class="col-products home_product">

                        <?php  $count1 = 0 ?>                         
                          @foreach($cat_menu->subcategory as $object)  
                                 
                               @foreach ($object->product as $keyy=>$objects)         
                                            @if($count1 < 6 )
                                            @if($objects->featured_product == 0 )
                               <?php  $count1++ ;  ?>                                                
                                    <div class="item">                                       
                                        <div class=" product-item product-item-opt-1">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href="{{ url('/'.$cat_menu->category_link.'/'.$object->link.'/'.$objects->link.'/'.$objects->id) }}">                                                       
                                                         <img src="{{url('public/images/product/'.$objects->image)}}" max-width="110" height="125">
                                                    </a>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name">
                                                        <a href="{{ url('/'.$cat_menu->category_link.'/'.$object->link.'/'.$objects->link.'/'.$objects->id) }}">{{ $objects->name}}</a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">₹{{ $objects->rate}}</span>
                                                    </div>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href="{{ url('wishlist/'.$objects->id) }}"><span>wishlist</span></a>
                                                        <!-- <a class="btn btn-compare" href=""><span>compare</span></a> -->
                                                       <a href="{{ url('addItem/'.$objects->id)  }}"><button type="button" class="btn btn-cart"><span>Add to Cart</span></button></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>                                                                           
                                    </div>    
                                     @endif
                                     @endif
                                @endforeach
                         @endforeach



                          <!--   <div class="box-tab   fade " id="Bestseller7" role="tabpanel">
                                <div class="owl-carousel" 
                                    data-nav="true" 
                                    data-dots="false" 
                                    data-margin="0" 
                                    data-responsive='{
                                    "0":{"items":1},
                                    "420":{"items":2},
                                    "600":{"items":2},
                                    "768":{"items":2},
                                    "992":{"items":2},
                                    "1200":{"items":2}
                                }'>

                                    <div class="item">
                                        <div class=" product-item product-item-opt-1">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href="">{!! HTML::image('public/images/noimage/sbuyer.jpg', '', array('class' => 'img')) !!}</a>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Sony Ultral Shap HD </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$45.00</span>
                                                    </div>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" product-item product-item-opt-1">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href="">{!! HTML::image('public/images/noimage/sbuyer.jpg', '', array('class' => 'img')) !!}</a>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Washing Machine Pro </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$45.00</span>
                                                    </div>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class=" product-item product-item-opt-1">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href="">{!! HTML::image('public/images/noimage/sbuyer.jpg', '', array('class' => 'img')) !!}</a>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Electronics Machine Pro </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$45.00</span>
                                                    </div>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-item product-item-opt-1">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href="">{!! HTML::image('public/images/noimage/sbuyer.jpg', '', array('class' => 'img')) !!}</a>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">SamSung HSD Television </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$45.00</span>
                                                    </div>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
 -->
                           <!--  <div class="box-tab   fade " id="Most7" role="tabpanel">
                                <div class="owl-carousel" 
                                    data-nav="true" 
                                    data-dots="false" 
                                    data-margin="0" 
                                    data-responsive='{
                                    "0":{"items":1},
                                    "420":{"items":2},
                                    "600":{"items":2},
                                    "768":{"items":2},
                                    "992":{"items":2},
                                    "1200":{"items":2}
                                }'>

                                    <div class="item">
                                        <div class=" product-item product-item-opt-1">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href="">{!! HTML::image('public/images/noimage/sbuyer.jpg', '', array('class' => 'img')) !!}</a>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Sony Ultral Shap HD </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$45.00</span>
                                                    </div>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" product-item product-item-opt-1">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href="">{!! HTML::image('public/images/noimage/sbuyer.jpg', '', array('class' => 'img')) !!}</a>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Washing Machine Pro </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$45.00</span>
                                                    </div>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class=" product-item product-item-opt-1">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href="">{!! HTML::image('public/images/noimage/sbuyer.jpg', '', array('class' => 'img')) !!}</a>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Electronics Machine Pro </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$45.00</span>
                                                    </div>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-item product-item-opt-1">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href="">{!! HTML::image('public/images/noimage/sbuyer.jpg', '', array('class' => 'img')) !!}</a>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">SamSung HSD Television </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$45.00</span>
                                                    </div>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->

                          <!--   <div class="box-tab  fade " id="Specials7" role="tabpanel">
                                <div class="owl-carousel" 
                                    data-nav="true" 
                                    data-dots="false" 
                                    data-margin="0" 
                                    data-responsive='{
                                    "0":{"items":1},
                                    "420":{"items":2},
                                    "600":{"items":2},
                                    "768":{"items":2},
                                    "992":{"items":2},
                                    "1200":{"items":2}
                                }'>

                                    <div class="item">
                                        <div class=" product-item product-item-opt-1">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href="">{!! HTML::image('public/images/noimage/sbuyer.jpg', '', array('class' => 'img')) !!}</a>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Sony Ultral Shap HD </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$45.00</span>
                                                    </div>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" product-item product-item-opt-1">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href="">{!! HTML::image('public/images/noimage/sbuyer.jpg', '', array('class' => 'img')) !!}</a>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Washing Machine Pro </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$45.00</span>
                                                    </div>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class=" product-item product-item-opt-1">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href="">{!! HTML::image('public/images/noimage/sbuyer.jpg', '', array('class' => 'img')) !!}</a>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Electronics Machine Pro </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$45.00</span>
                                                    </div>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-item product-item-opt-1">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href="">{!! HTML::image('public/images/noimage/sbuyer.jpg', '', array('class' => 'img')) !!}</a>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">SamSung HSD Television </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$45.00</span>
                                                    </div>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                        </div>


                         <div class="col-featured">
                            <span class="label-featured">    

                                {!! HTML::image('public/images/icon/index1/label-featured.png', 'label-featured', array('class' => 'img')) !!}
                                
                            </span>
                            <div class="owl-carousel" 
                                data-nav="true" 
                                data-dots="false" 
                                data-margin="0" 
                                data-responsive='{
                                "0":{"items":1},
                                "380":{"items":2},
                                "480":{"items":2},
                                "600":{"items":1},
                                "992":{"items":1}
                                }'>
                               
                                <div class="item">
                                       <?php  $count1 = 0 ?>                         
                                      @foreach($cat_menu->subcategory as $object)                                   
                                        @foreach ($object->product as $keyy=>$objects)  
                                          @if(@$objects->featured_product == 1 )
                                            @if($count1 < 3 )
                                                <?php  $count1++ ;  ?> 
                                    <div class="product-item product-item-opt-1">
                                        <div class="product-item-info">
                                            <div class="product-item-photo">
                                                <a class="product-item-img" href="{{ url('/'.$cat_menu->category_link.'/'.$object->link.'/'.$objects->link.'/'.$objects->id) }}">                                                    
                                                    <!-- {!! HTML::image('public/images/media/index1/Fetured1.jpg', 'label-featured', array('class' => 'img')) !!} -->
                                            <img src="{{url('public/images/product/'.$objects->image)}}" max-width="110" height="125">
                                                </a>
                                            </div>
                                            <div class="product-item-detail">
                                                <strong class="product-item-name"><a href="{{ url('/'.$cat_menu->category_link.'/'.$object->link.'/'.$objects->link.'/'.$objects->id) }}">{{ $objects->name }} </a></strong>
                                                <div class="product-item-price">
                                                    <span class="price">₹{{ $objects->rate }}</span>
                                                </div>
                                                <div class="product-item-actions">
                                                    <a class="btn btn-wishlist" href="{{ url('wishlist/'.$objects->id) }}"><span>wishlist</span></a>
                                                   <!--  <a class="btn btn-compare" href=""><span>compare</span></a> -->
                                                    <a href="{{ url('addItem/'.$objects->id)  }}"><button type="button" class="btn btn-cart"><span>Add to Cart</span></button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @endif
                                    @endforeach
                                    @endforeach
                                    
                                  
                                </div>
                            </div>
                        </div>
                        
                         @if(@$side_banner->count() > 0)
                        <div class="col-banner">
                              @foreach(@$side_banner as $key=>$side_ban)
                                @if(@$key == 5)                        
                            <a href="" class="img">
                                 <img src="{{ url('public/images/sidebanner/'.$side_ban->image) }}"></a>                                
                            </a>                            
                            <div class="description">
                                <strong class="title"> {{ @$side_ban->name }}</strong>
                                <div class="des">{{ strip_tags(@$side_ban->content) }}</div>
                                <a href="{{ @$side_ban->link }}" class="btn btn-default">shop now</a>
                            </div>
                             @endif                            
                             
                             @endforeach
                        </div>
                     @endif
                        
                    </div>

                </div>
            </div>
            @endif
            @endforeach
            @endif
    <!-- block -floor -products / floor :PERSONAL CARE-->

<!-- 6 -->


 @if(@$hot->count() > 0 )
                        <!-- block  hot categories-->
            <div class="block-hot-categories-opt2">
                <div class="container">

                    <div class="block-title heading-opt-6">
                        <span class="title">Hot categories</span>
                    </div>
 <div class="block-content">
                        <div class="row">
                           
                            @foreach($hot as $key => $value)
                            @foreach($value->subcategory as $object)
                            <div class="col-md-3 col-sm-6">
                                <div class="item">
                                    
                                    <div class="description" style="background-image: url(images/media/index6/hot-categories1.png)">
                                        <div class="title"><span>  {{ $object->subcategory }}   </span></div>
                                        <a href="{{ url('/'.$value->category_link.'/'.$object->link) }}" class="btn">shop now</a>
                                    </div>
                                    <ul>                         
                                                    @foreach ($object->product as $objects)
                                      <li><a href="{{ url('/'.$value->category_link.'/'.$object->link.'/'.$objects->link.'/'.$objects->id) }}">{{ $objects->name}}</a></li>                                
                                                    @endforeach
                                    </ul>
                                </div>
                                
                            </div>
                            @endforeach 
                            @endforeach
                            
                            
                        </div>
                    </div>


                </div>
            </div><!--block  hot categories-->

@endif


 @if(@$blog->count() > 0 )
            <!-- Block Blog -->
            <div class="block-the-blog">
                <div class="container">
                    <div class="block-title">
                        <span class="title">From The  Blog</span>
                    </div>
                    <div class="block-content">
                        <div class="owl-carousel" 
                            data-nav="true" 
                            data-dots="false" 
                            data-margin="30" 
                            data-responsive='{
                            "0":{"items":1},
                            "480":{"items":2},
                            "768":{"items":2},
                            "992":{"items":3},
                            "1200":{"items":3}
                            }'>
                           
                            @foreach($blog as $key => $value)
                                <div class="blog-item">
                                    <div class="blog-photo">
                                        <a href="{{ url('/blog/'.$value->blog->link.'/'.$value->link)}}">
                                          <img src="{{ url('public/images/blog/'.$value->image) }}" alt="blog"> 
                                            
                                        </a>
                                        <span class="blog-date">
                                            <?php $date = \Carbon\Carbon::parse($value->updated_at); ?>                                            
                                            {{ $date->day }}   {{ str_limit($date->format('F'), $limit = 3, $end = '') }}
                                        </span>
                                    </div>
                                    <div class="blog-detail">
                                        <strong class="blog-name"><a href="{{ url('/blog/'.$value->blog->link.'/'.$value->link)}}">{!!$value->title!!} </a></strong>
                                        <div class="blog-des">
                                            {!!$value->shortcontent!!}
                                        </div>
                                        <div class="blog-actions">
                                            <a href="{{ url('/blog/'.$value->blog->link.'/'.$value->link)}}" class="action">Read more</a>
                                        </div>
                                    </div>
                                </div>
                             @endforeach
                            
                        </div>
                    </div>
                </div>
            </div><!-- Block Blog -->

 @endif




@if(@$brand->count() > 0 )
            <!-- block-brand -->
            <div class="block-brand">
                <div class="container">
                    <div class="owl-carousel" 
                        data-nav="true" 
                        data-dots="false" 
                        data-margin="30" 
                        data-responsive='{
                            "0":{"items":3},
                            "480":{"items":4},
                            "600":{"items":5},
                            "992":{"items":6}
                        }'>
                        @foreach($brand as $brands)
                        <div class="item">
                            <a href="{{ $brands->link }}">
                        <img src="{{ url('public/images/brand/'.$brands->image) }}"></a>
                        </div>
                        @endforeach                     
                        
                    </div>
                </div>
            </div>
   @endif

        <!-- block-brand -->
           @include('footer.footer')    
        </main><!-- end MAIN -->              
    </div>      
</body>
</html>