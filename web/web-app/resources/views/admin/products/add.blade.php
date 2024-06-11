@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <!-- Header for the Add Product page -->
            <h4>Add Product</h4>
        </div>
        <div class="card-body">
            <!-- Form to insert a new product -->
            <form action="{{ url('insert-product') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <!-- Dropdown to select a category for the product -->
                    <div class="col-md-12 mb-3">
                        <select class="form-select" name="category_id" aria-label="Default select example">
                            <option value="">Select a category</option>
                            @foreach($category as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach        
                        </select>
                    </div>
                    <!-- Input for the product name -->
                    <div class="col-md-6">   
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" required> <!-- Added required attribute -->
                    </div>
                    <!-- Textarea for the product description -->
                    <div class="col-md-6" style="margin-top: 10px;">
                        <label for="description">Description</label>
                        <textarea name="description" rows="1" class="form-control"></textarea>
                    </div>
                    <!-- Input for the original price of the product -->
                    <div class="col-md-6" style="margin-top: 10px;">
                        <label for="">Original Price</label>
                        <input type="number" class="form-control" name="original_price">
                    </div>
                    <!-- Input for the selling price of the product -->
                    <div class="col-md-6" style="margin-top: 10px;">
                        <label for="">Selling Price</label>
                        <input type="number" class="form-control" name="selling_price">
                    </div>
                    <!-- Input for the quantity of the product -->
                    <div class="col-md-6" style="margin-top: 10px;">
                        <label for="">Quantity</label>
                        <input type="number" class="form-control" name="qty">
                    </div>
                    <!-- Checkbox for the product status -->
                    <div class="col-md-6" style="margin-top: 10px;">
                        <label for="">Status</label>
                        <input type="checkbox" name="status">    
                    </div>
                    <!-- Checkbox for marking the product as trending -->
                    <div class="col-md-6" style="margin-top: 10px;">
                        <label for="">Trending</label>
                        <input type="checkbox" name="trending">    
                    </div>
                    <!-- File input for the product image -->
                    <div class="col-md-12" style="margin-top: 10px;">
                        <input type="file" name="image" class="form-control-file">
                    </div>
                    <!-- Submit button to add the new product -->
                    <div class="col-md-12" style="margin-top: 15px;">
                        <button type="submit" class="btn btn-success">Submit</button>   
                    </div>    
                </div>
            </form>
        </div>
    </div>
@endsection
