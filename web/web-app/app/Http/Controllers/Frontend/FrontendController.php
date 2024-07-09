<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Rating;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function index()
    {
        $featured_products = Product::where('trending','1')->take(15)->get();// add products to the e commerce site from the database where trending=1
        $trending_category = category::where('popular','1')->take(15)->get();//when the categories are more than 15 it take latest 15
        return view('frontend.index' ,compact('featured_products','trending_category'));
    }

    public function category()
    {   
        $category = Category::where('status','0')->get();
        return view('frontend.category',compact('category'));
    }

    public function viewcategory($id)
    {
        if(Category::where('id',$id)->exists())
        {
            $category = Category::findOrFail($id); // Retrieve the category by ID
            $products = Product::where('category_id', $id)->where('status','0')->get(); // Use $id directly
            return view('frontend.products.index',compact('category','products'));
        }
        else
        {
            return redirect('/')->with('status', "Id does not exist");
        }
    }

    public function productview($cate_id,$prod_id)
{
    $category = Category::find($cate_id);
    $products = Product::find($prod_id);

    if(!$category) {
        return redirect('/')->with('status', "Such Category does not exist");
    }

    if(!$products || $products->category_id != $cate_id) 
    {
       
        return redirect('/')->with('status', "The product does not exist or does not belong to this category");
    }

    $ratings = Rating::where('prod_id',$products->id)->get();
    $rating_sum = Rating::where('prod_id',$products->id)->sum('stars_rated');
    $user_rating = Rating::where('prod_id',$products->id)->where('user_id',Auth::id())->first();
    if($ratings->count() > 0) 
    {
        $rating_value = $rating_sum/$ratings->count();
    }
    else 
    {
        $rating_value = 0;
    }
    
    return view('frontend.products.productview', compact('products','ratings','rating_value','user_rating'));
}

    

}
