@extends("PlantNest_USER.user_layout")
@section("dashboard")


<!-- ##### Breadcrumb Area Start ##### -->
<div class="breadcrumb-area">
    <!-- Top Breadcrumb Area -->
    <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center"
        style="background-image: url(PlantNest_USER/img/bg-img/24.jpg);">
        <h2>Checkout</h2>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<!-- ##### Breadcrumb Area End ##### -->

<?php

$user =DB::table("user_registrations")->where("email",  (session('sessionuseremail')))->first();
$product = DB::table('add_to_carts')
                                    ->join('flowering_plantmodels', 'flowering_plantmodels.plant_id', '=', 'add_to_carts.product_id')
                                    ->where('user_id', session('sessionid'))
                                    ->get();
                                
                                $totalPrice = 0;
                                $totalCount = 0;
                                
                                foreach ($product as $item) {
                                    $totalPrice += $item->total_price; // Assuming there's a 'price' column in the flowering_plantmodels table.
                                    $totalCount++;
                                }
                                
                                // echo "Total Price: $totalPrice";
                                // echo "Total Count: $totalCount";

                        ?>



<!-- ##### Checkout Area Start ##### -->
<div class="checkout_area mb-100">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-12 col-lg-7">
                <div class="checkout_details_area clearfix">
                    <h5>Billing Details</h5>
                    <form action="{{URL:: to('/check_out')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="first_name">First Name *</label>
                                <input type="text" class="form-control" id="first_name" value="{{$user->first_name}}"
                                    name="first_name">
                            </div>

                            <div class="col-md-6 mb-4">
                                <label for="last_name">Last Name *</label>
                                <input type="text" class="form-control" id="last_name" value="{{$user->last_name}}"
                                    name="last_name">
                            </div>
                            <div class="col-12 mb-4">
                                <label for="email_address">Email Address *</label>
                                <input type="email" class="form-control" id="email_address" value="{{$user->email}}"
                                    name="email_address">
                            </div>
                            <div class="col-12 mb-4">
                                <label for="phone_number">Phone Number *</label>
                                <input type="number" class="form-control" id="phone_number" min="0"
                                    value="{{$user->contact_no}}" name="contact_no">
                            </div>
                            <div class="col-12 mb-4">
                                <label for="company">Address *</label>
                                <input type="text" class="form-control" id="address" value="">
                            </div>
                            <!-- <div class="col-md-6 mb-4">
                                    <label for="city">Town/City *</label>
                                    <input type="text" class="form-control" id="city" value="">
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="state">State/Province *</label>
                                    <input type="text" class="form-control" id="state" value="">
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="country">Country</label>
                                    <select class="custom-select d-block w-100" id="country">
                                        <option value="usa">United States</option>
                                        <option value="uk">United Kingdom</option>
                                        <option value="ger">Germany</option>
                                        <option value="fra">France</option>
                                        <option value="ind">India</option>
                                        <option value="aus">Australia</option>
                                        <option value="bra">Brazil</option>
                                        <option value="cana">Canada</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="postcode">Postcode/Zip</label>
                                    <input type="text" class="form-control" id="postcode" value="">
                                </div> -->
                            <!-- <div class="col-md-12 mb-4">
                                    <label for="order-notes">Order Notes</label>
                                    <textarea class="form-control" id="order-notes" cols="30" rows="10" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                </div> -->
                            <div class="col-6">
                                <div class="d-flex align-items-center">
                                    <!-- Single Checkbox -->
                                    <div class="custom-control custom-checkbox d-flex align-items-center mr-30">
                                        <input type="radio" class="custom-control-input" id="customCheck1"
                                            checked="checked" name="cash_delivery" value="CASH ON DELIVERY">
                                        <label class="custom-control-label" for="customCheck1">Cash on Delivery</label>
                                    </div>
                                    <!-- Single Checkbox -->
                                    <input type="hidden" class="custom-control-input" id="customCheck1"
                                            checked="checked" name="book" value="Book">
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="d-flex align-items-center">
                                    <!-- Single Checkbox -->

                                    <!-- Single Checkbox -->
                                    <div class="custom-control custom-checkbox d-flex align-items-center">
                                        <input type="radio" class="custom-control-input" id="customCheck2"
                                            checked="checked" name="shipping_method" value="TCS">
                                        <label class="custom-control-label" for="customCheck2">TCS</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>

            <div class="col-12 col-lg-4">
                <div class="checkout-content">
                    <h5 class="title--">Your Order</h5>
                    <div class="products">

                        <?php
$totalItemCount = 0;
?>
                        @foreach($checkout as $add)

                        <div class="products-data">
                            <h5>Products:</h5>
                            <div class="single-products d-flex justify-content-between align-items-center">
                                <p><input type="text" value="Product Name: {{$add->name}}" style="border:none;" readonly
                                        name="name"></p>
                                <h5><input type="text" value="Price: RS{{$totalPrice}}" style="border:none;" readonly>
                                </h5>
                            </div>
                            <br>

                            <div class="single-products d-flex justify-content-between align-items-center">
                                <p><input type="text" value="Quantity: {{$add->quantity_add}}" style="border:none;"
                                        readonly name="quantity"></p>
                                <h5>Product Image: <img src="images/{{$add->image1}}" alt="" style="height:50px;"
                                        name="image"></h5>
                            </div>
                        </div>
                        <hr>
                        <?php

$totalItemCount += $add->total_price;
?>

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
@endif   <link rel="icon" href="PlantNest_USER/img/core-img/favicon.ico">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.all.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.min.css">

<input type="hidden" class="form-control" id="first_name" value="{{$add->product_id}}"
                                    name="product_id">
                        @endforeach
                    </div>
                    <div class="subtotal d-flex justify-content-between align-items-center">
                        <h5>Subtotal</h5>
                        <h5><input type="text" name="sub_total" value="${{$totalItemCount}}" readonly  style="border:none;"></h5>
                    </div>
                    <div class="shipping d-flex justify-content-between align-items-center">
                        <h5>Shipping</h5>
                        <h5><input type="text" name="" value="$5.00" readonly  style="border:none;"></h5>
                    </div>
                    <div class="order-total d-flex justify-content-between align-items-center">
                        <h5>Order Total</h5>
                        <?php
                            $ship = 5.00;
                        ?>
                        <h5><input type="text" value="${{$totalItemCount + $ship}}" name="grand_total" readonly style="border:none;"></h5>
                    </div>
                    <div class="checkout-btn mt-30">
                    <button type="submit" class="btn alazea-btn w-100" onclick="placeOrder()">Place Order</button>

                        <!-- <button type="submit" class="btn alazea-btn w-100">Place Order</a> -->
                    </div>
                </div>
            </div>
            </form>

        </div>
    </div>
</div>
<!-- ##### Checkout Area End ##### -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


@endsection