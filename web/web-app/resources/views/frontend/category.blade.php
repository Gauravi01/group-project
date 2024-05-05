@extends('layouts.front')

@section('title')
    Category
@endsection

@section('content')
   <div class="py-5">
        <div class="row">
            <div class="container">
                <div class="col-md-12">
                    <h2>All Categories</h2>
                    <div class="row">
                        @foreach ($category as $cate)
                        <div class="col-md-4 mb-3">
                            <a href="{{url ('view-category/'.$cate->id)}}">
                                <div class="card">
                                    <img src ="{{asset('assets/uploads/category/'.$cate->image)}}" alt="Category image" style="max-width: 300px; max-height: 300px;"> 
                                    <div class="card-body">
                                        <h5>{{$cate->name}}</h5>
                                        <p>
                                            {{$cate->description}}
                                        </p>
                                    </div> 
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
   </div>
@endsection  