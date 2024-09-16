@extends("PlantNest_admin.AdminLayout")

@section("title2")
Contact Details
@endsection

@section("content")

<div class="col-md-12">
<div class="panel panel-white">
<div class="panel-heading clearfix">
    <h4 class="panel-title">Contact Details</h4>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
        <table id="example" class="display table" style="width: 100%; cellspacing: 0;">
            <thead>
                <tr>
                    <th>Contact Name</th>
                    <th>Contact Email</th>
                    <th>Contact Subject</th>
                    <th>Contact Message</th> 
                </tr>
            </thead>
            <tbody>
                @foreach($contact as $con)
                <tr>
                    <td>{{$con->name}}</td>
                    <td>{{$con->email}}</td>
                    <td>{{$con->subject}}</td>
                    <td>{{$con->message}}</td>
               </tr>
                @endforeach
            </tbody>
            </table>  
        </div>
    </div>
</div>

@endsection