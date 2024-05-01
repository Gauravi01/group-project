@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Edit/update Category</h4>
        </div>
        <div class="card-body">
            <form action="{{ url('update-category/'.$category->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">   
                        <label for="name">Category Name</label>
                        <input type="text" value="{{$category->name}}" name="name" class="form-control" required> <!-- Added required attribute -->
                    </div>
                    <div class="col-md-6">
                        <label for="slug">Slug</label>
                        <input type="text" value="{{$category->slug}}" name="slug" class="form-control">    
                    </div>
                    <div class="col-md-6" style="margin-top: 10px;">
                        <label for="description">Description</label>
                        <textarea name="description" rows="1" class="form-control">{{$category->description}}</textarea>
                    </div>
                    <div class="col-md-6" style="margin-top: 10px;">
                        <label for="meta_title">Meta Title</label>
                        <input type="text" value="{{$category->meta_title}}" name="meta_title" class="form-control">    
                    </div>
                    <div class="col-md-6">
                        <label for="meta_keywords">Meta Keywords</label>
                        <textarea name="meta_keywords" rows="1" class="form-control">{{$category->meta_keywords}}</textarea>    
                    </div>
                    <div class="col-md-6">
                        <label for="meta_desc">Meta Description</label>
                        <textarea name="meta_desc" rows="1" class="form-control">{{$category->meta_desc}}</textarea>    
                    </div>
                    <div class="col-md-6" style="margin-top: 10px;">
                        <label>Status</label>
                        <input type="checkbox" {{$category->status=="1" ? 'checked':''}}  name="status">    
                    </div>
                    <div class="col-md-6" style="margin-top: 10px;">
                        <label>Popular</label>
                        <input type="checkbox" {{$category->popular=="1" ? 'checked':''}} name="popular">    
                    </div>
                    @if($category->image)
                        <img src="{{asset('assets/uploads/category/' . $category->image)}}" alt="Category image" style="max-width: 200px; max-height: 200px; margin-left: 10px;">
                    @endif
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
