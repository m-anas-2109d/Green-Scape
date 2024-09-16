@extends("PlantNest_USER.user_layout")
@section("dashboard")


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- ##### Breadcrumb Area Start ##### -->
<div class="breadcrumb-area">
    <!-- Top Breadcrumb Area -->
    <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center"
        style="background-image: url(PlantNest_USER/img/bg-img/24.jpg);">
        <h2>Order Histroy</h2>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Contact</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- ##### Breadcrumb Area End ##### -->


<!-- check out data  -->

<div class="table-responsive">
    <table class="table table-hovered table-bordered table striped table-respnsive">
        <thead>
            <tr>
                <!-- <th>ID</th> -->
                <th>Name</th>
                <!-- <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Payment Method</th>
                <th>Order Number</th>
                <th>Shipping Number</th> -->
                <th>Grand Total</th>
                <th>Quantity</th>
                <th>Order Status</th>
                <th>Order Date</th>
                <th>Order Return</th>
                <!-- <th>User Registration ID</th>
                <th>Product ID</th> -->
                <!-- <th>Country</th> -->
            </tr>
        </thead>
        <tbody>
            @foreach($checkout as $checkout)
            <tr>
                <!-- <td>{{ $checkout->id }}</td> -->
                <td>{{ $checkout->name}}</td>
                <!--<td>{{ $checkout->email }}</td>
                <td>{{ $checkout->phone }}</td>
                <td>{{ $checkout->address }}</td>
                <td>{{ $checkout->payment_method }}</td>
                <td>{{ $checkout->order_number }}</td> -->
                <!-- <td>{{ $checkout->shipping_number }}</td> -->
                <td>{{ $checkout->grand_total }}</td>
                <td>{{ $checkout->sub_total }}</td>
                <td>{{ $checkout->status}}</td>
                <td>{{ $checkout->created_at }}</td>
                <center>
                <td>
                @if($checkout->status == "0")
                <div class="cat action">
                <label>
                    <input type="checkbox" class="statusCheck" value="{{$checkout->checkid}}"><span>Pending</span>
                </label>
                </div>

                @else
                <div class="cat action">
                <label>
                    <input type="checkbox" class="statusCheck" value="{{$checkout->checkid}}" checked ><span>Approve</span>
                </label>
                </div>
                @endif

            </td>
                     </center>
                            <!-- <td>{{ $checkout->user_registrations_id }}</td>
                <td>{{ $checkout->product_id }}</td>
                <td>{{ $checkout->country }}</td> -->
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


<!-- Include SweetAlert library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<!-- JavaScript -->
<script>
// $('input[type="checkbox"]').click(function(){
//     if ($(this).prop("checked") == true) {
//         // console.log($(this).val());
//         $.ajax({
//             url: "/updatestatus1",
//             type: "POST",
//             data: "eid=" + $(this).val() +
//                   '&_token={{csrf_token()}}',
//             success: function(data) {
//                 // alert("Status Updated");
//                 console.log(data);
//                 // window.location = "/";
//             },
//             error: function(error) {
//                 alert("Error found "+error);
//             }
//         });
//     } else if ($(this).prop("checked") == false) {
//         $.ajax({
//             url: "/updatestatus0",
//             type: "POST",
//             data: "eid1=" + $(this).val() +
//                   '&_token={{csrf_token()}}',
//             success: function(data) {
//                 console.log(data);
//                 // alert("Status Updated");
//                 // window.location = "/";
//             },
//             error: function(error) {
//                 alert("Error found "+error);
//             }
//         });
//     }
// });

$(document).ready(function(){
    $('.statusCheck').change(function(){
        if(this.checked){
            
            $eid = $(this).val();
            console.log($eid);
            $.ajax({
                url: '/updatestatus1/'+$eid,
                method:'post',
                data: {
        "_token": "{{ csrf_token() }}",
        },
            success: function(data) {
                // alert("Status Updated");
                console.log(data);
                // window.location = "/";
            },
            error: function(error) {
                alert("Error found "+error);
            }
            })
        }
        else{
            console.log(0);
            $eid = $(this).val();
            console.log($eid);
            $.ajax({
                url: '/updatestatus0/'+$eid,
                method:'post',
                data: {
        "_token": "{{ csrf_token() }}",
        },
            success: function(data) {
                // alert("Status Updated");
                console.log(data);
                // window.location = "/";
            },
            error: function(error) {
                alert("Error found "+error);
            }
            })
        }
    })
})

</script>

@endsection
