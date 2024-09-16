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
    <h4 class="panel-title">All Categories</h4>
    </div>
    <div class="panel-body">
    <a href="/category"><button class="btn btn-success"><strong>Add New Category</strong></button></a>
        <div class="table-responsive">
        <table id="example" class="display table" style="width: 100%; cellspacing: 0;">
            <thead>
                <tr>
                    <th>Category ID</th>
                    <th>Category Name</th>
                    <th>Category Type</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $cat)
                <tr>
                    <td>{{$cat->category_id}}</td>
                    <td>{{$cat->category_name}}</td>
                    <td>{{$cat->category_type}}</td>
                    <td>
                        <a href="/editcategory/{{$cat->category_id}}"><i class="fa fa-edit"></i></a>
                        <a href="/deleteCategory/{{$cat->category_id}}"><i class="fa fa-trash" aria-hidden="true"></i></a>
                   </td>
                </tr>
                @endforeach
            </tbody>
            </table>  
        </div>
    </div>
</div>

<!-- <script>
    function deleteCategory(plantId) {
        Swal.fire({
            title: 'Delete Confirmation',
            text: 'Are you sure you want to delete this product?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                // User confirmed, perform the delete action
                window.location.href = '/deletecategory/' + plantId;
            }
        });
    }
</script>

<script>
    @if(session('updateproduct'))
        Swal.fire({
            icon: 'success',
            title: 'Updated',
            text: '{{ session('updateproduct') }}',
        });
    @endif
</script> -->

@endsection