        <!-- laravel form validation-- >
   <!-- block  service-->
            <div class="block-service">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="item">
                                <span class="icon">
                                   <!--  <img src="images/icon/index1/service1.png" alt="service"> -->
                                    {!! HTML::image('public/images/icon/index1/service1.png', 'service', array('class' => '')) !!}
                                </span>
                                <strong class="title">Member Safe Shopping</strong>
                                <span>Safe Shopping Guarantee</span>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="item">
                                <span class="icon">
                                    <!-- <img src="images/icon/index1/service2.png" alt="service"> -->
                                     {!! HTML::image('public/images/icon/index1/service2.png', 'service', array('class' => '')) !!}
                                </span>
                                <strong class="title">30- day return products</strong>
                                <span>Moneyback guarantee</span>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="item">
                                <span class="icon">
                                    <img src="{{ asset('public/images/icon/index1/service3.png') }} " alt="service">
                                </span>
                                <strong class="title">Free Shipping worldwide</strong>
                                <span>On oder over $100</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- block  service-->

 <!-- FOOTER -->
        <footer class="site-footer footer-opt-6">
            <div class="container">
                <div class="footer-column">                
                    <div class="row">
                        <div class="col-md-3 col-lg-3 col-sm-6 col">
                            <a href="{{url('/')}}"><strong class="logo-footer">                               
                                {!! HTML::image('public/images/media/index10/logo-ft.png', 'logo', array('class' => '')) !!}
                            </strong></a>
                            <table class="address">
                                {!!html_entity_decode(@$address[1]->address)!!}
                            </table>
                        </div>
                        <div class="col-md-2 col-lg-2 col-sm-3 col">
                            <div class="links">
                            <h3 class="title">Information</h3>
                            <ul>
                                @if($static_pages->count() > 0 )
                                @foreach($static_pages as $static_pa)
                                @if($static_pa->footer_type == 1)
                                <li><a href="{!! url('/'.$static_pa->link)!!}">{{ @$static_pa->title }}</a></li>
                                @endif
                                @endforeach
                                @endif
                                <li><a href="{!! url('/')!!}">Delivery Info</a></li>                               
                            </ul>
                            </div>
                        </div>
                     
                        <div class="col-md-2 col-lg-2 col-sm-6 col">
                            <div class="links">
                            <h3 class="title">Custoomer Service</h3>
                            <ul>
                                <li><a href="{!! url('contact')!!}">Contact Us</a></li>
                                @if($static_pages->count() > 0 )
                                @foreach($static_pages as $static_pa)
                                @if($static_pa->footer_type == 2)
                                <li><a href="{!! url('/'.$static_pa->link) !!}">{{ @$static_pa->title }}</a></li>
                                @endif
                                @endforeach
                                @endif
                                <li><a href="{!! url('faq')!!}">FAQ</a></li>
                            </ul>
                            </div>
                        </div>
                           <div class="col-md-2 col-lg-2 col-sm-3 col">
                            <div class="links">
                            <h3 class="title">My Account</h3>
                            <ul>
                                
                                <li><a href="{!! url('myaccount')!!}">My Account</a></li>
                                <li><a href="{!! url('myaccount')!!}">My Order History</a></li>
                                <li><a href="{!! url('wishlist')!!}">My Wishlist</a></li>
<!--                                <li><a href="">My Addresses</a></li>
                                <li><a href="">My Account</a></li>-->
                            </ul>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3 col-sm-6 col">
                            <div class="block-newletter">
                                <div class="block-title">NEWSLETTER</div>
                                <div class="block-content">
                                    <form>
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Your Email Address">
                                        <span class="input-group-btn">
                                            <button class="btn btn-subcribe" type="button"><span>ok</span></button>
                                        </span>
                                    </div>
                                </form>
                                </div>
                            </div>

                            @if(count($socialmedia) != '0') 
                            <div class="block-social">
                                <div class="block-title">Let’s Socialize </div>
                                <div class="block-content">                                 
                                   @foreach($socialmedia as $social)
                                   <a href="{!!$social->link!!}" class="fa fa-{!!$social->class!!}"></a>
                                   @endforeach
                                </div>
                            </div>
                            @endif


                        </div>
                    </div>
                </div>

                <div class="payment-methods">
                    <div class="block-title">
                        Accepted Payment Methods
                    </div>
                    <div class="block-content">                      
                        
                        {!! HTML::image('public/images/media/index6/payment1.png', 'payment', array('class' => '')) !!}
                        {!! HTML::image('public/images/media/index6/payment2.png', 'payment', array('class' => '')) !!}
                        {!! HTML::image('public/images/media/index6/payment3.png', 'payment', array('class' => '')) !!}
                        {!! HTML::image('public/images/media/index6/payment4.png', 'payment', array('class' => '')) !!}
                        {!! HTML::image('public/images/media/index6/payment5.png', 'payment', array('class' => '')) !!}
                        {!! HTML::image('public/images/media/index6/payment6.png', 'payment', array('class' => '')) !!}
                        {!! HTML::image('public/images/media/index6/payment7.png', 'payment', array('class' => '')) !!}
                        {!! HTML::image('public/images/media/index6/payment8.png', 'payment', array('class' => '')) !!}
                        {!! HTML::image('public/images/media/index6/payment9.png', 'payment', array('class' => '')) !!}
                        {!! HTML::image('public/images/media/index6/payment10.png', 'payment', array('class' => '')) !!}                      
               
                    </div>
                </div>

<!--                <div class="footer-links">
                    
                        
                    <ul class="links">
                        <li><strong class="title">HOT SEARCHED KEYWORDS:</strong></li>
                        <li><a href="">Xiaomi Mi3 </a></li>
                        <li><a href="">Digiflip Pro XT 712 Tablet</a></li>
                        <li><a href="">Mi 3 Phones  </a></li>
                        <li><a href="">Iphone 6 Plus  </a></li>
                        <li><a href="">Women's Messenger Bags</a></li>
                        <li><a href="">Wallets   </a></li>
                        <li><a href="">Women's Clutches   </a></li>
                        <li><a href="">Backpacks Totes</a></li>
                    </ul>
                    
                    
                        
                    <ul class="links">
                        <li><strong class="title">tvs: </strong></li>
                        <li><a href="">Sony TV  </a></li>
                        <li><a href=""> Samsung TV  </a></li>
                        <li><a href="">LG TV  </a></li>
                        <li><a href="">Panasonic TV  </a></li>
                        <li><a href=""> Onida TV  </a></li>
                        <li><a href=""> Toshiba TV  </a></li>
                        <li><a href=""> Philips TV</a></li>
                        <li><a href="">Micromax TV</a></li>
                        <li><a href="">LED TV </a></li>
                        <li><a href="">  LCD TV  </a></li>
                        <li><a href="">Plasma TV </a></li>
                        <li><a href="">3D TV    </a></li>
                        <li><a href="">Smart TV </a></li>
                    </ul>
                   
                   
                        
                    <ul  class="links">
                        <li><strong class="title">MOBILES: </strong></li>
                        <li><a href="">Moto E </a></li>
                        <li><a href=""> Samsung Mobile </a></li>
                        <li><a href="">Micromax Mobile</a></li>
                        <li><a href="">Nokia Mobile </a></li>
                        <li><a href=""> HTC Mobile </a></li>
                        <li><a href="">Sony Mobile  </a></li>
                        <li><a href=""> Apple Mobile  </a></li>
                        <li><a href=""> LG Mobile  </a></li>
                        <li><a href="">Karbonn Mobile</a></li>
                    </ul>
                   
                        
                    <ul class="links">
                        <li><strong class="title">LAPTOPS:</strong></li>
                        <li><a href="">Apple Laptop  </a></li>
                        <li><a href="">Acer Laptop </a></li>
                        <li><a href="">Samsung Laptop</a></li>
                        <li><a href="">Lenovo Laptop </a></li>
                        <li><a href="">Sony Laptop</a></li>
                        <li><a href="">Dell Laptop</a></li>
                        <li><a href="">Asus Laptop </a></li>
                        <li><a href="">  Toshiba Laptop</a></li>
                        <li><a href="">LG Laptop </a></li>
                        <li><a href="">HP Laptop</a></li>
                        <li><a href="">Notebook</a></li>
                    </ul>
                   
                    
                        
                    <ul class="links">
                        <li><strong class="title">WATCHES:</strong></li>
                        <li><a href="">FCUK Watches</a></li>
                        <li><a href="">Titan Watches  </a></li>
                        <li><a href="">  Casio Watches </a></li>
                        <li><a href="">  Fastrack Watches </a></li>
                        <li><a href="">Timex Watches </a></li>
                        <li><a href="">Fossil Watches</a></li>
                        <li><a href="">Diesel Watches  </a></li>
                        <li><a href=""> Luxury Watches</a></li>
                    </ul>
                   
                    
                    <ul class="links">
                        <li><strong class="title">FOOTWEAR: </strong></li>
                        <li><a href="">Shoes  </a></li>
                        <li><a href="">Casual Shoes </a></li>
                        <li><a href=""> Sports Shoes </a></li>
                        <li><a href="">Formal Shoes </a></li>
                        <li><a href=""> Adidas Shoes  </a></li>
                        <li><a href="">Gas Shoes</a></li>
                        <li><a href=""> Puma Shoes</a></li>
                        <li><a href="">Reebok Shoes </a></li>
                        <li><a href="">Woodland Shoes  </a></li>
                        <li><a href="">Red tape Shoes</a></li>
                        <li><a href="">Nike Shoes</a></li>
                    </ul>
                    
                </div>-->

<!--                <div class="footer-bottom">
                    <div class="links">
                        <ul>
                            <li><a href="">    Company Info – Partnerships    </a></li>
                        </ul>
                        <ul>
                            <li><a href="">Online Shopping </a></li>
                            <li><a href="">Promotions </a></li>
                            <li><a href="">My Orders  </a></li>
                            <li><a href="">Help  </a></li>
                            <li><a href="">Site Map </a></li>
                            <li><a href="">Customer Service </a></li>
                            <li><a href="">Support  </a></li>
                        </ul>
                        <ul>
                            <li><a href="">Most Populars </a></li>
                            <li><a href="">Best Sellers  </a></li>
                            <li><a href="">New Arrivals  </a></li>
                            <li><a href="">Special Products  </a></li>
                            <li><a href=""> Manufacturers     </a></li>
                            <li><a href="">Our Stores   </a></li>
                            <li><a href="">Shipping      </a></li>
                            <li><a href="">Payments      </a></li>
                            <li><a href="">Payments      </a></li>
                            <li><a href="">Refunds  </a></li>
                        </ul>
                        <ul>
                            <li><a href="">Terms & Conditions  </a></li>
                            <li><a href="">Policy      </a></li>
                            <li><a href="">Policy      </a></li>
                            <li><a href=""> Shipping     </a></li>
                            <li><a href="">Payments      </a></li>
                            <li><a href="">Returns      </a></li>
                            <li><a href="">Refunds      </a></li>
                            <li><a href="">Warrantee      </a></li>
                            <li><a href="">FAQ      </a></li>
                            <li><a href="">Contact  </a></li>
                        </ul>
                    </div>
                </div>-->

                <div class="copyright">
                    
                     Copyright � 2017 Sbuyer. All Rights Reserved. Powered by <a href="http://www.itsolusenz.com/">Nbays It Solution</a>
                   
                </div>

            </div>

        </footer><!-- end FOOTER --> 

         <!--back-to-top  -->
        <a href="#" class="back-to-top">
            <i aria-hidden="true" class="fa fa-angle-up"></i>
        </a>  


   
     {!! HTML::script('public/js/jquery.min.js'); !!}
     {!! HTML::script('public/js/jquery-1.10.2.js'); !!}
     {!! HTML::script('public/js/jquery-ui.js'); !!}
    
        
    
    

     {!! HTML::script('public/js/modernizr.js'); !!}
     {!! HTML::script('public/js/bootstrap.js'); !!}
     {!! HTML::script('public/js/jquery.sticky.js'); !!}  
      {!! HTML::script('public/js/owl.carousel.js'); !!}
       {!! HTML::script('public/js/jquery.elevateZoom.min.js'); !!}
        {!! HTML::script('public/js/fancybox/source/jquery.fancybox.pack.js'); !!}
        {!! HTML::script('public/js/fancybox/source/helpers/jquery.fancybox-media.js'); !!}
         {!! HTML::script('public/js/fancybox/source/helpers/jquery.fancybox-thumbs.js'); !!}
           {!! HTML::script('public/js/arcticmodal/jquery.arcticmodal.js'); !!}
            {!! HTML::script('public/js/chosen.jquery.js'); !!}
             {!! HTML::script('public/js/main.js'); !!}   

     {!! HTML::script('public/js/jquery.countdown.min.js'); !!}
     {!! HTML::script('public/js/jquery.countdownTimer.min.js'); !!}
     {!! HTML::script('public/js/jquery.countdownTimer.js'); !!}

 @if (Request::segment(1) == 'login' || Request::segment(1) == 'contact' 
    || Request::segment(1) == 'forgetpassword' 
    || Request::segment(1) == 'editprofile' 
    || Request::segment(1) == 'password'
    || Request::segment(1) == 'customerservice')
     {!! HTML::script('public/js/jquery.validate.min.js'); !!}
     {!! HTML::script('public/js/form-validation.js'); !!}
 @endif
     

 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAHij_G-_NSDmyMZigW3G4Y7JnsHZXgxzU"></script>


 <script src="{{URL::asset('public/assets/js/script.js')}}"></script>

<script>         
            $( "#datepicker" ).datepicker({
    changeMonth: true,
    changeYear: true,
    yearRange:'-90:+0'
});
</script>

@if (Request::segment(1) == 'product' ||  Request::segment(1) == 'listproduct') 

 <!-- Custom scripts -->
    <script>

        (function($) {

            "use strict";

            $(document).ready(function() {

                /*  [ Filter by price ]

                - - - - - - - - - - - - - - - - - - - - */

                $('#slider-range').slider({

                    range: true,

                    min: 0,

                    max: 500,

                    values: [0, 300],

                    slide: function (event, ui) {

                        $('#amount-left').text(ui.values[0] );
                        $('#amount-right').text(ui.values[1] );

                    }

                });

                $('#amount-left').text($('#slider-range').slider('values', 0));

                $('#amount-right').text($('#slider-range').slider('values', 1));
            }); 

        })(jQuery);
        
    </script>
 @endif 


 @if(Request::segment(1) == '') 
<script type="text/javascript">
      $(function()
      {
        $("#future_date").countdowntimer({
          dateAndTime : "2017/11/30 00:00:00",
          size : "md",
          borderColor : '#f44336',
          backgroundColor : '#000000',
          fontColor : '#ffffff',
        });
      });
</script>
@endif


 <!-- <script>  
         (function($) {
            "use strict";
            /*  [ Popup Newsletter]
            - - - - - - - - - - - - - - - - - - - - */
            $(document).ready(function() {
                $('#popup-newsletter').modal({
                  keyboard: false
                })
            }); 
        })(jQuery);
    </script>
 -->




