@extends('layouts.admin')

@section('title')
    Orders
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <!-- Header with a title and a button to navigate to order history -->
                        <h4 class="text-white">New Orders
                            <a href="{{ url('order-history') }}" class="btn btn-warning float-right">Order History</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <!-- Table to display new orders -->
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <!-- Table headers for order details -->
                                    <th>Order Date</th>
                                    <th>Tracking Number</th>
                                    <th>Total Price</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Loop through each order and display its details in a table row -->
                                @foreach($orders as $item)
                                    <tr>
                                        <!-- Display order date in 'day-month-year' format -->
                                        <td>{{ date('d-m-y', strtotime($item->created_at)) }}</td>

                                        <!-- Display tracking number -->
                                        <td>{{ $item->tracking_no }}</td>

                                        <!-- Display total price -->
                                        <td>{{ $item->total_price }}</td>

                                        <!-- Display order status as 'Pending' or 'Completed' based on the status value -->
                                        <td>{{ $item->status == '0' ? 'Pending' : 'Completed' }}</td>

                                        <!-- Action button to view detailed order information -->
                                        <td>
                                            <a href="{{ url('admin/view-order/'.$item->id) }}" class="btn btn-success">View</a>
                                        </td>  
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>    
            </div>
        </div>
    </div>

@endsection
