<nav class="navbar navbar-expand-lg navbar-light bg-color" style="background-color: #fff;">
  <div class="container">
    <a class="navbar-brand" href="{{url ('/')}}">
      <img src="{{ asset('assets/images/logo.png') }}" alt="Your Logo" height="40">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <!-- Apply left margin to the Home link -->
        <li class="nav-item" style="margin-left: 10px;">
          <a class="nav-link active" aria-current="page" href="{{url('/')}}">Home</a>
        </li>
        <!-- Apply left margin to the Category link -->
        <li class="nav-item" style="margin-left: 10px;">
          <a class="nav-link" href="{{url ('category')}}">Category</a>
        </li>
        <li class="nav-item" style="margin-left: 10px;">
          <a class="nav-link" href="">About Us</a>
        </li>
        <li class="nav-item" style="margin-left: 10px;">
          <a class="nav-link" href="">Contact Us</a>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto">
        <!-- Cart link -->
        <li class="nav-item mr-3">
          <a class="nav-link" href="{{url ('cart')}}">
            <i class="fa fa-shopping-cart"></i>
            <span class="badge badge-pill bg-success cart-count">0</span>
            <!-- <span class="d-none d-sm-inline">Cart</span> -->
          </a>
        </li>
        <!-- Wishlist link -->
        <li class="nav-item mr-3">
          <a class="nav-link" href="{{url ('wishlist')}}">
            <i class="fa fa-heart"></i>
            <span class="badge badge-pill bg-success wishlist-count">0</span>
            <span></span>
            <!-- <span class="d-none d-sm-inline">Wishlist</span> -->
          </a>
        </li>
        <!-- User login/register dropdown -->
        @guest
          <li class="nav-item">
            <a class="nav-link" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-user"></i>
              <!-- <span class="d-none d-sm-inline">User</span> -->
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
              @if (Route::has('login'))
                <li>
                  <a class="dropdown-item" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
              @endif
              @if (Route::has('register'))
                <li>
                  <a class="dropdown-item" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
              @endif
            </ul>
          </li>
        @else
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              <i class="fa fa-user"></i>
              <span class="d-none d-sm-inline">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
              <li>
                <a href="{{url('my-order')}}" class="dropdown-item">
                  My Orders
                </a>
              </li>
              <li>
                <a href="#" class="dropdown-item">
                  My Profile
                </a>
              </li>
              <li>
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
                </form>
              </li>
            </ul>
          </li>
        @endguest
      </ul>
    </div>
  </div>
</nav>
