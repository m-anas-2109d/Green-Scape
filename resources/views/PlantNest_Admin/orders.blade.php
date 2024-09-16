@extends("PlantNest_admin.AdminLayout")

@section("title2")
Fetch Category
@endsection
<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>        
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->

@section("content")

<div class="col-md-12">
<div class="panel panel-white">
<div class="panel-heading clearfix">
    <h4 class="panel-title">All orders</h4>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
        <table id="example" class="display table" style="width: 100%; cellspacing: 0;">
            <thead>
                <tr>
                    <th>Nmae</th>
                    <th>Email</th>
                    <th>phone</th>
                    <th>payment method</th>
                    <th>Order no</th>
                    <th>Shipping number</th>
                    <th>Grand Total</th>
                    <th>Status</th>    
                </tr>
            </thead>
            <tbody>
                @foreach($checkout as $ch)
                <tr>
                    <td>{{$ch->name}}</td>
                    <td>{{$ch->email}}</td>
                    <td>{{$ch->phone}}</td>
                    <td>{{$ch->payment_method}}</td>
                    <td>{{$ch->order_number}}</td>
                    <td>{{$ch->shipping_number}}</td>
                    <td>{{$ch->grand_total}}</td>
                    <td>{{$ch->status}}</td>
                </tr>
                @endforeach
            </tbody>
            </table>  
        </div>
    </div>
</div>

@endsection