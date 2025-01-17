<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index',compact('products'));// when add data display here
    }

    public function add()
    {
        $category = Category::all();
        return view('admin.products.add',compact('category'));
    }

    public function insert(Request $request)
    {
            $product = new Product();
                if ($request->hasFile('image')) {
                    $file = $request->file('image');
                    $ext = $file->getClientOriginalExtension();
                    $filename = time() . '.' . $ext;
                    $file->move('assets/uploads/products', $filename);
                    $product->image = $filename;
                }
            $product->name = $request->input('name');
            $product->description = $request->input('description');
            $product->original_price = $request->input('original_price');
            $product->selling_price = $request->input('selling_price');
            $product->qty = $request->input('qty');
            $product->status = $request->has('status') ? '1' : '0';
            $product->trending = $request->has('trending') ? '1' : '0';

            // Add category_id
            $product->category_id = $request->input('category_id');

            $product->save();
            return redirect('products')->with('status', "Product saved successfully");
    }

    public function edit($id)
    {
        $products = Product::find($id);
        return view('admin.products.edit',compact('products'));
    }

    public function update(Request $request ,$id)
    {
        $product = Product::find($id); // Corrected variable name to $product

        if (!$product) 
        {
            return redirect()->back()->with('error', 'Product not found.');
        }

        if ($request->hasFile('image')) 
        {
            $path = 'assets/uploads/products/'.$product->image ;
            if(File::exists($path)) 
            {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/uploads/products', $filename);
            $product->image = $filename;
        }

        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->original_price = $request->input('original_price');
        $product->selling_price = $request->input('selling_price');
        $product->qty = $request->input('qty');
        $product->status = $request->has('status') == TRUE ? '1' : '0';
        $product->trending = $request->has('trending')  == TRUE ? '1' : '0';

        $product->save();

        return redirect('products')->with('status', "Product updated successfully");
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }
        $path = 'assets/uploads/products/'.$product->image ;
        if(File::exists($path)) {
            File::delete($path);
        }
        $product->delete();
        return redirect('products')->with('status', "Product deleted successfully");
    }


}
