@extends('layouts.front')

@section('title')
    Checkout
@endsection

@section('content')

    <div class="container mt-3">
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
                                <input type="text" class="form-control" value="{{Auth::user()->name}}" name="fname" placeholder="Enter First Name">
                            </div>
                            <div class="col-md-6">
                                <label for="">Last Name</label>
                                <input type="text" class="form-control" value="{{Auth::user()->Lname}}" name="lname" placeholder="Enter Last Name">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Address 1</label>
                                <input type="text" class="form-control" value="{{Auth::user()->address1}}" name="address1" placeholder="Enter Address 1">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Address 2</label>
                                <input type="text" class="form-control" value="{{Auth::user()->address2}}" name="address2" placeholder="Enter Address 2">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Phone Number</label>
                                <input type="text" class="form-control" value="{{Auth::user()->phone}}" name="phone" placeholder="Enter Phone Number">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">E mail</label>
                                <input type="text" class="form-control" value="{{Auth::user()->email}}" name="email" placeholder="Enter E mail">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">City</label>
                                <input type="text" class="form-control" value="{{Auth::user()->city}}" name="city" placeholder="Enter City">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Postal Code</label>
                                <input type="text" class="form-control" value="{{Auth::user()->postalCode}}" name="postalCode" placeholder="Enter Postal Code">
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
                        <table class="table table-striped table-bordered">
                            <thead>
                               <tr>
                                <th>Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                               </tr> 
                            </thead>
                            <tbody>
                                @foreach($cartitems as $item)
                                <tr>
                                    <td>{{$item->products->name}}</td>
                                    <td>{{$item->prod_qty}}</td>
                                    <td>{{$item->products->selling_price * $item->prod_qty}}</td> <!-- Corrected price calculation -->
                                </tr>
                                @endforeach
                            </tbody>
                        </table>    
                        <hr>
                        <button type="submit" class="btn btn-primary float-end">Place Order</button>
                    </div>
                </div>
                </div>
            </div>
        </form>
    </div>

@endsection