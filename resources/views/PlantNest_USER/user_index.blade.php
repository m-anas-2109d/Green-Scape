@extends("PlantNest_USER.user_layout")
@section("dashboard")

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.all.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.min.css">
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

     <!-- ##### Hero Area Start ##### -->
     <section class="hero-area">
        <div class="hero-post-slides owl-carousel">

            <!-- Single Hero Post -->
            <div class="single-hero-post bg-overlay">
                <!-- Post Image -->
                <div class="slide-img bg-img" style="background-image: url(../PlantNest_USER/img/bg-img/1.jpg);"></div>
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12">
                            <!-- Post Content -->
                            <div class="hero-slides-content text-center">
                                <h2>Plants exist in the weather and light rays that surround them</h2>
                                <p>Explore our plant collection for a touch of green in your space. From vibrant blooms to lush foliage, discover the perfect plants to enhance your surroundings. Whether you're a seasoned gardener or just starting, find your ideal plant companions with us.</p>
                                <div class="welcome-btn-group">
                                    @if(session('sessionuseremail'))
                                    
                                    @else
                                    <a href="/login" class="btn alazea-btn mr-30">GET STARTED</a>

                                    @endif
                                    <a href="/contact" class="btn alazea-btn active">CONTACT US</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Single Hero Post -->
            <div class="single-hero-post bg-overlay">
                <!-- Post Image -->
                <div class="slide-img bg-img" style="background-image: url(../PlantNest_USER/img/bg-img/2.jpg);"></div>
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12">
                            <!-- Post Content -->
                            <div class="hero-slides-content text-center">
                                <h2>Plants exist in the weather and light rays that surround them</h2>
                                <p>Explore our plant collection for a touch of green in your space. From vibrant blooms to lush foliage, discover the perfect plants to enhance your surroundings. Whether you're a seasoned gardener or just starting, find your ideal plant companions with us.</p>
                                <div class="welcome-btn-group">
                                    @if(session('sessionuseremail'))
                                    
                                    @else
                                    <a href="/login" class="btn alazea-btn mr-30">GET STARTED</a>

                                    @endif
                                    <a href="/contact" class="btn alazea-btn active">CONTACT US</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- ##### Hero Area End ##### -->








    <!-- ##### Product Area Start ##### -->
    <section class="new-arrivals-products-area bg-gray section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Section Heading -->
                    <div class="section-heading text-center">
                        <h2>NEW ARRIVALS</h2>
                        <p>We have the latest products, it must be exciting for you</p>
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
                            <a><img src="../images/{{$pd->image1}}" alt="" style="height:200px; width:200px;"></a>

                            </center>
                            <!-- Product Tag -->
                            <div class="product-tag">
                                <!-- <a href="#">Hot</a> -->
                            </div>
                            <!-- <div class="product-meta d-flex">
                                <a href="#" class="wishlist-btn"><i class="icon_heart_alt"></i></a>
                                <a href="/shop_details/{{$pd->plant_id}}" class="add-to-cart-btn">View</a>
                                <a href="#" class="compare-btn"><i class="arrow_left-right_alt"></i></a>
                            </div> -->
                        </div>
                        <!-- Product Info -->
                        <div class="product-info mt-15 text-center">
                            <a href="#">
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

        <div class="row">
                <div class="col-12">
                    <!-- Section Heading -->
                    <div class="section-heading text-center">
                        <h2>NEW ARRIVALS</h2>
                        <p>We have the latest products, it must be exciting for you</p>
                    </div>
                </div>
            </div>
        <div class="row">
            @foreach($randomProductss as $index => $pd)
            @if($index < 4) <!-- Single Product Area -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-product-area mb-100">
                        <!-- Product Image -->
                        <div class="product-img">
                            <center>
                            <a href="#"><img src="../images/{{$pd->image1}}" alt="" style="height:200px; width:200px;"></a>

                            </center>
                            <!-- Product Tag -->
                            <div class="product-tag">
                                <!-- <a href="#">Hot</a> -->
                            </div>
                            <!-- <div class="product-meta d-flex">
                                <a href="#" class="wishlist-btn"><i class="icon_heart_alt"></i></a>
                                <a href="/shop_details/{{$pd->plant_id}}" class="add-to-cart-btn">View</a>
                                <a href="#" class="compare-btn"><i class="arrow_left-right_alt"></i></a>
                            </div> -->
                        </div>
                        <!-- Product Info -->
                        <div class="product-info mt-15 text-center">
                            <a href="#">
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

        <div class="row">
                <div class="col-12">
                    <!-- Section Heading -->
                    <div class="section-heading text-center">
                        <h2>NEW ARRIVALS</h2>
                        <p>We have the latest products, it must be exciting for you</p>
                    </div>
                </div>
            </div>

        <div class="row">
            
            @foreach($randomProductsss as $index => $pd)
            @if($index < 4) <!-- Single Product Area -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-product-area mb-100">
                        <!-- Product Image -->
                        <div class="product-img">
                            <center>
                            <a href="#"><img src="../images/{{$pd->image1}}" alt="" style="height:200px; width:200px;"></a>

                            </center>
                            <!-- Product Tag -->
                            <div class="product-tag">
                                <!-- <a href="#">Hot</a> -->
                            </div>
                            <!-- <div class="product-meta d-flex">
                                <a href="#" class="wishlist-btn"><i class="icon_heart_alt"></i></a>
                                <a href="/shop_details/{{$pd->plant_id}}" class="add-to-cart-btn">View</a>
                                <a href="#" class="compare-btn"><i class="arrow_left-right_alt"></i></a>
                            </div> -->
                        </div>
                        <!-- Product Info -->
                        <div class="product-info mt-15 text-center">
                            <a href="#">
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
        <div class="row">
                <div class="col-12">
                    <!-- Section Heading -->
                    <div class="section-heading text-center">
                        <h2>NEW ARRIVALS</h2>
                        <p>We have the latest products, it must be exciting for you</p>
                    </div>
                </div>
            </div>

        <div class="row">
            
            @foreach($randomProductssss as $index => $pd)
            @if($index < 4) <!-- Single Product Area -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-product-area mb-100">
                        <!-- Product Image -->
                        <div class="product-img">
                            <center>
                            <a href="#"><img src="../images/{{$pd->image1}}" alt="" style="height:200px; width:200px;"></a>

                            </center>
                            <!-- Product Tag -->
                            <div class="product-tag">
                                <!-- <a href="#">Hot</a> -->
                            </div>
                            <!-- <div class="product-meta d-flex">
                                <a href="#" class="wishlist-btn"><i class="icon_heart_alt"></i></a>
                                <a href="/shop_details/{{$pd->plant_id}}" class="add-to-cart-btn">View</a>
                                <a href="#" class="compare-btn"><i class="arrow_left-right_alt"></i></a>
                            </div> -->
                        </div>
                        <!-- Product Info -->
                        <div class="product-info mt-15 text-center">
                            <a href="#">
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
    </section>
    <!-- ##### Product Area End ##### -->



@endsection 