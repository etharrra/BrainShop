<!DOCTYPE html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

  
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>BRAINSHOP</title>

  <!-- Favicon -->
  <link rel="icon" href="{{url('/img/brainlogo.png')}}">

  <!-- Fontawesome for this template-->
  <link href="{{ asset('sb_admin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">

  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Bootstrap core CSS -->
  <link href="{{ asset('frontend/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="{{ asset('frontend/css/modern-business.css')}}" rel="stylesheet">

  <!-- include summernote css/js -->
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

  <style type="text/css">

    .dropdown-item.active, .dropdown-item:active, .list-group-item.active
    {
      background-color: #673AB7;
      border-color: #673AB7;
    }
    
    .primary,
    {
      color: #673AB7;
    }

    .secondary
    {
      color: #7C4DFF;
    }

    a:hover

    {
      text-decoration: none;
    }

    .badge-notify
    {
      background: white;
      position: relative;
      top: -15px;
      left: -10px;
      border-radius: 73rem;
    }

    body{
      min-height: 100vh;
    }
    #page-content{
      flex: 1 0 auto;
    }
    .note-editable {
      padding: 30px !important;
      background-color: white !important;
    }

  </style>

</head>

<body class="d-flex flex-column">

  <!-- Navigation -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark  fixed-top" style="background-color: #673AB7">
    <div class="container">
      <a class="navbar-brand" href="/">
        <img src="{{url('/img/brainlogo.png')}}" height="50" width="50">
        Brain Shop
      </a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item px-3">
            <a class="nav-link" href="{{ url('/')}}">Home </a>
          </li>

          <!-- Category -->
          <li class="nav-item dropdown px-3">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Category
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
                @foreach($navcat as $value)
                <a class="dropdown-item" href=' {{ url("/categories/detail/$value->id")}}'>
                  {{$value->name}}
                </a>
                @endforeach

              <div class="dropdown-divider"></div>

              <a class="dropdown-item" href="{{ url('/categories')}}"> View More </a>

            </div>
          </li>
          <!-- End Category -->

          <li class="nav-item px-3">
            <a class="nav-link" href="{{ url('/items')}}">Items</a>
          </li>
          
          <li class="nav-item dropdown px-3">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Services
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
              <a class="dropdown-item" href=""> 
                <i class="fas fa-question pr-3"></i>Help Center 
              </a>
              <div class="dropdown-divider"></div>

              <a class="dropdown-item" href=""> 
                <i class="fas fa-box pr-3"></i>
                Order 
              </a>
              <div class="dropdown-divider"></div>

              <a class="dropdown-item" href=""> 
                <i class="fas fa-shipping-fast pr-3"></i>Shipping & Delivery 
              </a>
              <div class="dropdown-divider"></div>

              <a class="dropdown-item" href=""> 
                <i class="fab fa-cc-visa pr-3"></i>
                Payment 
              </a>
              <div class="dropdown-divider"></div>

              <a class="dropdown-item" href="">
                <i class="fas fa-exchange-alt pr-3"></i> 
                Returns & Refunds 
              </a>

            </div>
          </li>

          <li class="nav-item px-3">
            <a class="nav-link" href="">Contact</a>
          </li>

          <li class="nav-item px-3">
            <a class="nav-link" href="{{ url('/cart')}}"> 
              <i class="fas fa-shopping-cart"></i>
              <span class="badge badge-pill badge-light badge-notify cartnoti"></span>
              My Cart 
            </a>
          </li>

          @auth
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             {{ Auth::user()->name }}
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
              <a class="dropdown-item py-2" href="">
                <i class="far fa-laugh-beam pr-3"></i>
                Manage My Account
              </a>
              <div class="dropdown-divider"></div>

              <a class="dropdown-item" href="myorder">
                <i class="fas fa-box pr-3"></i>
                My Orders
              </a>
              <div class="dropdown-divider"></div>

              <a class="dropdown-item" href="">
                <i class="far fa-times-circle pr-3"></i>
                My Cancellations
              </a>
              <div class="dropdown-divider"></div>

              <a class="dropdown-item" href="">
                <i class="fas fa-key pr-3"></i>
                Change Password
              </a>
              <div class="dropdown-divider"></div>

              <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"> 
                <i class="fas fa-sign-out-alt pr-3"></i>
                Logout 
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
              </form>
          </li>
          @endauth

          @guest
            <li class="nav-item px-3">
              <a class="nav-link" href="{{ route('login') }}">Login </a>
            </li>

            <li class="nav-item px-3">
              <a class="nav-link" href="{{ route('register') }}">Sign Up</a>
            </li>
          @endguest


          </ul>
        </div>
      </div>
    </nav>

    <header class="py-5 mb-5 bg-light">
      <div class="container" style="height: 100%;">
        <div class="row align-items-center" style="height: 100%">
          <div class="col-lg-7 col-md-12 col-sm-12">
            <h1 class="disply-4 mt-5 mb-2"> Welcome to <span class="primary"> BRAINSHOP.COM </span> </h1>
            <p class="lead mb-5 text-secondary-50">
              We ship over 45 million products in Myanmar
            </p>
          </div>

          <div class="col-lg-5">
            <img src="{{url('frontend/img/header_banner.png')}}" class="img-fluid">
          </div>

        </div>
      </div>
    </header>

    <div id="page-content">
      @yield('content')
    </div>

    <div class="container-fluid bg-light p-5 mt-5">

      <div class="row">
        <div class="col-3">
          <div class="row">
            <div class="col-md-4">
              <i class="fas fa-shipping-fast fa-3x primary"></i>
            </div>

            <div class="col-md-8">
              <h6>Door to Door Delivery</h6>
              <p class="text-muted" style="font-size: 12px">On-time Delivery</p>
            </div>
          </div>
        </div>

        <div class="col-3">
          <div class="row">
            <div class="col-md-4">
              <i class="fas fa-phone fa-3x primary"></i>
            </div>

            <div class="col-md-8">
              <h6> Customer Service </h6>
              <p class="text-muted" style="font-size: 12px">  09-779-999-915 ၊ <br> 09-779-999-913 </p>
            </div>
          </div>
        </div>

        <div class="col-3">
          <div class="row">
            <div class="col-md-4">
              <i class="fas fa-undo-alt fa-3x primary"></i>
            </div>

            <div class="col-md-8">
              <h6 > 100% satisfaction </h6>
              <p class="text-muted" style="font-size: 12px"> 3 days return </p>
            </div>
          </div>
        </div>

        <div class="col-3">
          <div class="row">
            <div class="col-md-4">
              <i class="far fa-credit-card fa-3x primary"></i>
            </div>

            <div class="col-md-8">
              <h6> Cash on Delivery </h6>
              <p class="text-muted" style="font-size: 12px"> Door to Door Service </p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container p-5">
      <div class="row text-center">
        <div class="col-12">
          <h1> News Letter </h1>
          <p>
            Subscribe to our newsletter and get 10% off your first purchase
          </p>

        </div>

        <div class="offset-2 col-8 offset-2 mt-5">
          <form>
            <div class="input-group mb-3">
              <input type="text" class="form-control form-control-lg px-5 py-3" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2" style="border-top-left-radius: 15rem; border-bottom-left-radius: 15rem">
              
              <div class="input-group-append">
                <button class="btn btn-secondary" type="button" id="button-addon2" style="border-top-right-radius:15rem; border-bottom-right-radius: 15rem; background-color: #673AB7; border-color: #673AB7"> Subscribe </button>
              </div>


            </div>
          </form>
        </div>

      </div>
    </div>
    <!-- Footer -->
    <footer class="py-3 mt-5" style="background-color: #673AB7">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; brainshop 2020</p>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('frontend/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('frontend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('frontend/custom.js')}}"></script>

    <!-- Summer Note -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    <script type="text/javascript">
      $(document).ready(function() {
        $('.summernote').summernote({
          airMode: true
        });
        $('.summernote').summernote('disable');
      });
    </script>
    
  </body>

  </html>  