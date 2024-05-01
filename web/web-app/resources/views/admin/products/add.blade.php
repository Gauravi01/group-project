@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Add Product</h4>
        </div>
        <div class="card-body">
            <form action="{{ url('insert-product') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <select class="form-select" name="category_id" aria-label="Default select example">
                            <option value="">Select a category</option>
                            @foreach($category as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach        
                        </select>
                    </div>
                    <div class="col-md-6">   
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" required> <!-- Added required attribute -->
                    </div>
                    <div class="col-md-6" style="margin-top: 10px;">
                        <label for="description">Description</label>
                        <textarea name="description" rows="1" class="form-control"></textarea>
                    </div>
                    <div class="col-md-6" style="margin-top: 10px;">
                        <label for="">Original Price</label>
                        <input type="number" class="form-control" name="original_price">
                    </div>
                    <div class="col-md-6" style="margin-top: 10px;">
                        <label for="">Selling Price</label>
                        <input type="number" class="form-control" name="selling_price">
                    </div>
                    <div class="col-md-6" style="margin-top: 10px;">
                        <label for="">Quantity</label>
                        <input type="number" class="form-control" name="qty">
                    </div>
                    <div class="col-md-6" style="margin-top: 10px;">
                        <label for="">Status</label>
                        <input type="checkbox" name="status">    
                    </div>
                    <div class="col-md-6" style="margin-top: 10px;">
                        <label for="">Trending</label>
                        <input type="checkbox" name="trending">    
                    </div>
                    <div class="col-md-12" style="margin-top: 10px;">
                        <input type="file" name="image" class="form-control-file">
                    </div>
                    <div class="col-md-12" style="margin-top: 15px;">
                        <button type="submit" class="btn btn-success">Submit</button>   
                    </div>    
                </div>
            </form>
        </div>
    </div>
@endsection
