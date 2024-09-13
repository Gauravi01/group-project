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

    /* Set same width and height for all cards */
    .card {
        height: 100%; /* Set card height */
        border-radius: 8px; /* Make the card corners circular */
        overflow: hidden;
    }

    /* Style for image in the card */
    .card-img {
        width: 50px; /* Set image width */
        height: auto; /* Maintain aspect ratio */
        margin-right: 20px; /* Add some margin for separation */
        float: left; /* Align image to the left */
    }

    /* Style for content in the card */
    .card-content {
        display: flex; /* Use flexbox for alignment */
        flex-direction: column; /* Arrange content vertically */
        justify-content: center; /* Center content vertically */
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
      <h2>Your One Stop Shop for All Things Banana!</h2>
      <p>Join us on a journey of flavour, health and sustainability..
      </p>
      <button class="btn btn-outline-success">
        <a href="{{ route('login') }}" >Shop Now</a>
      </button>
    </div>
    
    <!-- What We Do in the middle of the page -->
    <div class="col-lg-12 text-center mt-3">
      <h2 class="mt-5">Our Commitments</h2>
      <div class="row mt-5">
        <!-- Card 1 -->
        <div class="col-lg-3 mt-3 mb-3">
          <div class="card shadow">
            <div class="card-body btn-outline-success position-relative">
              <img src="assets/icons/icons8-free-shipping-50.png" alt="category image" class="card-img">
              <div class="card-content">
                <h4 class="theme-color">Free Shipping</h4>
                <span class="text-dark">About 5$ only</span>
              </div>
            </div>
          </div>
        </div>
        <!-- Card 2 -->
        <div class="col-lg-3 mt-3 mb-3">
          <div class="card shadow">
            <div class="card-body btn-outline-success">
              <img src="assets/icons/icons8-pass-fail-64.png" alt="category image" class="card-img">
              <div class="card-content">
                <h4 class="theme-color">Certified Organic</h4>
                <span class="text-dark">100% Guarantee</span>
              </div>
            </div>
          </div>
        </div>
        <!-- Card 3 -->
        <div class="col-lg-3 mt-3 mb-3">
          <div class="card shadow">
            <div class="card-body btn-outline-success">
              <img src="assets/icons/icons8-savings-50.png" alt="category image" class="card-img">
              <div class="card-content">
                <h4 class="theme-color">Huge Savings</h4>
                <span class="text-dark">At Lowest Price</span>
              </div>
            </div>
          </div>
        </div>
        <!-- Card 4 -->
        <div class="col-lg-3 mt-3 mb-3">
          <div class="card shadow">
            <div class="card-body btn-outline-success">
              <img src="assets/icons/icons8-eco-friendly-66.png" alt="category image" class="card-img">
              <div class="card-content">
                <h4 class="theme-color">Eco Friendly</h4>
                <span class="text-dark">Highest Quality Products</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>


</body>
</html>
