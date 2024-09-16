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
    <h4 class="panel-title">Reviews</h4>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
        <table id="example" class="display table" style="width: 100%; cellspacing: 0;">
            <thead>
                <tr>
                    <th>Rating</th>
                    <th>Reviews</th>
                    <th>User_registration_id</th>
                    
                    
                </tr>
            </thead>
            <tbody>
                @foreach($reviews as $re)
                <tr>
                    <td>{{$re->rating}}</td>
                    <td>{{$re->review}}</td>
                    <td>{{$re->User_registration_id}}</td>
                </tr>
                @endforeach
            </tbody>
            </table>  
        </div>
    </div>
</div>

@endsection