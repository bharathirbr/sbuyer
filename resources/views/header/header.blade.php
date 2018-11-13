       <!-- HEADER -->
      
        <header class="site-header header-opt-1">

            <!-- header-top -->
            <div class="header-top">
                <div class="container">
                    <!-- hotline -->
                    <ul class="hotline nav-left" >
                        <li ><span><i class="fa fa-phone" aria-hidden="true"></i> + 0452 424 3616 </span></li>
                        <li ><span><i class="fa fa-envelope" aria-hidden="true"></i> Contact us today !</span></li>
                    </ul><!-- hotline -->                    
                    <!-- heder links -->
                    <ul class="links nav-right">                                    
                                <li>  @if (Session::has('user_id') =='')                                     
                                         <a href="{!! url('login'); !!}">  Login/Register </a>
                                         @else

                                       <a href=""> Welcome {{ @Session::get('user_id')[0]['first_name'] }}</a>
                                         @endif
                                    </li>
                        <li class="dropdown setting">
                            <a data-toggle="dropdown" role="button" href="#" class="dropdown-toggle "><span>Settings</span> <i aria-hidden="true" class="fa fa-angle-down"></i></a>
                            <div class="dropdown-menu  ">
                                <div class="switcher  switcher-language">
                                    <strong class="title">language</strong>
                                    <ul class="switcher-options ">                                      
                                        <li class="switcher-option">
                                            <a href="">
                                                 {!! HTML::image('public/images/flags/flag_english.png', 'flag', array('class' => 'switcher-flag')) !!}                                          
                                            </a>
                                        </li>
                                        
                                    </ul>
                                </div>
                                <div class="switcher  switcher-currency">
                                    <strong class="title">SELECT CURRENCIES</strong>
                                    <ul class="switcher-options ">
                                        <li class="switcher-option switcher-active">
                                            <a href="">
                                                <i class="fa fa-inr" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                       <!--  <li class="switcher-option switcher-active">
                                            <a href="#">
                                                <i class="fa fa-eur" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <li class="switcher-option">
                                            <a href="#">
                                                <i class="fa fa-gbp" aria-hidden="true"></i>
                                            </a>
                                        </li> -->
                                       
                                    </ul>
                                </div>
                                <ul class="account">
                                    <li><a href="">Wishlist</a></li>
                                    <li><a href="{!! url('myaccount') !!}">My Account</a></li>
                                    <li><a href="{!! url('cart')!!}">Your Cart</a></li>
                                    <li><a href="">Compare</a></li>
                                    <li>
                                        @if(session::has('user_id') =='') <a href="{!! url('login'); !!}">Login/Register </a> @else <a href="{!! url('logout') !!}">Logout</a>@endif
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li><a href="" >Support</a></li>
                        <li><a href="">Services </a></li>
                    </ul><!-- heder links -->

                </div>
            </div> <!-- header-top -->

            <!-- header-content -->
            <div class="header-content">
                <div class="container">

                    <div class="row">

                        <div class="col-md-3 nav-left">
                            <!-- logo -->
                            <strong class="logo">
                                <a href="{!! url('') !!}"> {!! HTML::image('public/images/media/index1/logo.png', 'logo', array('class' => '')) !!} </a>                     
                                       
                            </strong><!-- logo -->
                        </div>

                        <div class="col-md-6 nav-mind">

                            <!-- block search -->
                            <div class="block-search">
                                <div class="block-title">
                                    <span>Search</span>
                                </div>
                                <div class="block-content">
                                    <div class="categori-search  ">
                                        <select data-placeholder="All Categories" class="categori-search-option">
                                            <option>All Categories</option>
                                            <option>Fashion</option>
                                            <option>Tops Blouses</option>
                                            <option>Clothing</option>
                                            <option>Furniture</option>
                                            <option>Bathtime Goods</option>
                                            <option>Shower Curtains</option>
                                        </select>
                                    </div>
                                    <div class="form-search">
                                        <form>
                                            <div class="box-group">
                                                <input type="text" class="form-control" placeholder="Search here...">
                                                <button class="btn btn-search" type="button"><span>search</span></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div><!-- block search -->

                        </div>

                        <div class="col-md-3 nav-right">

                            

                            <!-- block mini cart -->
                            <div class="block-minicart dropdown">
                                <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                    <span class="cart-icon"></span>
                                    <span class="cart-text">cart</span>
                                    <span class="counter qty">
                                        <span class="counter-number">{{ @Cart::count() }} </span>
                                        <span class="counter-label">{{ @Cart::count() }} <span>Item(s)</span></span>
                                        <span class="counter-price">₹{{@Cart::total()}}</span>
                                    </span>
                                </a>
                                <div class="dropdown-menu">
                                    <form>
                                        <div  class="minicart-content-wrapper" >
                                            <div class="subtitle">
                                                You have {{ @Cart::count() }} item(s) in your cart
                                            </div>
                                            <div class="minicart-items-wrapper">
                                                <ol class="minicart-items">

        @foreach(Cart::content() as $row)
                                                    <li class="product-item">
                                                         <a href="" class="item-photo"> 
                                                         <img max-width="50px;" height="50px;" src="{{ url('public/images/product/'.$row->options->image) }}" alt="{{$row->options->image_alt}}"></a>
                                                        <div class="product-item-details">
                                                            <strong class="product-item-name">
                                                                <a href=""><h6>{{@$row->name}}</h6></a>
                                                            </strong>
                                                            <div class="product-item-qty">
                                                                <span class="label">Quantity:</span ><span class="number">{{@$row->qty}}</span>
                                                            </div>
                                                            <div class="product-item-price">
                                                                <span class="price"> ₹{{@$row->price}}</span>
                                                            </div>
                                                            <div class="product-item-actions">
                                                                <a class="action delete" href="{{ url('removeItem/'.$row->rowId) }}" title="Remove item">
                                                                    <span>Remove</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </li>
       @endforeach

                                                </ol>
                                            </div>
                                            <div class="subtotal">
                                                <span class="label">Total</span>
                                                <span class="price">₹{{@Cart::subtotal()}}</span>
                                            </div>
                                            <div class="actions">
                                                <a class="btn btn-viewcart" href="{!! url('/')!!}">
                                                    <span>Shopping bag</span>
                                                </a>
                                                <a href="{!! url('cart')!!}"> <button class="btn btn-checkout" type="button" title="Check Out">
                                                  <span> Your Cart </span> 
                                                </button></a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- block mini cart -->
                            <!-- link  wishlish-->
                            <a href="{{url('wishlist')}}" class="link-wishlist"><span>wishlish</span></a>
                            <!-- link  wishlish-->
                        </div>

                    </div>                    

                </div>
            </div><!-- header-content -->           

            <!-- header-nav -->
            <div class="header-nav mid-header  @if(count(@$static_pages_seo) > 0) header_staticpage @endif">
                <div class="container">
                    <div class="box-header-nav">

                        <span data-action="toggle-nav-cat" class="nav-toggle-menu nav-toggle-cat"><span>Categories</span><i aria-hidden="true" class="fa fa-bars"></i></span>

                        <!-- block categori -->
                        <div class="block-nav-categori">
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
                                                    <!-- <ul>
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
                                </ul>

                                <div class="view-all-categori">
                                    <!-- <a href="{{url('allcategories')}}" class="open-cate btn-view-all">All Categories</a> -->
                                    <a href="{{url('allcategories')}}">All Categories</a>
                                </div>
                            </div>
                            
                        </div><!-- block categori -->

                        <!-- menu -->
                        <div class="block-nav-menu">
                            <ul class="ui-menu">
                              <li><a href="{!! url('')!!}">Home</a></li>
                                    <li class="parent parent-megamenu">
                                    <a href="">CATEGORIES</a>
                                    <span class="toggle-submenu"></span>
                                    <div class="megamenu">
                                        <div class="horizontal-menu">
                                            <ul>                                                
                                                @if (count(@$cat) != 0)
                                                @foreach(@$cat as $key => $value)
                                                <li class="col-md-4">
                                                    <ul class="list-submenu">
                                                        <li><a href="{{ url('/'.@$value->category_link) }}"><h5>{!! @$value->category_name!!}</h5></a></li>
                                                          <!--  @if(count(@$subcat) != 0)
                                                           @foreach(@$subcat as $valuee)
                                                           <li><a href="Grid_Products_RightSideBar.html">{{ @$valuee->category->category_name}}</a></li>
                                                           @endforeach   
                                                           @endif    -->                                             
                                                    </ul>
                                                </li>
                                                @endforeach
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </li>

                        @if(count(@$combo_menu) != 0)
                                <li class="parent">
                                    <a href="{{url('/')}}">Combo</a>
                                    <span class="toggle-submenu"></span>
                                        <ul class="submenu"> 
                                          @foreach(@$combo_menu as $key=>$combo_me)

                                              @foreach($combo_me->subcategory as $combo)
                                               <li><a href="{{ url('/'.$combo_me->category_link.'/'.$combo->link) }}">{{ $combo->subcategory }}</a></li>
                                              @endforeach

                                          @endforeach 
                                        </ul>
                                </li>
                       @endif

                       @if(count(@$nutrition_menu) != 0 )
                               <li class="parent">
                                    <a href="{{url('/')}}">NUTRITION</a>
                                    <span class="toggle-submenu"></span>
                                        <ul class="submenu"> 
                                    @foreach(@$nutrition_menu as $key=>$nutrimenu)
                                          @foreach($nutrimenu->subcategory as $nutmenu)
                                           <li><a href="{{ url('/'.$nutrimenu->category_link.'/'.$nutmenu->link) }}">{{ $nutmenu->subcategory }}</a></li>
                                          @endforeach
                                    @endforeach 
                                        </ul>
                                </li>
                       @endif  
                       @if(count(@$gifts_menu) != 0 )
                                <li class="parent">
                                    <a href="{{url('/')}}">GIFTS</a>
                                    <span class="toggle-submenu"></span>
                                        <ul class="submenu"> 
                                          @foreach(@$gifts_menu as $key=>$gifts_menus)
                                          @foreach($gifts_menus->subcategory as $gifts)
                                           <li><a href="{{ url('/'.$gifts_menus->category_link.'/'.$gifts->link) }}">{{ $gifts->subcategory }}</a></li>
                                          @endforeach
                                          @endforeach 
                                        </ul>
                                </li>
                       @endif

                                <li><a href="{!! url('faq')!!}">FAQ</a></li>
                                <li><a href="{!! url('blog') !!}">BLOGS</a></li>
                                <li ><a href="{!! url('contact') !!}" class="active_menu">CONTACT</a></li> 
                            </ul>
                        </div><!-- menu -->

                        <span data-action="toggle-nav" class="nav-toggle-menu"><span>Menu</span><i aria-hidden="true" class="fa fa-bars"></i></span>

                        <div class="block-minicart dropdown ">
                            <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                <span class="cart-icon"></span>
                            </a>
                            <div class="dropdown-menu">
                                <form>
                                       <div  class="minicart-content-wrapper" >
                                            <div class="subtitle">
                                                You have {{ @Cart::count() }} item(s) in your cart
                                            </div>
                                            <div class="minicart-items-wrapper">
                                                <ol class="minicart-items">

        @foreach(Cart::content() as $row)
                                                    <li class="product-item">
                                                         <a href="" class="item-photo"> 
                                                         <img max-width="50px;" height="50px;" src="{{ url('public/images/product/'.$row->options->image) }}" alt="{{$row->options->image_alt}}"></a>
                                                        <div class="product-item-details">
                                                            <strong class="product-item-name">
                                                                <a href=""><h6>{{@$row->name}}</h6></a>
                                                            </strong>                                                       
                                                            <div class="product-item-qty">
                                                                <span class="label">Quantity:</span ><span class="number">{{@$row->qty}}</span>
                                                            </div>
                                                            <div class="product-item-price">
                                                                <span class="price"> ₹{{@$row->price}}</span>
                                                            </div>
                                                            <div class="product-item-actions">
                                                                <a class="action delete" href="{{ url('removeItem/'.$row->rowId) }}" title="Remove item">
                                                                    <span>Remove</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </li>
       @endforeach

                                                </ol>
                                            </div>
                                            <div class="subtotal">
                                                <span class="label">Total</span>
                                                <span class="price">₹{{@Cart::subtotal()}}</span>
                                            </div>
                                            <div class="actions">
                                                <a class="btn btn-viewcart" href="{!! url('/')!!}">
                                                    <span>Shopping bag</span>
                                                </a>
                                                <a href="{!! url('cart')!!}"> <button class="btn btn-checkout" type="button" title="Check Out">
                                                  <span>Your Cart </span> 
                                                </button></a>
                                            </div>
                                        </div>
                                    
                                </form>
                            </div>
                        </div>

                        <div class="block-search">
                            <div class="block-title">
                                <span>Search</span>
                            </div>
                            <div class="block-content">
                                <div class="form-search">
                                    <form>
                                        <div class="box-group">
                                            <input type="text" class="form-control" placeholder="Search here...">
                                            <button class="btn btn-search" type="button"><span>search</span></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="dropdown setting">
                            <a data-toggle="dropdown" role="button" href="#" class="dropdown-toggle ">
                                <span>Settings</span>
                                @if (Session::has('user_id') =='') 
                                <i aria-hidden="true" class="fa fa-user">                                    
                                </i>                                                                                                             
                                @else 
                                       @if(Session::get('user_id')[0]['image'] == 'null')
                                       <img src="{{ url('public/images/noimage/sbuyer.jpg') }}" width="50px" height="53px">              
                                       @else
                                        <img src="{{ comman_image::images('userimages/'.@Session::get('user_id')[0]['image'],'null') }}" width="50px" height="55px">                                      
                                       @endif
                                @endif

                            </a>
                            <div class="dropdown-menu  ">
                                <div class="switcher  switcher-language">
                                    <strong class="title">Select language</strong>
                                    <ul class="switcher-options ">
                                        <li class="switcher-option">
                                            <a href="#">
                                                 {!! HTML::image('public/images/flags/flag_french.png', 'flag_french', array('class' => 'switcher-flag')) !!}     
                                                
                                            </a>
                                        </li>
                                        <li class="switcher-option">
                                            <a href="#">
                                                <!-- <img class="switcher-flag" alt="flag" src="images/flags/flag_germany.png"> -->
                                                 {!! HTML::image('public/images/flags/flag_germany.png', 'switcher-flag', array('class' => 'flag_germany')) !!}
                                            </a>
                                        </li>
                                        <li class="switcher-option">
                                            <a href="#">                             

                                                 {!! HTML::image('public/images/flags/flag_english.png', 'flag', array('class' => 'switcher-flag')) !!} 
                                            </a>
                                        </li>
                                        <li class="switcher-option switcher-active">
                                            <a href="#">
                                                <!-- <img class="switcher-flag" alt="flag" src="images/flags/flag_spain.png"> -->
                                                {!! HTML::image('public/images/flags/flag_spain.png', 'flag', array('class' => 'switcher-flag')) !!} 
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="switcher  switcher-currency">
                                    <strong class="title">SELECT CURRENCIES</strong>
                                    <ul class="switcher-options ">
                                        <li class="switcher-option">
                                            <a href="#">
                                                <i class="fa fa-usd" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <li class="switcher-option switcher-active">
                                            <a href="#">
                                                <i class="fa fa-eur" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <li class="switcher-option">
                                            <a href="#">
                                                <i class="fa fa-gbp" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                       
                                    </ul>
                                </div>
                                <ul class="account">
                                    <li><a href="">Wishlist</a></li>
                                    <li><a href="{!! url('myaccount') !!}">My Account</a></li>
                                    <li><a href="{!! url('cart')!!}">Your Cart</a></li>
                                    <li><a href="">Compare</a></li>
                                    <li>  @if (Session::has('user_id') !='') 
                                         <a href="{!! url('logout'); !!}"> Logout </a>
                                         @else
                                       <a href="{!! url('login'); !!}">  Login/Register </a>
                                         @endif
                                    </li>
                                </ul>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div><!-- header-nav -->

        </header>

        <!-- end HEADER -->       

