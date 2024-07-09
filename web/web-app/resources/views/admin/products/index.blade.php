@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Products page</h4>
            <hr>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Category</th>
                        <th>Name</th>
                        <th>Selling Price(Rs.)</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->category->name}}</td> <!-- call the function that create in product model -->
                            <td>{{$item->name}}</td>
                            <td>{{$item->selling_price}}</td>
                            <td>
                                <img src="{{asset('assets/uploads/products/' .$item->image)}}" class="cate-image" alt="Image here" data-toggle="modal" data-target="#imageModal" data-image="{{asset('assets/uploads/products/' .$item->image)}}">
                            </td>
                            <td>
                                <a href="{{ url('edit-prod/' .$item->id) }}" class="btn btn-success btn-sm">Edit</a>
                                <a href="{{url('delete-prod/'.$item->id)}}" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="imageModalLabel">Image</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <img id="modalImage" src="" alt="Image" class="img-fluid fixed-size">
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        $('#imageModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var imageSrc = button.data('image'); // Extract info from data-* attributes
            var modal = $(this);
            modal.find('#modalImage').attr('src', imageSrc);
        });
    });
</script>

<style>
    .fixed-size {
        width: 500px; /* Set your desired width */
        height: 500px; /* Set your desired height */
        object-fit: cover; /* This will ensure the image covers the area without stretching */
    }
</style>
@endsection
