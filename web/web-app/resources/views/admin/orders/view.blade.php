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
                        <!-- Header with a title and a back button -->
                        <h4 class="text-white">Order View
                            <a href="{{url('orders')}}" class="btn btn-warning float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <!-- Shipping details section -->
                            <div class="col-md-6 order-details">
                                <h4>Shipping Details</h4>
                                <hr>
                                <!-- Display first name -->
                                <label for="">First Name</label>
                                <div class="border">{{ $orders->fname }}</div>

                                <!-- Display last name -->
                                <label for="">Last Name</label>
                                <div class="border">{{ $orders->lname }}</div>

                                <!-- Display email -->
                                <label for="">Email</label>
                                <div class="border">{{ $orders->email }}</div>

                                <!-- Display contact number -->
                                <label for="">Contact No.</label>
                                <div class="border">{{ $orders->phone }}</div>

                                <!-- Display address -->
                                <label for="">Address</label>
                                <div class="border">
                                    {{ $orders->address1 }},<br>
                                    {{ $orders->address2 }},<br>
                                    {{ $orders->city }},<br>
                                </div>

                                <!-- Display postal code -->
                                <label for="">Postal Code</label>
                                <div class="border p-2">{{ $orders->postalCode }}</div>
                            </div>

                            <!-- Order details section -->
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
                                                <!-- Display product name -->
                                                <td>{{ $item->products->name }}</td>

                                                <!-- Display product quantity -->
                                                <td>{{ $item->qty }}</td>

                                                <!-- Display product price -->
                                                <td>{{ $item->price }}</td>

                                                <!-- Display product image -->
                                                <td>      
                                                    <img src="{{ asset('assets/uploads/products/'.$item->products->image) }}" width="50px" alt="Image here">   
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <!-- Display grand total price -->
                                <h5 class="px-2">Grand Total : {{ $orders->total_price }}</h5>
                                <div class="mt-5 px-2">
                                    <label for="">Order Status</label>
                                    <!-- Form to update order status -->
                                    <form action="{{ url('update-order/'.$orders->id) }}" method="POST">
                                        @csrf 
                                        @method('PUT')
                                        <select class="form-select" name="order_status">
                                            <!-- Options for order status -->
                                            <option {{ $orders->status == '0' ? 'selected' : '' }} value="0"> Pending</option>
                                            <option {{ $orders->status == '1' ? 'selected' : '' }} value="1"> Completed</option>
                                        </select>
                                        <!-- Submit button to update order status -->
                                        <button type="submit" class="btn btn-success float-end mt-3">Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>      
            </div>
        </div>
    </div>

@endsection
