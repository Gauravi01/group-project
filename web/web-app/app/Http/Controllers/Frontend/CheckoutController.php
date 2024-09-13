<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Cart;
use App\Models\Euser;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
         // Filter out unavailable items for display purposes
        $cartitems = Cart::where('user_id', Auth::user()->id)->get()->filter(function ($item) 
        {
            return Product::where('id', $item->product_id)->where('qty', '>=', $item->prod_qty)->exists();
        });

        return view('frontend.checkout', compact('cartitems'));
    }

    public function placeOrder(Request $request)
    {
      $order = new Order();
      $order->user_id = Auth::id();
      $order->fname = $request->input('fname');
      $order->lname = $request->input('lname');
      $order->email = $request->input('email');
      $order->phone = $request->input('phone');
      $order->address1 = $request->input('address1');
      $order->address2 = $request->input('address2');
      $order->city = $request->input('city');  
      $order->postalCode = $request->input('postalCode'); 

      // Initialize total price
      $total = 0;

      // Fetch cart items
      $cartitems = Cart::where('user_id', Auth::id())->get();

      // Calculate total price
      foreach ($cartitems as $item)
      {
          $total += $item->products->selling_price * $item->prod_qty;
      }

      // Assign total price to order
      $order->total_price = $total;

      $order->tracking_no = 'abc'.rand(1111,9999);
      $order->save();

      // Create order items
      foreach ($cartitems as $item)
      {
          OrderItem::create([
              'order_id' => $order->id,
              'product_id' => $item->product_id,
              'qty' => $item->prod_qty,
              'price' => $item->products->selling_price * $item->prod_qty,
          ]);

          // Update product quantity
          $product = Product::find($item->product_id);
          $product->qty = $product->qty - $item->prod_qty;
          $product->save();
      }

      // Clear cart after placing order
      Cart::where('user_id', Auth::id())->delete();

      // Redirect back with success message
      return redirect('/')->with('status', "Order Placed Successfully");
    }

    public function razorpaycheck(Request $request)
    {
      $cartitems = Cart::where('user_id', Auth::id())->get();
      $total_price = 0;
      foreach($cartitems as $item)
      {
          $total_price += $item->products->selling_price * $item->prod_qty;
      }

      $firstname=$request->input('firstname');
      $lastname=$request->input('lastname');
      $address1=$request->input('address1');
      $address2=$request->input('address2');
      $phone=$request->input('phone');
      $email=$request->input('email');
      $city=$request->input('city');
      $postalCode=$request->input('postalCode');

      return response()->json([
          ' firstname' => $firstname,
          ' lastname' => $lastname,
          ' address1' => $address1,
          ' address2' => $address2,
          ' phone' => $phone,
          ' email' => $email,
          ' city' => $city,
          ' postalCode' => $postalCode,
          'total_price'=>$total_price
      ]);
    }

}
