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
           <div class="columns container">           


                <!-- Block  Breadcrumb-->
                        
                <ol class="breadcrumb no-hide">
                    <li><a href="#">Home    </a></li>                    
                    <li class="active"> {{ @Request::segment(1) }}   </li>
                </ol><!-- Block  Breadcrumb-->

                <div class="row">

                    <!-- Sidebar -->
                    <div class="col-lg-3 col-md-3 col-sidebar">
                        <!-- block filter products -->
                        <div id="layered-filter-block" class="block-sidebar block-filter no-hide">
                            <div class="close-filter-products"><i class="fa fa-times" aria-hidden="true"></i></div>
                           
                            <div class="block-content">

                                <!-- Filter Item  categori-->
                                <div class="filter-options-item filter-options-categori">
                               <div class="filter-options-title">My ACCOUNT</div>
                                     <div class="filter-options-content">
                                            <ol class="items">
                                               <!--  <li class="item ">
                                                   <a href="{!! url('deliveryddresses') !!}"> <label>
                                                        <span>Personal Details  </span>
                                                    </label></a>
                                                </li> -->
                                                <li class="item ">
                                                   <a href="{!! url('myaccount') !!}"> <label>
                                                       <span>My Page</span>
                                                    </label></a>
                                                </li>
                                                <li class="item ">
                                                    <a href="{!! url('editprofile') !!}"><label>
                                                     <span>Edit Profile</span>
                                                    </label></a>
                                                </li>
                                                <li class="item ">
                                                    <a href="{!! url('deliveryddresses') !!}"><label>
                                                       <span>Delivery Addresses</span>
                                                    </label></a>
                                                </li>
                                                <li class="item ">
                                                    <a href="{!! url('password/'.$user_data[0]->id) !!}"><label>
                                                     <span>Change Password</span>
                                                    </label></a>
                                                </li>
                                                <li class="item ">
                                                   <a href="{!! url('emailaddress/'.$user_data[0]->id) !!}"> <label>
                                                       <span>Email Addresses</span>
                                                    </label></a>
                                                </li>
                                                 
                                            </ol>
                                    </div>
                                </div><!-- Filter Item  categori-->

                              
                                <!-- Filter Item  size-->
                                <div class="filter-options-item filter-options-size">
                                    <div class="filter-options-title">SHOP FROM</div>
                                    <div class="filter-options-content">
                                        <ol class="items">
                                            <li class="item "> <a href="{!! url('smartbasket/'.$user_data[0]->id) !!}">
                                                <label>
                                                    <span>Smart Basket</span>
                                                </label> </a>
                                            </li>
                                            <li class="item ">
                                                <a href="{!! url('shoppinglist/'.$user_data[0]->id) !!}">
                                                    <label>
                                                       <span>Shopping List</span>
                                                   </label>
                                                </a>
                                            </li>
                                            <li class="item ">
                                                <a href="{!! url('pastorder/'.$user_data[0]->id) !!}"><label>
                                                   <span>Past Order</span>
                                                </label></a>

                                            </li>
                                            <li class="item ">
                                               <a href="{!! url('recommended/'.$user_data[0]->id) !!}">
                                                <label>
                                                    <span>Recommended Products</span>
                                                </label>
                                               </a>
                                            </li>  

                                            <li class="item ">
                                               <a href="{!! url('myorder/'.$user_data[0]->id) !!}">
                                                <label>
                                                    <span>My Orders</span>
                                                </label>
                                               </a>
                                            </li> 
                                            <li class="item ">            
                                               <a href="{!! url('customerservice/'.$user_data[0]->id) !!}">
                                                <label>
                                                    <span>Customer Service</span>
                                                </label>
                                               </a>
                                            </li>               
                                            
                                        </ol>
                                    </div>
                                    <!--  <div class="filter-options-item filter-options-manufacture">
                                        <div class="filter-options-title">
                                             <h5><a href="{!! url('myorder/'.$user_data[0]->id) !!}">My Orders</a></h5>
                                        </div>

                                    </div>
                                    <div class="filter-options-item filter-options-manufacture">
                                        <div class="filter-options-title">
                                            <a href="{!! url('customerservice/'.$user_data[0]->id) !!}"><h5>Customer Service</h5></a>
                                        </div>

                                    </div> -->
                                    <!-- <div class="filter-options-item filter-options-manufacture">
                                        <div class="filter-options-title">
                                            <a href=""><h5>My Wallet</h5></a>
                                        </div>

                                    </div>
                                    <div class="filter-options-item filter-options-manufacture">
                                        <div class="filter-options-title">
                                            <a href=""><h5>My Gift Cards</h5></a>
                                        </div>

                                    </div>
                                    <div class="filter-options-item filter-options-manufacture">
                                        <div class="filter-options-title">
                                            <a href=""><h5>Third-Party Payment Wallets</h5></a>
                                        </div>

                                    </div>
                                    <div class="filter-options-item filter-options-manufacture">
                                        <div class="filter-options-title">
                                            <a href=""><h5>Refer & Earn</h5></a>
                                        </div>

                                    </div>
                                    <div class="filter-options-item filter-options-manufacture">
                                        <div class="filter-options-title">
                                            <a href=""><h5>Alerts & Notification</h5></a>
                                        </div>

                                    </div> -->
                                </div>
                                <!-- Filter Item  size-->

                            </div>
                        </div><!-- Filter -->
                    

                    

                    </div><!-- Sidebar -->

                    <!-- Main Content -->
                    <div class="col-lg-9 col-md-9  col-main">                

                            <h3 class="cate-title">
                                     @if(@Request::segment(1) == 'myaccount') Myaccount Details @endif 
                                     @if(@Request::segment(1) == 'editprofile') Edit Profile @endif 
                                     @if(@Request::segment(1) == 'emailaddress') Add Email @endif 
                                     @if(@Request::segment(1) == 'password') Change Password @endif 
                                     @if(@Request::segment(1) == 'deliveryddresses') Deliver Addresses @endif 
                                    
                                     @if(@Request::segment(1) == 'smartbasket') Smart Basket @endif 
                                     @if(@Request::segment(1) == 'shopinglist') Shoping list @endif 
                                     @if(@Request::segment(1) == 'pastorder') Past Orders @endif 
                                     @if(@Request::segment(1) == 'recommended') Recommended @endif 
                                     @if(@Request::segment(1) == 'myorder') My Orders @endif 
                                     @if(@Request::segment(1) == 'customerservice') Customer Services @endif 

                               </h3>
                                     <!-- List Products -->
                        <div class="products  products-list">
                            <ol class="product-items row">
                                <li class="col-sm-12 product-item ">
                                    <div class="product-item-opt-2">
                                        <div class="product-item-info">                                           
                                            <div class="product-item-detail">                                         
                                                <div class="product-item-des">
                            <div class="flash-message">
                                @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                                @if(Session::has($msg))
                                <p class="alert alert-{{ $msg }}">{{ Session::get($msg) }}</p>
                                @endif
                                @endforeach
                            </div>
                                                @if(@Request::segment(1) == 'myaccount')                                               
                                                       <p> My Account deatils Here</p>
                                                 @endif 

                                                    @if(@Request::segment(1) == 'editprofile')                                               
                                                        <form name="edit_profile_form" id="edit_profile_form"  action="{!! url('editprofile'); !!}" method="post" enctype="multipart/form-data" class="edit_profile_form">
                                                            {{ csrf_field() }}
                                                            <div class="form-group">
                                                               <label>First Name : </label> 
                                                                <input type="text"  name="first_name" value="{{ @$user_data[0]->first_name }}" class="form-control"  placeholder=" Your first Name *"/>
                                                                 @if (Session::has('register_form')) 
                                                                 @if (@$errors->has('first_name'))
                                                                     <label class="error">{{ @$errors->first('first_name') }}</label>
                                                                  @endif
                                                                 @endif
                                                           </div>                                                          

                                                            <div class="form-group">
                                                             <label> Last Name : </label>
                                                                <input type="text"  name="last_name" value="{{ @$user_data[0]->last_name }}" class="form-control"   placeholder=" Your last Name *"/>
                                                                @if (@$errors->has('last_name'))
                                                                     <label class="error">{{ @$errors->first('last_name') }}</label>
                                                                @endif                                                             
                                                           </div>

                                                           <div class="form-group">
                                                             <label> User Name : </label>
                                                                <input type="text"  name="user_name" value="{{ @$user_data[0]->user_name }}" class="form-control"   placeholder=" Your User Name *"/>
                                                                @if (@$errors->has('user_name'))
                                                                     <label class="error">{{ @$errors->first('user_name') }}</label>
                                                                @endif                                                               
                                                           </div>

                                                             <div class="form-group">
                                                                 <label> Email : </label>
                                                                <input type="text"  value="{{ @$user_data[0]->email }}" name="email" class="form-control" placeholder=" Your email *"/>
                                                                @if (Session::has('register_form')) 
                                                                 @if (@$errors->has('email'))
                                                                     <label class="error">{{ @$errors->first('email') }}</label>
                                                                @endif
                                                                @endif
                                                            </div>

                                                            <div class="form-group">
                                                             <label> DoB : </label>
                                                                <input type="text"  name="dob" value=" {{ @$user_data[0]->dob }}" class="form-control"   id="datepicker" placeholder=" Your dob *"/>
                                                                @if (@$errors->has('dob'))
                                                                     <label class="error">{{ @$errors->first('dob') }}</label>
                                                                @endif                                                             
                                                           </div>


                                                           <div class="form-group">
                                                             <label> Phone Number : </label>
                                                                <input type="text"  name="phone" value="{{ @$user_data[0]->phone }}" class="form-control" placeholder=" (+91) Phone Number *"/>                                                       
                                                                 @if (@$errors->has('phone'))
                                                                     <label class="error">{{ @$errors->first('phone') }}</label>                                                               
                                                                @endif
                                                           </div>

                                                           <div class="form-group">
                                                            <label> Landline Number : </label>
                                                            <input type="text"  name="land_line" value="{{ @$user_data[0]->land_line }}" class="form-control" placeholder=" Land line Number *"/>
                                                             
                                                                 @if (@$errors->has('land_line'))
                                                                     <label class="error">{{ @$errors->first('land_line') }}</label>                                                          
                                                                @endif
                                                           </div>   

                                                           <div class="form-group">
                                                             <label> Address : </label>
                                                            <textarea placeholder="Address *" rows="2" name="address" class="form-control" id="address" >{{ @$user_data[0]->address }} 
                                                             </textarea>
                                                           
                                                             @if (@$errors->has('address'))
                                                                 <label class="error">{{ @$errors->first('address') }}</label>
                                                              @endif
                                                           </div> 
                                                           <div class="form-group">
                                                             <label> Profile Image : </label>
                                                             <span><img href="{{ comman_image::images('userimages/1_1509714213.png','null') }}" ></span>
                                                           </div> 

                                                          

                                                           <div class="form-group">
                                                             {!! Form::file('photo', array('class' => 'form-control')) !!}
                                                           </div>  

                                                                                                                 <!-- show captcha image html -->                                
                                                        <button type="submit" class="btn btn-inline">Update</button>
                                                      </form>
                                                 @endif

                                                 @if(@Request::segment(1) == 'emailaddress')                                               
                                                <form name="profile_email_form" id="profile_email_form"  action="{!! url('emailaddress/'.$user_data[0]->id); !!}" method="post" class="profile_email_form">
                                                            {{ csrf_field() }}

                                                           <div class="form-group">
                                                               <label>Primary Email: </label>
                                                                <input type="text"  name="email" value="{{ @$user_data[0]->email }}" class="form-control" readonly/>                        
                                                           </div>  
                                                           <div class="form-group">
                                                               <label>Alter Email : </label>
                                                                <input type="text"  name="alter_email" value="{{ @$user_data[0]->email1 }}" class="form-control"  placeholder="Enter Your Alter Email"/ @if (@$errors->has('alter_email'))
                                                                 <label class="error">{{ @$errors->first('alter_email') }}</label>
                                                                @endif                   
                                                           </div> </br>
                                                       <!--      <div class="form-group">
                                                               <label>Alter Email 2: </label>
                                                                <input type="text"  name="email2" value="{{ @$user_data[0]->email2 }}" class="form-control"  placeholder="Your Alter Email2"/> @if (@$errors->has('email2'))
                                                                 <label class="error">{{ @$errors->first('email2') }}</label>
                                                                @endif                      
                                                           </div> 
                                                            <div class="form-group">
                                                               <label>Alter Email 3: </label>
                                                                <input type="text"  name="email3" value="{{ @$user_data[0]->email3 }}" class="form-control"  placeholder="Your Alter Email3"/> @if (@$errors->has('email3'))
                                                                 <label class="error">{{ @$errors->first('email3') }}</label>
                                                                @endif                    
                                                           </div>  -->

                                                        <button type="submit" class="btn btn-inline">Update</button>
                                                      </form>
                                                 @endif    

                                                 @if(@Request::segment(1) == 'password')                                               
                                                        <form name="profile_pass_edit" id="profile_pass_edit"  action="{!! url('password/'.$user_data[0]->id); !!}" method="post" class="profile_pass_edit">
                                                            {{ csrf_field() }}

                                                         <div class="form-group">
                                                               <label>Old Password : </label>
                                                                <input type="text"  name="oldpassword" value="{{ old('oldpassword') }}" class="form-control"  placeholder="Your Old password"/>             
                                                                 @if (@$errors->has('oldpassword'))
                                                                     <label class="error">{{ @$errors->first('oldpassword') }}</label>
                                                                  @endif                                                                
                                                           </div> 

                                                            <div class="form-group">
                                                               <label>New Password : </label>
                                                                <input type="password"  name="password" id="password" value="{{ old('password') }}" class="form-control"  placeholder="Your New password"/>             
                                                                 @if (@$errors->has('password'))
                                                                     <label class="error">{{ @$errors->first('password') }}</label>
                                                                  @endif                                                                
                                                           </div> 

                                                          <div class="form-group">
                                                               <label>Confirm Password : </label>
                                                                <input type="password"  name="passworda" value="{{ old('passworda') }}" class="form-control"  placeholder="Your Confirm password"/>             
                                                                 @if (@$errors->has('passworda'))
                                                                     <label class="error">{{ @$errors->first('passworda') }}</label>
                                                                  @endif                                                                
                                                          </div> 

                                                            <!-- show captcha image html -->                                
                                                        <button type="submit" class="btn btn-inline">Update Password</button>
                                                      </form>
                                                 @endif  

                                                  @if(@Request::segment(1) == 'deliveryddresses')                                               
                                                        <div class="form-group">
                                                             <label> Delivery Address : </label>
                                                            <textarea placeholder="My Delivery Address *" rows="4"  class="form-control" id="address" readonly>{{ @$user_data[0]->address }}</textarea>
                                                            </div>                                                            
                                                        </div> 
                                                 @endif    

                                                  @if(@Request::segment(1) == 'smartbasket')                                               
                                                        <div class="form-group">
                                                             <label> Smart Basket : </label>
                                                            <textarea placeholder="My Smart Basket  *" rows="4"  class="form-control" id="address" readonly>{{ old('address') }}</textarea>
                                                            </div>
                                                             @if (@$errors->has('address'))
                                                                 <label class="error">{{ @$errors->first('address') }}</label>
                                                              @endif
                                                        </div> 
                                                 @endif
                                                  @if(@Request::segment(1) == 'shoppinglist')
                                                    <div class="form-group">        
                                                    <label> Quick Shop : </label>                                            
                                                                                                                                  <!-- Block deals of -->

                                                     <div class="block-deals-of block-deals-of-opt3">
                                                        <div class="block-title ">
                                                           <!--  <span class="title">Quick Shop</span> -->
                                                           <!--  <div class="deals-of-countdown">
                                                                <span class="title">End In</span>
                                                                <div class="count-down-time" data-countdown="2016/8/27"></div>
                                                            </div> -->
                                                        </div>
                                                        <div class="block-content">
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
                                                                            <a class="product-item-img" href="">                                            
                                                                                 {!! HTML::image('public/images/media/index1/dal1.jpg', 'product name', array('class' => '')) !!}
                                                                            </a>
                                                                        </div>
                                                                        <div class="product-item-detail">
                                                                            <strong class="product-item-name"><a href="">Washing Machine Pro </a></strong>
                                                                            <div class="product-item-price">
                                                                                <span class="price">$150.00</span>
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
                                                                                 {!! HTML::image('public/images/media/index1/dal2.jpg', 'product name', array('class' => '')) !!}
                                                                            </a>
                                                                        </div>
                                                                        <div class="product-item-detail">
                                                                            <strong class="product-item-name"><a href="">Washing Machine Pro</a></strong>
                                                                            <div class="product-item-price">
                                                                                <span class="price">$150.00</span>
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
                                                                                {!! HTML::image('public/images/media/index1/dal3.jpg', 'product name', array('class' => '')) !!}
                                                                            </a>
                                                                        </div>
                                                                        <div class="product-item-detail">
                                                                            <strong class="product-item-name"><a href="">Washing Machine Pro</a></strong>
                                                                            <div class="product-item-price">
                                                                                <span class="price">$150.00</span>
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
                                                                                {!! HTML::image('public/images/media/index1/dalsa.jpg', 'product name', array('class' => '')) !!}
                                                                            </a>
                                                                        </div>
                                                                        <div class="product-item-detail">
                                                                            <strong class="product-item-name"><a href="">Washing Machine Pro</a></strong>
                                                                            <div class="product-item-price">
                                                                                <span class="price">$150.00</span>
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
                                                                                {!! HTML::image('public/images/media/index1/dal1.jpg', 'product name', array('class' => '')) !!}
                                                                            </a>
                                                                        </div>
                                                                        <div class="product-item-detail">
                                                                            <strong class="product-item-name"><a href="">Washing Machine Pro</a></strong>
                                                                            <div class="product-item-price">
                                                                                <span class="price">$150.00</span>
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
                                                                                {!! HTML::image('public/images/media/index1/dal2.jpg', 'product name', array('class' => '')) !!}
                                                                            </a>
                                                                        </div>
                                                                        <div class="product-item-detail">
                                                                            <strong class="product-item-name"><a href="">Washing Machine Pro</a></strong>
                                                                            <div class="product-item-price">
                                                                                <span class="price">$150.00</span>
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
                                                                                {!! HTML::image('public/images/media/index1/dal3.jpg', 'product name', array('class' => '')) !!}
                                                                            </a>
                                                                        </div>
                                                                        <div class="product-item-detail">
                                                                            <strong class="product-item-name"><a href="">Washing Machine Pro</a></strong>
                                                                            <div class="product-item-price">
                                                                                <span class="price">$150.00</span>
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
                                                </div> <!-- Block deals of -->                                                       
                                                 @endif



                                                  @if(@Request::segment(1) == 'pastorder')                                               
                                                        <div class="form-group">
                                                             <label> Past Order : </label>
                                                            <textarea placeholder="My Pastorder *" rows="4"  class="form-control" id="address" readonly>{{ old('address') }}</textarea>
                                                            </div>
                                                             @if (@$errors->has('address'))
                                                                 <label class="error">{{ @$errors->first('address') }}</label>
                                                              @endif
                                                        </div> 
                                                 @endif



                                                  @if(@Request::segment(1) == 'recommended')                                               
                                                      <div class="form-group">
                                                                                    <!-- Block deals of -->
           
                                                    <div class="block-deals-of block-deals-of-opt3">
                                                        <div class="block-title ">
                                                           <!--  <span class="title">Recommendation</span> -->
                                                           <!--  <div class="deals-of-countdown">
                                                                <span class="title">End In</span>
                                                                <div class="count-down-time" data-countdown="2016/8/27"></div>
                                                            </div> -->
                                                        </div>
                                                        <div class="block-content">
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
                                                                            <a class="product-item-img" href="">                                            
                                                                                 {!! HTML::image('public/images/media/index1/dal1.jpg', 'product name', array('class' => '')) !!}
                                                                            </a>
                                                                        </div>
                                                                        <div class="product-item-detail">
                                                                            <strong class="product-item-name"><a href="">Washing Machine Pro </a></strong>
                                                                            <div class="product-item-price">
                                                                                <span class="price">$150.00</span>
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
                                                                                 {!! HTML::image('public/images/media/index1/dal2.jpg', 'product name', array('class' => '')) !!}
                                                                            </a>
                                                                        </div>
                                                                        <div class="product-item-detail">
                                                                            <strong class="product-item-name"><a href="">Washing Machine Pro</a></strong>
                                                                            <div class="product-item-price">
                                                                                <span class="price">$150.00</span>
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
                                                                                {!! HTML::image('public/images/media/index1/dal3.jpg', 'product name', array('class' => '')) !!}
                                                                            </a>
                                                                        </div>
                                                                        <div class="product-item-detail">
                                                                            <strong class="product-item-name"><a href="">Washing Machine Pro</a></strong>
                                                                            <div class="product-item-price">
                                                                                <span class="price">$150.00</span>
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
                                                                                {!! HTML::image('public/images/media/index1/dalsa.jpg', 'product name', array('class' => '')) !!}
                                                                            </a>
                                                                        </div>
                                                                        <div class="product-item-detail">
                                                                            <strong class="product-item-name"><a href="">Washing Machine Pro</a></strong>
                                                                            <div class="product-item-price">
                                                                                <span class="price">$150.00</span>
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
                                                                                {!! HTML::image('public/images/media/index1/dal1.jpg', 'product name', array('class' => '')) !!}
                                                                            </a>
                                                                        </div>
                                                                        <div class="product-item-detail">
                                                                            <strong class="product-item-name"><a href="">Washing Machine Pro</a></strong>
                                                                            <div class="product-item-price">
                                                                                <span class="price">$150.00</span>
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
                                                                                {!! HTML::image('public/images/media/index1/dal2.jpg', 'product name', array('class' => '')) !!}
                                                                            </a>
                                                                        </div>
                                                                        <div class="product-item-detail">
                                                                            <strong class="product-item-name"><a href="">Washing Machine Pro</a></strong>
                                                                            <div class="product-item-price">
                                                                                <span class="price">$150.00</span>
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
                                                                                {!! HTML::image('public/images/media/index1/dal3.jpg', 'product name', array('class' => '')) !!}
                                                                            </a>
                                                                        </div>
                                                                        <div class="product-item-detail">
                                                                            <strong class="product-item-name"><a href="">Washing Machine Pro</a></strong>
                                                                            <div class="product-item-price">
                                                                                <span class="price">$150.00</span>
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
                                                </div> <!-- Block deals of -->   
                                                 @endif 



                                                 @if(@Request::segment(1) == 'myorder')                                               
                                                        <div class="form-group">
                                                             <label> My Orders : </label>
                                                            <textarea placeholder="My Recommended *" rows="4"  class="form-control" id="address" readonly>{{ old('address') }}</textarea>
                                                            </div>
                                                             @if (@$errors->has('address'))
                                                                 <label class="error">{{ @$errors->first('address') }}</label>
                                                              @endif
                                                        </div> 
                                                 @endif


                                                 @if(@Request::segment(1) == 'customerservice')  
                                                  <form name="feedback_form" id="feedback_form"  action="{!! url('customerservice/'.request::segment(2)); !!}" method="post" class="feedback_form">
                                                            {{ csrf_field() }}                                             
                                                        <div class="form-group">
                                                             <label> Feedback Form : </label>
                                                            <textarea placeholder="Enter Feedback*" rows="4"  class="form-control" name="feedback" id="feedback"></textarea>
                                                            </div>                                                            
                                                        </div> 
                                                        <input type="submit" class="btn btn-inline" name="feedback">
                                                    </form>
                                                 @endif                                           



                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                              

                            </ol><!-- list product -->
                        </div> <!-- List Products -->

                        

                    </div><!-- Main Content -->
                    
                </div>
            </div>

        @include('footer.footer')     

       
        </main>
        <!-- end MAIN -->    
       </div>  
       </div>     
    </body>
</html>