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
    <h4 class="panel-title">All Users</h4>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
        <table id="example" class="display table" style="width: 100%; cellspacing: 0;">
            <thead>
                <tr>
                    <th>Nmae</th>
                    <th>Email</th>
                    <th>Contact Number</th>
                    <th>Image</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach($fetchusers as $fu)
                <tr>
                    <td>{{$fu->first_name}}</td>
                    <td>{{$fu->email}}</td>
                    <td>{{$fu->contact_no}}</td>
                    <td><img src="images/{{$fu->image}}" style="width:100px;height:130px;"></td>
                    

                </tr>
                @endforeach
            </tbody>
            </table>  
        </div>
    </div>
</div>

@endsection