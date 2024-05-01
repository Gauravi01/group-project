@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Add Product</h4>
        </div>
        <div class="card-body">
            <form action="{{ url('update-product/'.$products->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="name">Category</label>
                        <select class="form-select">
                            <option value="">{{$products->category->name}}</option>            
                        </select>
                    </div>
                    <div class="col-md-6">   
                        <label for="name">Name</label>
                        <input type="text" name="name" value="{{$products->name}}" class="form-control" required> <!-- Added required attribute -->
                    </div>
                    <div class="col-md-6" style="margin-top: 10px;">
                        <label for="description">Description</label>
                        <textarea name="description" rows="1" class="form-control">{{$products->description}}</textarea>
                    </div>
                    <div class="col-md-6" style="margin-top: 10px;">
                        <label for="">Original Price</label>
                        <input type="number" class="form-control"  value="{{$products->original_price}}" name="original_price">
                    </div>
                    <div class="col-md-6" style="margin-top: 10px;">
                        <label for="">Selling Price</label>
                        <input type="number" class="form-control" value="{{$products->selling_price}}" name="selling_price">
                    </div>
                    <div class="col-md-6" style="margin-top: 10px;">
                        <label for="">Quantity</label>
                        <input type="number" value="{{$products->qty}}" class="form-control" name="qty">
                    </div>
                    <div class="col-md-6" style="margin-top: 10px;">
                        <label for="">Status</label>
                        <input type="checkbox" {{$products->status == "1" ? 'checked' : ''}} name="status">    
                    </div>
                    <div class="col-md-6" style="margin-top: 10px;">
                        <label for="">Trending</label>
                        <input type="checkbox" {{$products->trending == "1" ? 'checked' : ''}} name="trending">    
                    </div>
                    @if ($products->image)
                        <img src="{{asset('assets/uploads/products/' .$products->image)}}" alt="" style="max-width: 200px; max-height: 200px; margin-left: 10px;">
                    @endif
                    <div class="col-md-12" style="margin-top: 10px;">
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="col-md-12" style="margin-top: 15px;">
                        <button type="submit" class="btn btn-success">Update</button>   
                    </div>    
                </div>
            </form>
        </div>
    </div>
@endsection
