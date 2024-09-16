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
    <h4 class="panel-title">Feedback</h4>
    </div>
    <div class="panel-body">
   
        <div class="table-responsive">
        <table id="example" class="display table" style="width: 100%; cellspacing: 0;">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact Number</th>
                    <th>feedback</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach($feedback_fetch as $ff)
                <tr>
                    <td>{{$ff->name}}</td>
                    <td>{{$ff->email}}</td>
                    <td>{{$ff->phone}}</td>
                    <td>{{$ff->feedback}}</td>
                    

                </tr>
                @endforeach
            </tbody>
            </table>  
        </div>
    </div>
</div>

@endsection