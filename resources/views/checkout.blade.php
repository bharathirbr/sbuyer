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

             <!-- breadcrumb -->
            <div class="container breadcrumb-page">
                <ol class="breadcrumb">
                    <li><a href="#">Home </a></li>
                    <li class="active">Cart</li>
                </ol>
            </div>
             <!-- breadcrumb -->

 <!-- about page  start -->
    <!-- MAIN -->   
          
        <div class="container">
                <!-- form cart -->
                <form class="form-cart" action="{{url('updateItem')}}" method="post">
                     {{ csrf_field() }}
                    <!-- table cart -->
                    <div class="table-cart-wrapper table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="tb-product">Products/Price</th>
                                    <th class="tb-available">Available</th>
                                    <th class="tb-qty">Qty</th>
                                    <th class="tb-total">Total</th>
                                    <th class="tb-remove">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                  @if(count(Cart::content()) != '0') 
                                  <?php $i=0 ; ?>                      
                        @foreach(Cart::content() as $keys=>$row) 
                             <?php $i++ ; ?> 
                                <tr>
                                    <td class="tb-product">
                                        <div class="item"> 
                                            <a href="" class="item-photo"> 
                                            <img src="{{ url('public/images/product/'.$row->options->image) }}" alt="{{$row->options->image_alt}}"></a>
                                            <div class="item-detail">
                                                <strong class="item-name"><a href="" >{{ @$row->name }}</a></strong>
                                                <div class="item-price">
                                                    <span class="price">₹{{@$row->price}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="tb-available">
                                        <span class="value">In stock!</span>
                                    </td>
                                    <td class="tb-qty">
                                       <!--  <input type="text" value="{{ @$row->qty }}"> -->
                                        <div class="form-group form-qty">
                                           
                                            <div class="control">
                                                <input type="hidden" name="product_id" value="{{$row->rowId}}">
                                                <input type="text" class="form-control input-qty" value='{{$row->qty}}' id="qty{{$i}}" name="qty{{$i}}"  maxlength="12"  minlength="1">
                                                <button class="btn-number  btn-info" data-type="minus" data-field="qty{{$i}}">-</button>
                                                <button class="btn-number btn-info" data-type="plus" data-field="qty{{$i}}">+</button>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="tb-total">                                    
                                       <span class="amount">₹{{@$row->subtotal}}</span>
                                    </td>
                                    <td class="tb-remove"> 
                                        <a href="{{ url('removeItem/'.$row->rowId) }}" class="action-remove"><span>remove</span></a>
                                    </td>
                                </tr>
                                 @endforeach
                                 @endif                            
                                <tr>
                                    <td class="tb-subtotal" colspan="5"><span class="label">Sub Total:</span>{{ Cart::subtotal() }}</td>
                                </tr>
                               <!--  <tr>
                                    <td class="tb-subtotal" colspan="5"><span class="label">Tax :</span>{{ Cart::tax() }}</td>
                                </tr>
                                <tr>
                                    <td class="tb-subtotal" colspan="5"><span class="label">Total :</span>{{ Cart::total() }}</td>
                                </tr> -->
                            </tbody>
                        </table>
                     </div><!-- table cart -->
                    <!-- action cart -->
                    <div class="cart-actions">
                        <button type="submit" title="Update Cart" class="action update">
                            <span>Update SHOPPING CART</span>
                        </button>
                        <a href="{{ url('removeItemall/') }}">
                        <div  title="Update Cart" class="action update">
                            <span>Remove Cart</span>
                        </div>
                        </a>
                        <button type="submit" title="Proceed to CHECK OUT" class="action checkout" >
                            <span>Proceed to CHECK OUT</span>
                        </button>
                    </div><!-- action cart -->
                </form><!-- form cart -->
            </div>


            @include('footer.footer')    
        </main>
    <!-- end MAIN -->    
    </div>      
</body>
</html>