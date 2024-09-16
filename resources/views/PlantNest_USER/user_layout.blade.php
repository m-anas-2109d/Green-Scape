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
    <title>GreenScape</title>

    <!-- Favicon -->
    <link rel="icon" href="PlantNest_USER/img/core-img/favicon.ico">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.min.css">
    
    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="PlantNest_USER/style.css">

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
            <img src="PlantNest_USER/img/core-img/leaf.png" alt="">
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
                                    <a href="/cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i> <span>Cart <span
                                                class="cart-quantity">{{ $productsCount }}</span></span></a>

                                    @else
                                    <a href="/cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i> <span>Cart <span
                                                class="cart-quantity">0</span></span></a>

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
    <!-- ##### Header Area End ##### -->



    @yield('dashboard')
    <!-- ##### Footer Area Start ##### -->
    <footer class="footer-area bg-img" style="background-image: url(PlantNest_user/img/bg-img/3.jpg);">
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
                                Discover the perfect home for your plants with our innovative plant nests, providing a cozy and stylish haven for your green companions.
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

                            <!-- Single Best Seller Products -->
                            @foreach($randomProducts as $index => $pd)
                                @if($index < 2) 
                            <!-- Single Best Seller Products -->
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
                                </script> All rights reserved | Made by <a href="#"
                                    target="_blank">Plant Nest</a>
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

    <!-- ##### Footer Area End ##### -->

    <!-- ##### All Javascript Files ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="PlantNest_USER/js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="PlantNest_USER/js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="PlantNest_USER/js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="PlantNest_USER/js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="PlantNest_USER/js/active.js"></script>
</body>

</html>