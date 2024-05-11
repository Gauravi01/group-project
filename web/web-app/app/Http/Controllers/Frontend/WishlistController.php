<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlist = Wishlist::where('user_id',Auth::id())->get();
        return view('frontend.wishlist',compact('wishlist'));
    }

    public function add(Request $request)
    {
        if(Auth::check())
        {
            $prod_id = $request->input('product_id');
            if(Product::find($prod_id))
            {
                $wish = new Wishlist();
                $wish->product_id = $prod_id;
                $wish->user_id = Auth::id();
                $wish->save();

                return response()->json(['status'=>"Product Added to Wishlist"]);
            }
            else
            {
                return response()->json(['status'=>"Product does not exist"]);
            }
        }
        else
        {
            return response()->json(['status'=>"Login to Continue"]);
        }
    }

    public function deleteitem(Request $request)
    {
        if(Auth::check())
        {
            $product_id = $request->input('product_id');
            if(Wishlist::where('product_id',$product_id)->where('user_id',Auth::id())->exists())
            {
               $wish = Wishlist::where('product_id',$product_id)->where('user_id',Auth::id())->first();
               $wish->delete();
               return response()->json(['status'=>"Item Removed from Wishlist Successfully"]);

            }

        }
        else
        {
            return response()->json(['status'=>"Login to Continue"]);
        }
    }
}
