<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        if(Category::where('id',$cate_id)->exists())
        {
            if(Product::where('category_id',$prod_id)->exists())
            {
                $products = Product::where('category_id',$prod_id)->first();
                return view('frontend.products.productview',compact('products'));
            }
            else
            {
                return redirect('/')->with('status', "The link not found");
            }
        }
        else
        {
            return redirect('/')->with('status', "Such Category does not exist");
        }
    }

}
