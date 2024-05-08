<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap CSS -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <title>Slider with Text</title>
</head>
<style>
    /* Adjust container width and margin */
    .container {
        max-width: 90%; /* Set the maximum width of the container */
        margin-left: auto; /* Auto left margin to center the container */
        margin-right: auto; /* Auto right margin to center the container */
    }
</style>

<body>

<div class="container">
  <div class="row">
    <!-- Carousel on the left -->
    <div class="col-lg-8">
      <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <!-- Carousel Inner -->
        <div class="carousel-inner mt-4">
          <div class="carousel-item active">
            <img src="{{asset('assets/images/chocolate-chip-banana-muffins-2.jpg')}}" class="d-block w-100" style="height: 500px;" alt="...">
          </div>
          <div class="carousel-item">
            <img src="{{asset('assets/images/istockphoto-149044725-612x612.jpg')}}" class="d-block w-100" style="height: 500px;" alt="...">
          </div>
          <div class="carousel-item">
            <img src="{{asset('assets/images/06.jpg')}}" class="d-block w-100" style="height: 500px;" alt="...">
          </div>
        </div>
        <!-- Carousel Control Buttons -->
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>
    
    <!-- Text content in the middle of right side -->
    <div class="col-lg-4 align-self-center text-center">
      <h2>Text in the Middle of Right Side</h2>
      <p>This is some text content that you want to display on the right side of the page, next to the carousel.</p>
      <button class="btn btn-success" style="background-color: #099d02;">
        <a href="{{ route('login') }}">Shop Now</a>
      </button>
    </div>
    
    <!-- Remaining space on the right -->
    <div class="col-lg-4"></div>
    
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>


</body>
</html>
