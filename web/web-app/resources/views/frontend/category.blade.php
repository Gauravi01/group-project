@extends('layouts.front')

@section('title')
    Category
@endsection

@section('content')
   <div class="py-5">
        <div class="row">
            <div class="container">
                <div class="col-md-12">
                    <h2 class="col-md-4 mb-4 mt-4 ms-lg-4">All Categories</h2>
                    <div class="row">
                        @foreach ($category as $cate)
                        <div class="col-md-4 mb-4 mt-4 ms-lg-4"> <!-- Add ms-lg-4 to apply left margin for large screens and above -->
                            <a href="{{ url('view-category/' . $cate->id) }}">
                                <div class="card" style="width: 250px; height: 300px;"> <!-- Set width and height for the card -->
                                    <img src="{{ asset('assets/uploads/category/' . $cate->image) }}" alt="Category image" style="height: 200px; object-fit: cover;"> <!-- Adjust image height and object-fit -->
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $cate->name }}</h5>
                                        <p class="card-text">{{ $cate->description }}</p>
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