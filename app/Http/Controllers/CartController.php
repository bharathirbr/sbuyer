<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Http\Request;
use App\CartItem;
use App\Models\Admin\Product;
use Session;
use Cart;
 
class CartController extends Controller
{
  
    public function addItem (Request $request)
    {  
          /*if(@Session::get('user_id')[0]['id'] != '')
      {   */   
       
           @$product_details = Product::find(@$request->segment(2));
           Cart::add([
                 'id'   =>$product_details->id,                                 
                 'name' => $product_details->name,
                 'qty'  => 1,
                 'price' =>$product_details->rate ,
                 'options' => ['image' =>$product_details->image,'image_alt'=>$product_details->image_alt]
               ]);
           Session::flash('success', 'You have added successfully');
          return redirect()->back();          
/*     }
 else{        
         return redirect('login');
     }*/
    }



     public function Wishlistadd(Request $request)
    {              
               @$product_details = Product::find(@$request->segment(2));              
                  Cart::instance('wishlist')->add($product_details->id, $product_details->name , 1, $product_details->rate,
                  ['image' =>$product_details->image]);
               Session::flash('success', 'You have added successfully');
               return redirect()->back();                   
    }

         public function Wishlist(Request $request)
    {              
            return view('wishlist');                     
    }


 
    public function showCart()
    {
        $cart = Cart::where('user_id',Auth::user()->id)->first();
 
        if(!$cart)
        {
            $cart =  new Cart();
            $cart->user_id=Auth::user()->id;
            $cart->save();
        }
 
        $items = $cart->cartItems;
        $total=0;
        foreach($items as $item)
        {
            $total+=$item->product->price;
        }
 
        return view('cart.view',['items'=>$items,'total'=>$total]);
    }
 
    public function updateItem(Request $request)
    {        
           Cart::update($request->product_id,$request->qty1);
           Session::flash('success', 'You Cart Updated successfully');
           return redirect()->back(); 
    } 
    public function removecart(Request $request)
    {        
        Cart::remove($request->segment(2));
        Session::flash('success', 'You Cart Removed successfully');
        return redirect()->back(); 
    }
     public function removeItemall(Request $request)
    {   
        Cart::destroy();
        Session::flash('success', 'You Cart All Removed successfully');
        return redirect()->back(); 
    }
 
}
