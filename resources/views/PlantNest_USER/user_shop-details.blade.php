<?php
use App\Models\add_to_cart;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Plant Nest</title>

    <!-- Favicon -->
    <link rel="icon" href="../PlantNest_USER/img/core-img/favicon.ico">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.min.css">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="../PlantNest_USER/style.css">

</head>

<body>
    @if(session('success'))
    <script>
    Swal.fire({
        icon: 'success',
        title: 'Success',
        text: '{{ session("success") }}',
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'OK'
    });
    </script>
    @endif
    <!-- Preloader -->
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-circle"></div>
        <div class="preloader-img">
            <img src="../PlantNest_USER/img/core-img/leaf.png" alt="">
        </div>
    </div>

    <!-- ##### Header Area Start ##### -->
    <header class="header-area">

        <!-- ***** Top Header Area ***** -->
        <div class="top-header-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="top-header-content d-flex align-items-center justify-content-between">
                            <!-- Top Header Content -->
                            <div class="top-header-meta">
                                <a href="#" data-toggle="tooltip" data-placement="bottom"
                                    title="infodeercreative@gmail.com"><i class="fa fa-envelope-o"
                                        aria-hidden="true"></i> <span>Email: techgurus@aptechgdn.net</span></a>
                                <a href="#" data-toggle="tooltip" data-placement="bottom" title="+1 234 122 122"><i
                                        class="fa fa-phone" aria-hidden="true"></i> <span>Call Us:
                                        +92 3400154824</span></a>
                            </div>

                            <!-- Top Header Content -->
                            <div class="top-header-meta d-flex">
                                <!-- Language Dropdown -->
                                <div class="language-dropdown">
                                    <!-- <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle mr-30" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Language</button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="#">USA</a>
                                            <a class="dropdown-item" href="#">UK</a>
                                            <a class="dropdown-item" href="#">Bangla</a>
                                            <a class="dropdown-item" href="#">Hindi</a>
                                            <a class="dropdown-item" href="#">Spanish</a>
                                            <a class="dropdown-item" href="#">Latin</a>
                                        </div>
                                    </div> -->
                                </div>
                                <!-- Login -->

                                <?php

		                $user =DB::table("user_registrations")->where("email",  (session('sessionuseremail')))->first();
		

                                                ?>

                                @if(session('sessionuseremail'))
                                <!-- <a href="#"><i class="fa fa-user" aria-hidden="true"></i> <span>{{session('sessionusername')}}</span></a> -->

                                <div class="language-dropdown">
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle mr-30" type="button"
                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">{{$user->first_name}}</button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="/profile">Profile</a>
                                            <a class="dropdown-item" href="/logout">Logout</a>
                                        </div>
                                    </div>
                                </div>
                                @else

                                <div class="login">
                                    <a href="/login"><i class="fa fa-user" aria-hidden="true"></i>
                                        <span>Login</span></a>
                                </div>


                                <!-- Register -->
                                <div class="login">
                                    <a href="/register"><i class="fa fa-user" aria-hidden="true"></i>
                                        <span>Register</span></a>
                                </div>

                                @endif
                                <!-- Cart -->

                                <?php

                                    $productsCount = add_to_cart::where('user_id', session('sessionid'))->count();

                                ?>
                                <div class="cart">
                                    @if(session('sessionuseremail'))
                                    <a href="/cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i> <span>Cart
                                            <span class="cart-quantity">{{ $productsCount }}</span></span></a>

                                    @else
                                    <a href="/cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i> <span>Cart
                                            <span class="cart-quantity">0</span></span></a>

                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ***** Navbar Area ***** -->
        <div class="alazea-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="alazeaNav">

                        <!-- Nav Brand -->
                        <a href="/" class="nav-brand" style=" color:white; font-size:2.2rem; width:180px;"><img
                            src="../images/GS logo.png" alt=""></a>

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">

                            <!-- Close Button -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Navbar Start -->
                            <div class="classynav">
                                <ul>
                                    <li><a href="/">Home</a></li>
                                    <li><a href="/about">About</a></li>
                                    <li><a href="#">Pages</a>
                                        <ul class="dropdown">
                                            <li><a href="/">Home</a></li>
                                            <li><a href="/about">About</a></li>
                                            <li><a href="/shop">Shop</a>

                                                <ul class="dropdown">
                                                    <li><a href="/shop">Shop</a></li>
                                                    <li><a href="/cart">Shopping Cart</a></li>
                                                    <li><a href="/wishlist">Wishlist</a>

                                                        @if(session('sessionuseremail'))
                                                    <li><a href="/checkout">Checkout</a></li>


                                                    @endif
                                                </ul>
                                            </li>
                                            <li><a href="/contact">Contact</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Shop</a>
                                        <ul class="dropdown">
                                            <li><a href="/shop">Plants</a>
                                                <ul class="dropdown">
                                                    <li><a href="/followingplants">Flowering Plants</a></li>
                                                    <li><a href="/non_floweringplant">Non-Flowering Plants</a></li>
                                                    <li><a href="/indoorplant">Indoor Plants</a></li>
                                                    <li><a href="/outdoorplant">Outdoor Plants</a></li>
                                                    <li><a href="/medicinal">Medicinal Plants</a></li>
                                                    <li><a href="/succulent">Succulents Plants</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="/accessories">Accessories</a> </li>
                                        </ul>
                                    </li>
                                    <li><a href="/contact">Contact</a></li>
                                </ul>

                                <!-- Search Icon -->
                                <div id="searchIcon">
                                    <!-- <i class="fa fa-search" aria-hidden="true"></i> -->
                                </div>

                            </div>
                            <!-- Navbar End -->
                        </div>
                    </nav>

                    <!-- Search Form -->
                    <div class="search-form">
                        <form action="{{URL::to('/search')}}" method="Post">
                            @csrf
                            <input type="search" name="searchinput" id="search"
                                placeholder="Type keywords &amp; press enter...">
                            <button type="submit" class="d-none"></button>
                        </form>
                        <!-- Close Icon -->
                        <div class="closeIcon"><i class="fa fa-times" aria-hidden="true"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.min.css">
    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="{{ asset('PlantNest_USER/style.css') }}">
    <!-- ##### Breadcrumb Area Start ##### -->
    @if(session('success'))
    <script>
    Swal.fire({
        icon: 'successmessage',
        title: 'successmessage',
        text: '{{ session("successmessage") }}',
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'OK'
    });
    </script>
    @endif
    <div class="breadcrumb-area">
        <!-- Top Breadcrumb Area -->
        <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center"
            style="background-image: url(../PlantNest_USER/img/bg-img/24.jpg);">
            <h2>SHOP DETAILS</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Shop</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Shop Details</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Single Product Details Area Start ##### -->
    <section class="single_product_details_area mb-50">
        <div class="produts-details--content mb-50">
            <div class="container">
                <div class="row justify-content-between">

                    <div class="col-12 col-md-6 col-lg-5">
                        <div class="single_product_thumb">
                            <div id="product_details_slider" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">

                                    <div class="carousel-item active">
                                        <a class="product-img" href="" title="Product Image">
                                            <img class="d-block w-100" src="../images/{{$detail['image1']}}" alt="1"
                                                style="height:500px; width:200px;">
                                        </a>
                                    </div>
                                    <div class="carousel-item">
                                        <!-- <a class="product-img" href="../PlantNest_USER/img/bg-img/49.jpg" title="Product Image"> -->
                                        <img class="d-block w-100" src="../images/{{$detail['image1']}}" alt="1"
                                            style="height:500px; width:200px;">
                                        </a>
                                    </div>
                                    <div class="carousel-item">
                                        <!-- <a class="product-img" href="../PlantNest_USER/img/bg-img/49.jpg" title="Product Image"> -->
                                        <img class="d-block w-100" src="../images/{{$detail['image1']}}" alt="1"
                                            style="height:500px; width:200px;">
                                        </a>
                                    </div>
                                </div>
                                <ol class="carousel-indicators">
                                    <li class="active" data-target="#product_details_slider" data-slide-to="0"
                                        style="height:115px;">
                                        <img class="d-block w-100" src="../images/{{$detail['image2']}}" alt="1"
                                            style="height:110px;">

                                    </li>
                                    <li class="active" data-target="#product_details_slider" data-slide-to="0"
                                        style="height:115px;">
                                        <img class="d-block w-100" src="../images/{{$detail['image3']}}" alt="1"
                                            style="height:110px;">

                                    </li>
                                    <li class="active" data-target="#product_details_slider" data-slide-to="0"
                                        style="height:115px;">
                                        <img class="d-block w-100" src="../images/{{$detail['image4']}}" alt="1"
                                            style="height:110px;">

                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6">
                        <div class="single_product_desc">
                            <h4 class="title">{{$detail['name']}}</h4>
                            <h4 class="price">RS {{$detail['price']}}</h4>
                            <div class="short_overview">

                                <p class="price" style="font-weight:bold; font-size:1rem;"> {{$detail['description']}}
                                </p>
                                </p>
                            </div>

                            <div class="cart--area d-flex flex-wrap align-items-center">
                                <!-- Add to Cart Form -->
                                <form class="cart clearfix d-flex align-items-center" id="add-to-cart-form">
                                    @csrf
                                    <div class="quantity">
                                        <input type="hidden" value="{{$detail['plant_id']}}" name="product_id">
                                        <input type="hidden" value="{{$detail['price']}}" id="product_price"
                                            name="product_price">
                                        <span class="qty-minus" onclick="changeQuantity(-1);"><i class="fa fa-minus"
                                                aria-hidden="true"></i></span>
                                        <input type="number" class="qty-text" id="qty" step="1" min="1" max="100"
                                            name="quantity" value="1" oninput="updateTotalPrice(this.value)">
                                        <span class="qty-plus" onclick="changeQuantity(1);"><i class="fa fa-plus"
                                                aria-hidden="true"></i></span>
                                    </div>
                                    <input type="hidden" id="total_price" name="total_price"
                                        value="{{$detail['price']}}" readonly>
                                    <!-- <div class="checkout-btn">
                                        @if(session('sessionuseremail'))
                                        @if($detail->quantity > 0)
                                        @if($detail->quantity <= 2) <span class="btn alazea-btn w-100 ml-2" disabled>Low
                                            Stock</span>
                                            @else
                                            <a href="/user_checkout" class="btn alazea-btn w-100 ml-2">Buy Now</a>
                                            @endif
                                            @else
                                            <span class="btn alazea-btn w-100 ml-2" disabled>Out of Stock</span>
                                            @endif
                                            @else
                                            <a onclick="redirectToLoginbuy()" class="btn alazea-btn w-100 ml-2">Buy
                                                Now</a>
                                            @endif
                                    </div> -->



                                    @if(session('sessionuseremail'))
                                    <button type="button" id="add-to-cart-btn" class="btn alazea-btn ml-15">Add to
                                        cart</button>
                                    @else
                                    <button type="button" onclick="redirectToLogin()" class="btn alazea-btn ml-15">Add
                                        to Cart</button>
                                    @endif
                                </form>


                                <!-- Wishlist & Compare -->
                                <div class="wishlist-compare d-flex flex-wrap align-items-center">
                                    <!-- Wishlist Form -->
                                    <form class="cart clearfix d-flex align-items-center" id="wishlist-form">
                                        @csrf
                                        <input type="hidden" value="{{$detail['plant_id']}}" name="product_id">

                                        @if(session('sessionuseremail'))
                                        <button type="button" id="wishlist-btn" class="ml-2 btn btn-danger"
                                            style="color:white;"><i class="icon_heart_alt btn "></i></button>

                                        @else
                                        <button type="button" onclick="redirectToLoginWishlist()"
                                            class="ml-2 btn btn-danger" style="color:white;"><i
                                                class="icon_heart_alt btn "></i></button>
                                        @endif
                                    </form>

                                </div>
                            </div>

                            <div class="products--meta">
                                <p><span>SKU:</span> <span>CT201807</span></p>
                                <p><span>Category:</span> <span>Outdoor Plants</span></p>
                                <p><span>Tags:</span> <span>plants, green, cactus </span></p>
                                <p>
                                    <span>Share on:</span>
                                    <span>
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                        <a href="#"><i class="fa fa-pinterest"></i></a>
                                        <a href="#"><i class="fa fa-google-plus"></i></a>
                                    </span>
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product_details_tab clearfix">
                        <!-- Tabs -->
                        <ul class="nav nav-tabs" role="tablist" id="product-details-tab">
                            <li class="nav-item">
                                <a href="#description" class="nav-link active" data-toggle="tab"
                                    role="tab">Description</a>
                            </li>
                            <!-- <li class="nav-item">
                            <a href="#addi-info" class="nav-link" data-toggle="tab" role="tab">Additional
                                Information</a>
                        </li> -->
                            <li class="nav-item">
                                <a href="#reviews" class="nav-link" data-toggle="tab" role="tab">Reviews <span
                                        class="text-muted">(1)</span></a>
                            </li>
                        </ul>
                        <!-- Tab Content -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade show active" id="description">
                                <div class="description_area">
                                    <p style="font-size:1.5rem;">
                                        {{$detail['description']}}
                                    </p>

                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="addi-info">
                                <div class="additional_info_area">
                                    <p>What should I do if I receive a damaged parcel?
                                        <br> <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                            Reprehenderit
                                            impedit similique qui, itaque delectus labore.</span>
                                    </p>
                                    <p>I have received my order but the wrong item was delivered to me.
                                        <br> <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis
                                            quam
                                            voluptatum beatae harum tempore, ab?</span>
                                    </p>
                                    <p>Product Receipt and Acceptance Confirmation Process
                                        <br> <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum
                                            ducimus, temporibus soluta impedit minus rerum?</span>
                                    </p>
                                    <p>How do I cancel my order?
                                        <br> <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum
                                            eius
                                            eum, minima!</span>
                                    </p>
                                </div>
                            </div>

                            <div class="submit_a_review_area mt-50">
                                <h4>Submit A Review</h4>




                                @if(session('errormessage'))
                                <div class="alert alert-info" role="alert">
                                    <strong>{{(session('errormessage'))}}</strong>
                                </div>
                                @endif
                                <form action="{{URL::to('/reviewsrating')}}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-md-4 offset-md-4">

                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="form-group">
                                                        <div class="rate">
                                                            <input type="radio" id="star5" name="rate" value="5"
                                                                required />
                                                            <label for="star5" title="5">5 stars</label>
                                                            <input type="radio" id="star4" name="rate" value="4"
                                                                required />
                                                            <label for="star4" title="4">4 stars</label>
                                                            <input type="radio" id="star3" name="rate" value="3"
                                                                required />
                                                            <label for="star3" title="3">3 stars</label>
                                                            <input type="radio" id="star2" name="rate" value="2"
                                                                required />
                                                            <label for="star2" title="2">2 stars</label>
                                                            <input type="radio" id="star1" name="rate" value="1"
                                                                required />
                                                            <label for="star1" title="1">1 star</label>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="comments">Comments</label>
                                                        <textarea class="form-control" id="comments" rows="5"
                                                            data-max-length="150" name="review" required></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <button type="submit" class="btn alazea-btn">Submit Your
                                                        Review</button>
                                                </div>
                                            </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- ##### Single Product Details Area End ##### -->

    <!-- ##### Related Product Area Start ##### -->
    <div class="related-products-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Section Heading -->
                    <div class="section-heading text-center">
                        <h2>Related Products</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach($randomProducts as $index => $pd)
                @if($index < 4) <!-- Single Product Area -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="single-product-area mb-100">
                            <!-- Product Image -->
                            <div class="product-img">
                                <center>
                                    <a><img src="../images/{{$pd->image1}}" alt=""
                                            style="height:200px; width:200px;"></a>

                                </center>
                                <!-- Product Tag -->
                                <div class="product-tag">
                                    <a href="#">Hot</a>
                                </div>
                                <!-- <div class="product-meta d-flex">
                                <a href="#" class="wishlist-btn"><i class="icon_heart_alt"></i></a>
                                <a href="/shop_details/{{$pd->plant_id}}" class="add-to-cart-btn">View</a>
                                <a href="#" class="compare-btn"><i class="arrow_left-right_alt"></i></a>
                            </div> -->
                            </div>
                            <!-- Product Info -->
                            <div class="product-info mt-15 text-center">
                                <a>
                                    <p>{{$pd->name}}</p>
                                </a>
                                <h6>RS {{$pd->price}}</h6>
                                <a href="/shop_details/{{$pd->plant_id}}"><button class="btn mt-3"
                                        style="background-color:#70C745; color:white; width:150px;">View</button></a>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
            </div>
        </div>
    </div>
    <!-- ##### Related Product Area End ##### -->


    <!-- ##### Footer Area Start ##### -->
    <footer class="footer-area bg-img" style="background-image: url(../PlantNest_user/img/bg-img/3.jpg);">
        <!-- Main Footer Area -->
        <div class="main-footer-area">
            <div class="container">
                <div class="row">

                    <!-- Single Footer Widget -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="single-footer-widget">
                            <div class="footer-logo mb-30">
                                <a href="#" style=" color:white; font-size:2.2rem;"><img src="../images/GS logo.png" alt="" style="width:180px;"></a>
                            </div>
                            <p>
                                Discover the perfect home for your plants with our innovative plant nests, providing a
                                cozy and stylish haven for your green companions.
                            </p>
                            <div class="social-info">
                                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Single Footer Widget -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="single-footer-widget">
                            <div class="widget-title">
                                <h5>QUICK LINK</h5>
                            </div>
                            <nav class="widget-nav">
                                <ul>
                                    <li><a href="#">Purchase</a></li>
                                    <li><a href="#">FAQs</a></li>
                                    <li><a href="#">Payment</a></li>
                                    <li><a href="#">News</a></li>
                                    <li><a href="#">Return</a></li>
                                    <li><a href="#">Advertise</a></li>
                                    <li><a href="#">Shipping</a></li>
                                    <li><a href="#">Career</a></li>
                                    <li><a href="#">Orders</a></li>
                                    <li><a href="#">Policities</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>

                    <!-- Single Footer Widget -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="single-footer-widget">
                            <div class="widget-title">
                                <h5>BEST SELLER</h5>
                            </div>

                            @foreach($randomProducts as $index => $pd)
                            @if($index < 2) <!-- Single Best Seller Products -->
                                <div class="single-best-seller-product d-flex align-items-center">
                                    <div class="product-thumbnail">
                                        <a href="/shop"><img src="../images/{{$pd->image1}}" alt=""></a>
                                    </div>
                                    <div class="product-info">
                                        <a href="/shop">{{$pd->name}}</a>
                                        <p>RS {{$pd->price}}</p>
                                    </div>
                                </div>
                                @endif
                                @endforeach

                        </div>
                    </div>

                    <!-- Single Footer Widget -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="single-footer-widget">
                            <div class="widget-title">
                                <h5>CONTACT</h5>
                            </div>

                            <div class="contact-information">
                                <p><span>Address:</span> karachi, Pakistan</p>
                                <p><span>Phone:</span> +92 3400154824</p>
                                <p><span>Email:</span> techgurus@aptechgdn.net</p>
                                <p><span>Open hours:</span> Mon - Sun: 8 AM to 9 PM</p>
                                <p><span>Happy hours:</span> Sat: 2 PM to 4 PM</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Bottom Area -->
        <div class="footer-bottom-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="border-line"></div>
                    </div>
                    <!-- Copywrite Text -->
                    <div class="col-12 col-md-6">
                        <div class="copywrite-text">
                            <p>&copy;
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;<script>
                                document.write(new Date().getFullYear());
                                </script> All rights reserved | Made by <a href="#" target="_blank">Plant Nest</a>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            </p>
                        </div>
                    </div>
                    <!-- Footer Nav -->
                    <div class="col-12 col-md-6">
                        <div class="footer-nav">
                            <nav>
                                <ul>
                                    <li><a href="/">Home</a></li>
                                    <li><a href="/about">About</a></li>
                                    <li><a href="/contact">Contact</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ##### Footer Area End ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="../PlantNest_USER/js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="../PlantNest_USER/js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="../PlantNest_USER/js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="../PlantNest_USER/js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="../PlantNest_USER/js/active.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.min.css">

    <script>
    function changeQuantity(change) {
        var qtyInput = document.getElementById('qty');
        var currentQty = parseInt(qtyInput.value);
        var newQty = currentQty + change;

        if (newQty >= 1 && newQty <= 15) {
            qtyInput.value = newQty;
            updateTotalPrice(newQty);
        }
    }

    function updateTotalPrice(quantity) {
        var productPrice = parseFloat(document.getElementById('product_price').value);
        var total_price = productPrice * quantity;
        document.getElementById('total_price').value = total_price.toFixed(2);
    }

    document.getElementById('add-to-cart-btn').addEventListener('click', function() {
        var form = document.getElementById('add-to-cart-form');
        var formData = new FormData(form);

        var xhr = new XMLHttpRequest();
        xhr.open('POST', '{{ URL::to("/product_insert") }}', true);
        xhr.setRequestHeader('X-CSRF-TOKEN', formData.get('_token'));

        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // Success, display SweetAlert
                    Swal.fire({
                        icon: 'success',
                        title: 'Product added to cart',
                        text: 'The product has been added to your cart.',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK'
                    }).then(() => {
                        // Redirect to login page
                        window.location.href = '/cart';
                    });
                } else {
                    console.error(xhr.responseText);
                }
            }
        };

        xhr.send(formData);
    });
    </script>







    <script>
    function redirectToLoginWishlist() {
        // Show alert before redirecting
        Swal.fire({
            icon: 'warning',
            title: 'Login Required',
            text: 'Please login first to add the product to your wishlist.',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK'
        }).then(() => {
            // Redirect to login page
            window.location.href = '/login';
        });
    }

    // Add event listener for wishlist button
    document.getElementById('wishlist-btn').addEventListener('click', function() {
        var form = document.getElementById('wishlist-form');
        var formData = new FormData(form);

        var xhr = new XMLHttpRequest();
        xhr.open('POST', '{{ URL::to("/wishlist_insert") }}', true);
        xhr.setRequestHeader('X-CSRF-TOKEN', formData.get('_token'));

        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // Success, display SweetAlert
                    Swal.fire({
                        icon: 'success',
                        title: 'Added to Wishlist',
                        text: 'The product has been added to your wishlist.',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK'
                    }).then(() => {
                        // Optionally, you can perform additional actions after the wishlist is updated
                    });
                } else {
                    // Handle error
                    console.error(xhr.responseText);
                }
            }
        };

        xhr.send(formData);
    });


    function redirectToLogin() {
        // Show alert before redirecting
        Swal.fire({
            icon: 'warning',
            title: 'Login Required',
            text: 'Please login first to add the product to your cart.',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK'
        }).then(() => {
            // Redirect to login page
            window.location.href = '/login';
        });
    }


    function redirectToLoginbuy() {
        // Show alert before redirecting
        Swal.fire({
            icon: 'warning',
            title: 'Login Required',
            text: 'Please login first to add the product to your Buy Now.',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK'
        }).then(() => {
            // Redirect to login page
            window.location.href = '/login';
        });
    }
    </script>






    <!-- jQuery-2.2.4 js -->
    <script src="../PlantNest_USER/js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="../PlantNest_USER/js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="../PlantNest_USER/js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="../PlantNest_USER/js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="../PlantNest_USER/js/active.js"></script>