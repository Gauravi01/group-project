<nav class="navbar navbar-expand-lg navbar-light bg-light">
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
      </ul>
      <ul class="navbar-nav ms-auto">
        <!-- Cart link -->
        <li class="nav-item">
          <a class="nav-link mr-3" href="{{url ('cart')}}">
            <i class="fa fa-shopping-cart mr-2"></i> My Cart
          </a>
        </li>
        <!-- User login/register dropdown -->
        @guest
          <li class="nav-item">
            <a class="nav-link" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-user"></i>
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
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              {{ Auth::user()->name }}
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
