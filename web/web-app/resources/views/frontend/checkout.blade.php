@extends('layouts.front')

@section('title')
    Checkout
@endsection

@section('content')

    <div class="py-3 mb-4 shadow-sm border-top">
        <div class="container ">
            <h6 class="mb-0">
                <a href="{{url('/')}}">
                    Home
                </a> /
                <a href="{{url('checkout')}}">
                    Checkout
                </a> 
            </h6>
        </div>
    </div>

    <div class="container mt-3 py-3">
        <form action="{{url('place-order')}}" method="POST">
            {{csrf_field()}}
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <h6>Basic Details</h6>
                            <hr>
                            <div class="row checkout-form" >
                            <div class="col-md-6">
                                <label for="">First Name</label>
                                <input type="text" class="form-control firstname" value="{{Auth::user()->name}}" name="fname" placeholder="Enter First Name">
                                <span id="fname_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6">
                                <label for="">Last Name</label>
                                <input type="text" class="form-control lastname" value="{{Auth::user()->Lname}}" name="lname" placeholder="Enter Last Name">
                                <span id="lname_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Address 1</label>
                                <input type="text" class="form-control address1" value="{{Auth::user()->address1}}" name="address1" placeholder="Enter Address 1">
                                <span id="address1_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Address 2</label>
                                <input type="text" class="form-control address2" value="{{Auth::user()->address2}}" name="address2" placeholder="Enter Address 2">
                                <span id="address2_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Phone Number</label>
                                <input type="text" class="form-control phone" value="{{Auth::user()->phone}}" name="phone" placeholder="Enter Phone Number">
                                <span id="phone_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">E mail</label>
                                <input type="text" class="form-control email" value="{{Auth::user()->email}}" name="email" placeholder="Enter E mail">
                                <span id="email_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">City</label>
                                <input type="text" class="form-control city" value="{{Auth::user()->city}}" name="city" placeholder="Enter City">
                                <span id="city_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Postal Code</label>
                                <input type="text" class="form-control postalCode" value="{{Auth::user()->postalCode}}" name="postalCode" placeholder="Enter Postal Code">
                                <span id="postalCode_error" class="text-danger"></span>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                        <h6>Order Details</h6>
                        <hr>
                        @if($cartitems->count() > 0)
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                    </tr> 
                                </thead>
                                <tbody>
                                    @php $total = 0; @endphp
                                    @foreach($cartitems as $item)
                                    <tr>
                                        @php $total = $total + ($item->products->selling_price * $item->prod_qty); @endphp
                                        <td>{{$item->products->name}}</td>
                                        <td>{{$item->prod_qty}}</td>
                                        <td>{{$item->products->selling_price * $item->prod_qty}}</td> <!-- Corrected price calculation -->
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table> 
                            <h6 class="px-2">Grand Total <span class="float-end">Rs. {{$total}}</span></h6>   
                            <hr>
                            <button type="submit" class="btn btn-success w-100">Place Order | COD</button>
                            <!--  w-100 -->
                            <!-- <button type="button" class="btn btn-primary w-100 mt-3 razorpay_btn">Pay With Razorpay</button> -->
                        @else
                            <h4 class="text-center">No Products in Cart</h4>
                        @endif
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection
<!-- 
@section('scripts')
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
@endsection -->