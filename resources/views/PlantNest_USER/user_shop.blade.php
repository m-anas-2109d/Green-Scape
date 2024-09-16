@extends("PlantNest_USER.user_layout")
@section("dashboard")



<!-- ##### Breadcrumb Area Start ##### -->
<div class="breadcrumb-area">
    <!-- Top Breadcrumb Area -->
    <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center"
        style="background-image: url(PlantNest_USER/img/bg-img/24.jpg);">
        <h2>Shop</h2>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Shop</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- ##### Breadcrumb Area End ##### -->
<div class="row">
                <div class="col-12">
                    <!-- Section Heading -->
                    <div class="section-heading text-center">
                        <h2>NEW ARRIVALS</h2>
                        <p>We have the latest products, it must be exciting for you</p>
                    </div>
                </div>
            </div>
<!-- ##### Shop Area Start ##### -->
<section class="shop-page section-padding-0-100">
    <div class="container">
     <div class="row offset-md-8">
        <div class="container">
        <div class="shop-sorting-data d-flex flex-wrap align-items-center justify-content-between">
                    <!-- Shop Page Count -->
                  
                    <!-- Search by Terms -->
                        <form action="{{ URL::to('/search') }}" method="POST">@csrf
                            <input type="text" name="search" placeholder="Search by name" class="btn">
                            <button type="submit" class="btn">Search</button>
                        </form>

                        @if(session('product_not_found'))
                            <div class="alert alert-info" role="alert">
                                <strong>{{(session('product_not_found'))}}</strong>
                            </div>
                            @endif
                        
                </div>
        </div>
     </div>

        <div class="row">
            <!-- Sidebar Area -->
            <div class="col-12 col-md-4 col-lg-3">
                <div class="shop-sidebar-area">

                    <!-- Shop Widget -->
                    <div class="shop-widget catagory mb-50">
                        <h4 class="widget-title">Categories</h4>
                        <div class="widget-desc">
                            
                                <ul class="dropdown">
                                    <li><a href="/shop">Plants</a>
                                        <ul class="dropdown">
                                            <li style=""><a href="/followingplants">Flowering Plants</a></li>
                                            <li><a href="/non_floweringplant">Non-Flowering Plants</a></li>
                                            <li><a href="/indoorplant">Indoor Plants</a></li>
                                            <li><a href="/outdoorplant">Outdoor Plants</a></li>
                                            <li><a href="/medicinal">Medicinal Plants</a></li>
                                            <li><a href="/succulent">Succulents Plants</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="/accessories">Accessories</a> </li>
                                </ul>
                            
                        </div>
                    </div>


                    <!-- Shop Widget -->
                    <div class="shop-widget best-seller mb-50">
                        <h4 class="widget-title">Best Seller</h4>
                        <div class="widget-desc">
                            

                            @if(count($product) > 0)
                            @foreach($product as $index => $pd)
                            @if($index < 4) <!-- Single Best Seller Products -->
                                <div class="single-best-seller-product d-flex align-items-center">
                                    <div class="product-thumbnail">
                                        <a><img src="images/{{$pd->image1}}" alt=""></a>
                                    </div>
                                    <div class="product-info">
                                        <a>{{$pd->name}}</a>
                                        <p>RS {{$pd->price}}</p>
                                        <div class="ratings">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                                @else

                                <div class="col-12">
                                    <p>No products found.</p>
                                </div>

                                @endif

                        </div>
                    </div>
                </div>
            </div>

            <!-- All Products Area -->
            <div class="col-12 col-md-8 col-lg-9">
                <div class="shop-products-area">
                    <div class="row">

                        @foreach($product as $pd)

                        <!-- Single Product Area -->
                        <div class="col-12 col-sm-6 col-lg-4">
                            <div class="single-product-area mb-50">
                                <!-- Product Image -->
                                <div class="product-img">
                                    <center>
                                        <a><img src="images/{{$pd->image1}}" alt=""
                                                style="height:200px; width:200px;"></a>

                                    </center>
                                    <!-- Product Tag -->
                                    <div class="product-tag">
                                        <!-- <a href="#">Hot</a> -->
                                    </div>
                                    <div class="product-meta d-flex">
                                        <!-- <a href="#" class="wishlist-btn"><i class="icon_heart_alt"></i></a> -->
                                        <!-- <a href="cart.html" class="add-to-cart-btn">Add to cart</a> -->
                                        <!-- <a href="#" class="compare-btn"><i class="arrow_left-right_alt"></i></a> -->
                                    </div>
                                </div>
                                <!-- Product Info -->
                                <div class="product-info mt-15 text-center">
                                    <a>
                                        <p style="font-size:13px;">{{$pd->name}}</p>
                                    </a>
                                    <h6>RS {{$pd->price}}</h6>
                                    <a href="/shop_details/{{$pd->plant_id}}"><button class="btn mt-3"
                                            style="background-color:#70C745; color:white; width:150px;">View</button></a>
                                </div>
                            </div>
                        </div>
                        @endforeach


                    </div>

                    <!-- Pagination -->
                    <nav aria-label="Page navigation">
                        <ul class="pagination">
                            <p style="color:font-weight:bold;">{{$product->links('pagination::bootstrap-4')}}</p>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Shop Area End ##### -->

@endsection