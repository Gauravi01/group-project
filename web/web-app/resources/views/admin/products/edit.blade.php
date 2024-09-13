@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Update Product</h4>
        </div>
        <div class="card-body">
            <form action="{{ url('update-product/'.$products->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="category">Category</label>
                        <select class="form-select" name="category_id">
                            <option value="{{$products->category->id}}">{{$products->category->name}}</option>            
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="name">Name</label>
                        <input type="text" name="name" value="{{$products->name}}" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="description">Description</label>
                        <textarea name="description" rows="1" class="form-control">{{$products->description}}</textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="original_price">Original Price</label>
                        <input type="number" class="form-control" value="{{$products->original_price}}" name="original_price">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="selling_price">Selling Price</label>
                        <input type="number" class="form-control" value="{{$products->selling_price}}" name="selling_price">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="qty">Quantity</label>
                        <input type="number" value="{{$products->qty}}" class="form-control" name="qty">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="status">Status</label>
                        <input type="checkbox" {{$products->status == "1" ? 'checked' : ''}} name="status">    
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="trending">Trending</label>
                        <input type="checkbox" {{$products->trending == "1" ? 'checked' : ''}} name="trending">    
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="trending_threshold">Trending Threshold</label>
                        <input type="number" class="form-control" value="{{$products->trending_threshold}}" name="trending_threshold">
                    </div>
                    @if ($products->image)
                        <div class="col-md-6 mb-3">
                            <img src="{{asset('assets/uploads/products/' .$products->image)}}" alt="" style="max-width: 200px; max-height: 200px;">
                        </div>
                    @endif
                    <div class="col-md-12 mb-3">
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="col-md-12 mb-3">
                        <button type="submit" class="btn btn-success">Update</button>   
                    </div>    
                </div>
            </form>
        </div>
    </div>
@endsection
