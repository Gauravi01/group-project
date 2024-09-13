<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Order;
use App\Models\Review;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function add($product_description)
    {
        $product = Product::where('description', $product_description)->where('status', '0')->first();
        if ($product) {
            $product_id = $product->id;
            $verified_purchase = Order::where('orders.user_id', Auth::id())
                ->join('order_items', 'orders.id', 'order_items.order_id')
                ->where('order_items.product_id', $product_id)->get();
                
            return view('frontend.reviews.index', compact('product', 'verified_purchase'));
        } else {
            return redirect()->back()->with('status', 'The link you followed was not found');
        }
    }

    public function create(Request $request) 
    {
        $product_id = $request->input('product_id');
        $product = Product::where('id', $product_id)->where('status', '0')->first();

        if ($product) {
            $user_review = $request->input('user_review');
            $new_review = Review::create([
                'user_id' => Auth::id(),
                'product_id' => $product_id,
                'user_review' => $user_review
            ]);

            if ($new_review) {
                // Use category_id and product_id to match the route
                $category_id = $product->category->id;
                $product_id = $product->id;

                return redirect('category/' . $category_id . '/' . $product_id)->with('status', 'Thank you for writing a review');
            } else {
                return redirect()->back()->with('status', 'Unable to submit review');
            }
        } else {
            return redirect()->back()->with('status', 'Product not found');
        }
    }
}
