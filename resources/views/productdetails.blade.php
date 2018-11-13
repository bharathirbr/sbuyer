<!doctype html>
<html>
<head>
    @include('header.head')
</head>
<body class="index-opt-1 catalog-product-view catalog-view_default">
    <div class="wrapper">
                @include('header.header')
        <!-- MAIN -->
        <main class="site-main"> 

             <!-- breadcrumb -->
            <div class="container breadcrumb-page">
                <ol class="breadcrumb">
                    <li><a href="#">Home </a></li>
                    <li class="active">Product</li>
                </ol>
            </div>
             <!-- breadcrumb -->
             <!-- about page  start -->
                <!-- MAIN -->   
            <div class="container">
                <div class="row">
                    
                    <div class="col-sm-7 col-md-6 col-lg-5">

                        <div class="product-media media-horizontal">

                            <div class="image_preview_container images-large">

                                <img id="img_zoom" data-zoom-image="{{ url('public/images/product/'.$product_details->image) }}" src="{{ url('public/images/product/'.$product_details->image) }}" alt="">

                                <button class="btn-zoom open_qv"><span>zoom</span></button>

                            </div>
                            
                            <div class="product_preview images-small">

                                <div class="owl-carousel thumbnails_carousel" id="thumbnails"  data-nav="true" data-dots="false" data-margin="15" data-responsive='{"0":{"items":3},"480":{"items":4},"600":{"items":5},"768":{"items":3}}'>
                                    
                               @foreach($product_details->product_details as $imgname)              
                                    <a href="#" data-image="{{url('public/images/product/extra/'.$imgname->image)}}" data-zoom-image="{{url('public/images/product/extra/'.$imgname->image)}}">
                                        <img src="{{url('public/images/product/extra/'.$imgname->image)}}" data-large-image="{{url('public/images/product/extra/'.$imgname->image)}}" alt="">
                                    </a>
                              @endforeach
                                  

                                </div>
                                <!--/ .owl-carousel-->

                            </div><!--/ .product_preview-->

                        </div><!-- image product -->
                    </div>

                    <div class="col-sm-5 col-md-6 col-lg-7"> 

                        <div class="product-info-main">

                            <h1 class="page-title">
                                {{@$product_details->title}}
                            </h1>

                            <div class="product-reviews-summary">
                                
                                <div class="rating-action">
                                    <a href="">Write Your Review</a>
                                </div>
                            </div>

                            <div class="product-info-price">
                                <div class="price-box">
                                    <span class="price">₹{{@$product_details->rate}}</span>
                                    
                                </div>

                                <div class="product-info-stock-sku">
                                    <div class="stock available">
                                        <span class="label">Avaiability: </span><i class="fa fa-check-square-o" aria-hidden="true"></i> In Stock
                                    </div>
                                </div>
                            </div>

                            <div class="product-overview">
                                <div class="overview-label">Quick overview</div>
                                <div class="overview-content">
                                   {{strip_tags(@$product_details->description)}}
                                </div>
                            </div>

                            <div class="product-add-form">
                                <form>

                                    <div class="product-options-wrapper">

                                        <div class="form-group">
                                            <label for="forColor">Color <sup>*</sup> </label>
                                            <div class="control">
                                                <select id="forColor" class="form-control">
                                                    <option>---Select Option---</option>
                                                    <option>White</option>
                                                    <option>Red</option>
                                                    <option>Blue</option>
                                                    <option>Green</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="forSize">Size <sup>*</sup></label>
                                            <div class="control">
                                                <select id="forSize" class="form-control">
                                                    <option>---Select Option---</option>
                                                    <option>39</option>
                                                    <option>30</option>
                                                    <option>32</option>
                                                    <option>36</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="share">
                                        <img src="images/media/index1/share.png" alt="share">
                                    </div>

                                    <div class="product-options-bottom clearfix">
                                        <div class="form-group form-qty">
                                            <label for="forSize">Qty </label>
                                            <div class="control">
                                                <input type="text" class="form-control input-qty" value='1' id="qty1" name="qty1"  maxlength="12"  minlength="1">
                                                <button class="btn-number  qtyminus" data-type="minus" data-field="qty1">-</button>
                                                <button class="btn-number  qtyplus" data-type="plus" data-field="qty1">+</button>
                                            </div>
                                        </div>
                                        <div class="actions">
                                            <!-- 
                                                <button type="submit" title="Add to Cart" class="action btn-cart">
                                                    <span>Add to Cart</span>
                                                </button> -->
                                                <a href="{{ url('addItem/'.$product_details->id)  }}"><button title="Add to Cart" type="button" class="btn btn-cart"><span>Add to Cart</span></button></a>
                                            
                                                <a href="#" class="action btn-wishlist" title="Wish List">
                                                    <span>Wish List</span>
                                                </a>
                                                <!-- <a href="#" class="action btn-compare" title="Compare">
                                                    <span>Compare</span>
                                                </a> -->
                                            
                                        </div>
                                       
                                    </div>

                                </form>
                            </div>

                        </div><!-- detail- product -->

                    </div><!-- Main detail -->

                </div>
            </div>




                        <!-- product tab info -->
            <div class="container">
                <div class="product-info-detailed ">

                    <!-- Nav tabs -->
                    <ul class="nav nav-pills" role="tablist">
                        <li role="presentation" class="active"><a href="#description"  role="tab" data-toggle="tab">Description   </a></li>
                        <li role="presentation"><a href="#tags"  role="tab" data-toggle="tab">Tags </a></li>
                        <li role="presentation"><a href="#reviews"  role="tab" data-toggle="tab">Reviews (0)</a></li>
                        <li role="presentation"><a href="#additional"  role="tab" data-toggle="tab">Additional</a></li>
                        <li role="presentation"><a href="#tab-cust"  role="tab" data-toggle="tab">Custom Tab</a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="description">
                            <div class="block-title">Description</div>
                            <div class="block-content">
                                <p>Lorem ipsum dolor sit amet, an munere tibique consequat mel, congue albucius no qui, at everti meliore erroribus sea. Vero graeco cotidieque ea duo, in eirmod insolens interpretaris nam. Pro at nostrud percipit definitiones, eu tale porro cum. Sea ne accusata voluptatibus. Ne cum falli dolor voluptua, duo ei sonet choro facilisis, labores officiis torquatos cum ei.</p>
                                <br>
                                <p>Cum altera mandamus in, mea verear disputationi et. Vel regione discere ut, legere expetenda ut eos. In nam nibh invenire similique. Atqui mollis ea his, ius graecis accommodare te. No eam tota nostrum cotidieque. Est cu nibh clita. Sed an nominavi maiestatis, et duo corrumpit constituto, duo id rebum lucilius. Te eam iisque deseruisse, ipsum euismod his at. Eu putent habemus voluptua sit, sit cu rationibus scripserit, modus voluptaria ex per. Aeque dicam consulatu eu his, probatus neglegentur disputationi sit et. Ei nec ludus epicuri petentium, vis appetere maluisset ad. Et hinc exerci utinam cum. Sonet saperet nominavi est at, vel eu sumo tritani. Cum ex minim legere.</p>
                                <br>
                                <p>Eos cu utroque inermis invenire, eu pri alterum antiopam. Nisl erroribus definitiones nec an, ne mutat scripserit est. Eros veri ad pri. An soleat maluisset per. Has eu idque similique, et blandit scriptorem necessitatibus mea. Vis quaeque ocurreret ea.</p>
                            
                           
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="tags">
                            <div class="block-title">Tags</div>
                            <div class="block-content">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
                               
                           
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="reviews">
                            <div class="block-title">Reviews (0)</div>
                            <div class="block-content">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
                           
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="additional">
                            <div class="block-title">Additional</div>
                            <div class="block-content">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
                               <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
                               <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
                           
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="tab-cust">
                            <div class="block-title">Custom Tab</div>
                            <div class="block-content">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
                               
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
                            </div>
                        </div>
                    </div>
                </div>  
            </div><!-- product tab info -->


@if(count(@$related_product) !='0' )
            <!-- block-related product -->
            <div class="block-related container">
                <div class="block-title">
                    <strong class="title">RELATED PRODUCTS</strong>
                </div>
                <div class="block-content ">
                    <ol class="product-items owl-carousel " data-nav="true" data-dots="false" data-margin="30" data-responsive='{"0":{"items":1},"480":{"items":2},"600":{"items":3},"992":{"items":4}}'>
                       
@foreach(@$related_product as $value)
                          <li class=" product-item product-item-opt-0">
                            <div class="product-item-info">
                                <div class="product-item-photo">
                                    <a href="{{ url('/'.$value->related_products->link)}}" class="product-item-img">                                       
                                 <img src="{{ url('public/images/product/'.$value->related_products->image)}}">
                                   </a>
                                </div>
                                <div class="product-item-detail">
                                    <strong class="product-item-name"><a href="">{{ $value->related_products->name}}</a></strong>
                                    <div class="product-item-price">
                                        <span class="price">₹{{ $value->related_products->rate}}</span>
                                    </div>
                                    <div class="product-item-actions">
                                        <a href="{{ url('addItem/'.$value->related_products->id)  }}"><button type="button" class="btn btn-cart"><span>Add to Cart</span></button></a>
                                        <a href="{{url('wishlist/'.$value->related_products->id)}}" class="btn btn-wishlist"><span>wishlist</span></a>
                                        
                                        
                                    </div>
                                </div>
                            </div>
                              </li>                     
          @endforeach                      
                
                       
                    </ol>
                </div>
            </div><!-- block-related product -->

@endif


               <!-- end MAIN -->
             <!-- end about page  -->   
           @include('footer.footer')    
        </main>
    <!-- end MAIN -->    
    </div>      
</body>
</html>