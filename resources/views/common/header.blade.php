<!-- Top Header Start -->
<div class="top-header">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-3">
                <div class="logo">
                    <a href="">
                        <img src="img/logo.png" alt="Logo">
                    </a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="search">
                    <input type="text" placeholder="Search">
                    <button><i class="fa fa-search"></i></button>
                </div>
            </div>
            <div class="col-md-3">
                <div class="user">
                    @if(Auth::check())
                        <div class="dropdown">
                            <a href="{{url('my-account')}}">My Account</a>
                        </div>
                    @else
                        <div class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">My Account</a>
                            <div class="dropdown-menu">
                                <a href="{{ url('login') }}" class="dropdown-item">Login</a>
                                <a href="{{ url('register') }}" class="dropdown-item">Register</a>
                            </div>
                        </div>
                    @endif
                    <div class="cart">
                        <i class="fa fa-cart-plus"></i>
                        <span>(0)</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Top Header End -->


<!-- Header Start -->
<div class="header">
    <div class="container">
        <nav class="navbar navbar-expand-md bg-dark navbar-dark">
            <a href="#" class="navbar-brand">MENU</a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav m-auto">
                    <a href="{{ url('/') }}" class="nav-item nav-link active">Home</a>
                    <a href="{{ url('product-list') }}" class="nav-item nav-link">Products</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu">
                            <a href="{{ url('product-list') }}" class="dropdown-item">Product</a>
                            <a href="{{url('product-details')}}" class="dropdown-item">Product Detail</a>
                            <a href="{{url('cart')}}" class="dropdown-item">Cart</a>
                            <a href="{{url('my-account')}}" class="dropdown-item">My Account</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Categories</a>
                        <div class="dropdown-menu">
                            @isset($categories)
                                @if ($categories->isEmpty())
                                    <a class="dropdown-item">No categories available</a>
                                @else
                                    @foreach ($categories as $category)
                                        <a href="{{ url('/products?category_id=' . $category->id) }}" class="dropdown-item">
                                            {{ $category->category_name }}
                                        </a>
                                    @endforeach
                                @endif
                            @else
                                <a class="dropdown-item">Categories not available</a>
                            @endisset
                        </div>
                    </div>

                    <a href="{{ url('contact') }}" class="nav-item nav-link">Contact Us</a>
                </div>
            </div>
        </nav>
    </div>
</div>
<!-- Header End -->