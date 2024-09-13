<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all(); 
        return view('admin.category.index',compact('category'));
    }

    public function add()
    {
        return view('admin.category.add');
    }

    public function insert(Request $request)
    {
        $category = new Category();
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/category',$filename);
            $category->image = $filename;
        }

        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->description = $request->input('description');
        $category->status = $request->input('status') == TRUE ? '1':'0';
        $category->popular = $request->input('popular') == TRUE ? '1':'0';
        $category->meta_title = $request->input('meta_title');
        $category->meta_keywords = $request->input('meta_keywords');
        $category->meta_desc = $request->input('meta_desc');
        $category->save();
        return redirect('/dashboard')->with('status',"Category added Successfully..");
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit',compact('category'));
    }

    public function updateProduct(Request $request, $id)
{
    $product = Product::find($id);
    $product->name = $request->input('name');
    $product->description = $request->input('description');
    $product->original_price = $request->input('original_price');
    $product->selling_price = $request->input('selling_price');
    $product->qty = $request->input('qty');
    $product->status = $request->input('status') == true ? '1' : '0';
    $product->trending = $request->input('trending') == true ? '1' : '0';
    $product->trending_threshold = $request->input('trending_threshold'); // Save the trending threshold

    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $file->move('assets/uploads/products/', $filename);
        $product->image = $filename;
    }

    $product->update();

    return redirect('products')->with('status', 'Product Updated Successfully');
}


    function destroy($id)
    {
        $category = Category::find($id);
        $path = 'assets/uploads/category/'.$category->image ;
        if(File::exists($path))
        {
            File::delete($path);
        }
        $category->delete();
        return redirect('/categories')->with('status',"Category deleted Successfully..");
    }
}
