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
                        <!-- Header with a title and a button to view new orders -->
                        <h4 class="text-white">Order History
                            <a href="{{ url('orders') }}" class="btn btn-warning float-right">New Orders</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <!-- Table to display order history -->
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Order Date</th>
                                    <th>Tracking Number</th>
                                    <th>Total Price</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
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
