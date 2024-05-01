<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    public function index()
    {
        $featured_products = Product::where('trending','1')->take(15)->get();// add products to the e commerce site from the database where trending=1
        return view('frontend.index' ,compact('featured_products'));
    }
}
