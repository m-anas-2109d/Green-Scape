@extends("PlantNest_USER.user_layout")
@section("dashboard")

<?php
use App\Models\add_to_cart;
use App\Models\flowering_plantmodel;

?>

<!-- ##### Breadcrumb Area Start ##### -->
<div class="breadcrumb-area">
    <!-- Top Breadcrumb Area -->
    <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center"
        style="background-image: url(PlantNest_USER/img/bg-img/24.jpg);">
        <h2>Cart</h2>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Cart</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- ##### Breadcrumb Area End ##### -->

<!-- ##### Cart Area Start ##### -->
<div class="cart-area section-padding-0-100 clearfix">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="cart-table clearfix">
                    <table class="table table-responsive">
                        <thead>
                            <tr>
                                <th>Products</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>TOTAL</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                                $product = DB::table('add_to_carts')
                                    ->join('flowering_plantmodels', 'flowering_plantmodels.plant_id', '=', 'add_to_carts.product_id')
                                    ->where('user_id', session('sessionid'))
                                    ->get();
                                
                                $totalPrice = 0;
                                $totalCount = 0;
                                $allInStock = true; // Flag to check if all items are in stock

                                foreach ($product as $item) {
                                    $totalPrice += $item->total_price; // Assuming there's a 'price' column in the flowering_plantmodels table.
                                    $totalCount++;

                                    // Check if item is in stock
                                    if ($item->quantity <= 0) {
                                        $allInStock = false;
                                    }
                                }
                            ?>

                            @php
                                $totalItemCount = 0;
                                $totalItemquantity = 0;
                            @endphp

                            @foreach($add_to_cart as $index => $add)
                                <tr>
                                    <td class="cart_product_img">
                                        <a href="#"><img src="images/{{$add['image1']}}" alt="Product"></a>
                                        <h5>{{$add->name}}</h5>
                                    </td>
                                    @csrf
                                    <td class="qty">
                                        <div class="quantity">
                                            <span class="qty-minus" id="qty-minus" value="{{$add->product_id}}" onclick="updateQuantity('{{$add->product_id}}', -1)"><i
                                                    class="fa fa-minus" aria-hidden="true"></i></span>
                                            <input type="number" class="qty-text" id="qty{{$add->product_id}}" step="1" min="1"
                                                max="15" name="quantity" value="{{$add->quantity_add}}">
                                            <span class="qty-plus" value="{{$add->product_id}}" onclick="updateQuantity('{{$add->product_id}}', 1)"><i
                                                    class="fa fa-plus" aria-hidden="true"></i></span>
                                        </div>
                                    </td>
                                    <td class="price"><span>RS {{$add->price}}</span></td>
                                    <td class="total_price" data-product-id="{{$add->product_id}}"><span>RS
                                            {{$add->total_price}}</span></td>
                                    <td class="action"><a href="/add_cart_delet/{{$add->product_id}}"><i class="icon_close"></i></a>
                                    </td>
                                </tr>

                                <?php
                                    $totalItemCount += $add->total_price;
                                    $totalItemquantity += $add->quantity_add;
                                ?>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4" class="text-right"><strong>Total Quantity:</strong></td>
                                <td><strong><span id="totalItemCount">{{$totalItemquantity}}</span></strong></td>
                            </tr>
                            <tr>
                                <td colspan="4" class="text-right"><strong>Total Price:</strong></td>
                                <td><strong><span id="totalPrice">RS {{$totalPrice}}</span></strong></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

        <div class="row offset-md-7">
            <div class="checkout-btn">
                @if(session('sessionuseremail'))
                    @if($allInStock && $totalItemquantity > 0)
                        <a id="proceedToCheckoutBtn" href="/user_checkout" class="btn alazea-btn w-100">PROCEED TO CHECKOUT</a>
                    @else
                        <span id="outOfStockMsg" class="btn alazea-btn w-100" disabled>Out of Stock or Empty Cart</span>
                    @endif
                @endif
            </div>
        </div>
    </div>
</div>

</div>
</div>
<!-- ##### Cart Area End ##### -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function updateQuantity(index, change) {
        var qtyInput = document.getElementById('qty' + index);
        var qty = parseInt(qtyInput.value) + change;
        if (!isNaN(qty) && qty >= 1 && qty <= 15) {
            qtyInput.value = qty;
        }
    }
</script>
<script>
    function updateQuantity(index, change) {
        var qtyInput = $('#qty' + index);
        var qty = parseInt(qtyInput.val()) + change;

        if (!isNaN(qty) && qty >= 1 && qty <= 15) {
            qtyInput.val(qty);

            $.ajax({
                url: '/update_cart',
                method: 'POST',
                data: {
                    productId: index,
                    newValue: qty,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    var totalPriceElement = $('.total_price[data-product-id=' + index + ']');
                    totalPriceElement.find('span').text('RS ' + response.total_price);

                    var totalItemCount = 0;
                    var totalPrice = 0;

                    $('.qty-text').each(function() {
                        var quantity = parseInt($(this).val());
                        totalItemCount += quantity;
                        var price = parseFloat($(this).closest('tr').find('.price span').text().substring(2));
                        totalPrice += price * quantity;
                    });

                    $('#totalItemCount').text(totalItemCount);
                    $('#totalPrice').text('RS ' + totalPrice.toFixed());

                    // Check for low stock after updating quantity
                    checkLowStock();
                },
                error: function(error) {
                    console.error('Error updating quantity or total:', error);
                }
            });
        }
    }

    function checkLowStock() {
        // Perform AJAX request to check low stock from the server
        $.ajax({
            url: '/check_low_stock',
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                if (response.lowStock) {
                    // Disable the "PROCEED TO CHECKOUT" button and show a message
                    $('#proceedToCheckoutBtn').prop('disabled', true);
                    $('#outOfStockMsg').show();
                } else {
                    // Enable the "PROCEED TO CHECKOUT" button and hide the message
                    $('#proceedToCheckoutBtn').prop('disabled', false);
                    $('#outOfStockMsg').hide();
                }
            },
            error: function(error) {
                console.error('Error checking low stock:', error);
            }
        });
    }
</script>

@endsection
