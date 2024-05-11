@extends('layouts.front')

@section('title')
    My Orders
@endsection

@section('content')
    
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-success">
                        <h4 class="text-white">Order View
                            <a href="{{url('my-order')}}" class="btn btn-warning  float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 order-details">
                                <h4>Shipping Details</h4>
                                <hr>
                                <label for="">First Name</label>
                                <div class="border">{{ $orders->fname}}</div>

                                <label for="">Last Name</label>
                                <div class="border">{{ $orders->lname}}</div>

                                <label for="">Email</label>
                                <div class="border">{{ $orders->email}}</div>

                                <label for="">Contact No.</label>
                                <div class="border">{{ $orders->phone}}</div>

                                <label for="">Address</label>
                                <div class="border">
                                    {{ $orders->address1}},<br>
                                    {{ $orders->address2}}, <br>
                                    {{ $orders->city}},<br>
                                </div>

                                <label for="">Postal Code</label>
                                <div class="border p-2">{{ $orders->postalCode}}</div>
                            </div>
                            <div class="col-md-6">
                                <h4>Order Details</h4>
                                <hr>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Image</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($orders->orderitems as $item)
                                            <tr>    
                                                <td>{{ $item->products->name}}</td>
                                                <td>{{ $item->qty}}</td>
                                                <td>{{ $item->price}}</td>
                                                <td>      
                                                    <img src=" {{ asset('assets/uploads/products/'.$item->products->image) }}" width="50px" alt="Image here">   
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <h5 class="px-2">Grand Total : {{ $orders->total_price }}</h5>
                            </div>
                        </div>
                        
                    </div>
                </div>
                
            </div>
        </div>
    </div>

@endsection
