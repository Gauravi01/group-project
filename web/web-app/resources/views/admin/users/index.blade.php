@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Registered Users</h4>
            <hr>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Emial</th>
                        <th>Phone</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->name.' '.$item->Lname}}</td> <!-- call the function that create in product model -->
                            <td>{{$item->email}}</td>
                            <td>{{$item->phone}}</td>
                            <td>
                                <a href="{{ url('view-user/' .$item->id) }}" class="btn btn-success btn-sm">View</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
