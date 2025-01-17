@extends('layouts.front')

@section('title')
    Welcome to E-shop
@endsection

@section('content')
    @include('layouts.inc.slider')
    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2 class="text-center mb-3">Featured Products</h2>
                <div class="owl-carousel featured-carousel owl-theme">
                    @foreach ($featured_products as $prod)
                        <div class="item">
                            <div class="card h-100 mb-4"> <!-- Added mb-4 class for bottom margin -->
                                <img src ="{{asset('assets/uploads/products/'.$prod->image)}}" class="card-img-top" alt="Product image" style="width: 100%; height: 200px; object-fit: cover;"> <!-- Added style attribute for fixed dimensions -->
                                <div class="card-body">
                                    <h5 class="card-title">{{$prod->name}}</h5>
                                    <span class="float-start">Rs. {{$prod->selling_price}}</span>
                                    <span class="float-end"><s>Rs. {{$prod->original_price}}</s></span>
                                </div> 
                            </div>
                        </div>
                    @endforeach
                </div>     
            </div>
        </div>
    </div>

    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2 class="text-center mb-3">Trending Categories</h2>
                <div class="owl-carousel featured-carousel owl-theme">
                    @foreach ($trending_category as $tcategory)
                        <div class="item">
                            <a href="{{url ('view-category/'.$tcategory->id)}}" class="text-decoration-none">
                                <div class="card h-100 mb-4"> <!-- Added mb-4 class for bottom margin -->
                                    <img src ="{{asset('assets/uploads/category/'.$tcategory->image)}}" class="card-img-top" alt="Category image" style="width: 100%; height: 200px; object-fit: cover;"> <!-- Added style attribute for fixed dimensions -->
                                    <div class="card-body">
                                        <h5 class="card-title">{{$tcategory->name}}</h5>
                                        <p class="card-text">{{$tcategory->description}}</p>
                                    </div> 
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>     
            </div>
        </div>
    </div>

    <!-- Our Story Section -->
    <!-- <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2 text-center">
                    <h2 class="mb-4">About Us</h2>
                    <div class="row mr-3">
                        <div class="col-md-4">
                            <div class="oval-shape">
                                <img src="" alt="Image 1"> 
                                <div class="oval-content">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vestibulum tortor eu mi tempor, et luctus dolor iaculis.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="oval-shape">
                                 <img src="image2.jpg" alt="Image 2"> 
                                <div class="oval-content">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vestibulum tortor eu mi tempor, et luctus dolor iaculis.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="oval-shape">
                                <img src="image3.jpg" alt="Image 3">
                                <div class="oval-content">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vestibulum tortor eu mi tempor, et luctus dolor iaculis.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
@endsection

@section('scripts')
    <script>
        $('.featured-carousel').owlCarousel({
            loop:true,
            margin:10,
            nav:true,
            dots:false,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                },
                1000:{
                    items:4
                }   
            }
        })
    </script>
@endsection
