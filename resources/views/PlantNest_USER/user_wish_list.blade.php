@extends("PlantNest_USER.user_layout")
@section("dashboard")

<?php
        use App\Models\wishlist_to_cart;
        use App\Models\flowering_plantmodel;

?>

<!-- ##### Breadcrumb Area Start ##### -->
<div class="breadcrumb-area">
    <!-- Top Breadcrumb Area -->
    <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center"
        style="background-image: url(PlantNest_USER/img/bg-img/24.jpg);">
        <h2>WishList</h2>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Wishlist</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- ##### Breadcrumb Area End ##### -->

<!-- ##### Cart Area Start ##### -->
<div class="cart-area section-pwishlisting-0-100 clearfix">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="cart-table clearfix">
                    <table class="table table-responsive">
                        <thead>
                            <tr>
                                <th>Products Name</th>
                                <th>Price</th>
                                <th>Product Image</th>
                                <th>Add/Remove Product</th>

                            </tr>
                        </thead>
                        <tbody>

                     
                            @foreach($wishlist as $index => $wishlist)
                            <tr>
                                <td class="" >
                                    <span>{{$wishlist->name}}</span>                                
                                </td>
                               
                                <td class="price"><span>RS {{$wishlist->price}}</span></td>
                                <td class="total_price" data-product-id="{{$wishlist->id}}"><span>
                                    <a href="#"><img src="images/{{$wishlist['image1']}}" alt="Product" style="height:170px;"></a>

                                        {{$wishlist->total_price}}</span></td>
                                </td>

                                <td>
                                    <a href="/delet_wish/{{$wishlist->product_id}}"><button class="btn mt-3" style="background-color:#70C745; color:white; width:150px;"><i class="fa fa-remove" style="height:10px;"></i></button></a>

                                </td>

                            </tr>
                            @endforeach

                
                        </tbody>
                
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
</div>
<!-- ##### Cart Area End ##### -->

<script>
function updateQuantity(index, change) {
    var qtyInput = document.getElementById('qty' + index);
    var qty = parseInt(qtyInput.value) + change;
    if (!isNaN(qty) && qty >= 1 && qty <= 99) {
        qtyInput.value = qty;
    }
}
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
function updateQuantity(productId, change) {
    var inputElement = $('#qty' + productId);
    var newValue = parseInt(inputElement.val()) + change;

    // Update the input value
    inputElement.val(newValue);

    // Perform AJAX request to update the server
    $.ajax({
        url: '/update_cart',
        method: 'POST',
        data: {
            productId: productId,
            newValue: newValue,
            _token: '{{ csrf_token() }}'
        },
        success: function(response) {
            // Update total price in the UI
            var totalPriceElement = $('.total_price[data-product-id=' + productId + ']');
            totalPriceElement.find('span').text('RS ' + response.total_price);

            // Update total count and total price
            var totalItemCount = 0;
            var totalPrice = 0; // Initialize totalPrice
            $('.qty-text').each(function() {
                var quantity = parseInt($(this).val());
                totalItemCount += quantity;
                var price = parseFloat($(this).closest('tr').find('.price span').text().substring(2)); // Extract price from the span text
                totalPrice += price * quantity;
            });
            $('#totalItemCount').text(totalItemCount);
            $('#totalPrice').text('$' + totalPrice.toFixed(2)); // Display totalPrice with 2 decimal places
        },
        error: function(error) {
            console.error('Error updating quantity or total:', error);
        }
    });
}
</script>




@endsection