<div class="sidebar" data-color="green" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
  <!--
    Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"
    Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <!-- Logo and title for the sidebar -->
    <a href="#" class="simple-text logo-normal">
      Wasthra Ceylon
    </a>
  </div>
  <div class="sidebar-wrapper">
    <!-- Navigation menu -->
    <ul class="nav">
      <!-- Dashboard link with active class if current URL is 'dashboard' -->
      <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="./dashboard.html">
          <i class="material-icons">dashboard</i>
          <p>Dashboard</p>
        </a>
      </li>
      <!-- Categories link with active class if current URL is 'categories' -->
      <li class="nav-item {{ Request::is('categories') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('categories') }}">
          <i class="material-icons">category</i>
          <p>Categories</p>
        </a>
      </li>
      <!-- Add Category link with active class if current URL is 'add-category' -->
      <li class="nav-item {{ Request::is('add-category') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('add-category') }}">
          <i class="material-icons">add_box</i>
          <p>Add Category</p>
        </a>
      </li>
      <!-- Products link with active class if current URL is 'products' -->
      <li class="nav-item {{ Request::is('products') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('products') }}">
          <i class="material-icons">inventory</i>
          <p>Products</p>
        </a>
      </li>
      <!-- Add Products link with active class if current URL is 'add-products' -->
      <li class="nav-item {{ Request::is('add-products') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('add-products') }}">
          <i class="material-icons">add_circle</i>
          <p>Add Products</p>
        </a>
      </li>
      <!-- Orders link with active class if current URL is 'orders' -->
      <li class="nav-item {{ Request::is('orders') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('orders') }}">
          <i class="material-icons">content_paste</i>
          <p>Orders</p>
        </a>
      </li>
      <!-- Users link with active class if current URL is 'users' -->
      <li class="nav-item {{ Request::is('users') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('users') }}">
          <i class="material-icons">people</i>
          <p>Users</p>
        </a>
      </li>
    </ul>
  </div>
</div>
