@extends('layouts.front')

@section('title')
    {{$category->name}}
@endsection

@section('content')

<style>
    .custom-bg-color {
    background-color: #AFE1AF; /* Your custom color code */
    /* You can also add other styling properties like padding, margin, etc. */
}

</style>

<div class="py-3 mb-4 shadow-sm custom-bg-color border-top">
    <div class="container">
        <h6 class="mb-0">Collections / {{$category->name}}</h6>
    </div>
</div>
<div class="py-5">
        <div class="container">
            <div class="row">
                <h2>{{$category->name}}</h2>
                    @foreach ($products as $prod)
                        <div class="col-md-3 mb-3">
                            <div class="card">
                                <a href="{{url ('category/'.$category->id .'/'.$prod->id)}}">
                                    <img src ="{{asset('assets/uploads/products/'.$prod->image)}}" alt="Product image" style="max-width: 300px; max-height: 300px;"> 
                                    <div class="card-body">
                                        <h5>{{$prod->name}}</h5>
                                        <span class="float-start">Rs. {{$prod->selling_price}}</span>
                                        <span class="float-end"><s>Rs. {{$prod->original_price}}</s></span>
                                    </div> 
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>     
            </div>
        </div>
    </div>
@endsection