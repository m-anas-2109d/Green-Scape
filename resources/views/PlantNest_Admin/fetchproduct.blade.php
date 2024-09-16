@extends("PlantNest_Admin.AdminLayout")

@section("title2")
Fetch Products
@endsection

@section("content")

<?php
use App\Models\category;
use App\Models\flowering_plantmodel;

$data = category::get();
?>


<?php
    $var = flowering_plantmodel::join('categories','categories_id','flowering_plantmodels.categories_id')->first();
?>

<div class="col-md-12">
<div class="panel panel-white">
<div class="panel-heading clearfix">
    <h4 class="panel-title">All Products</h4>
    </div>
    <div class="panel-body">

    <a href="/Plant1"><button class="btn btn-success"><strong>Add New Product</strong></button></a>

    @if(session('productupdate'))
    <div class="alert alert-primary" role="alert">
    <strong>{{session('productupdate')}}</strong>
    </div>
    @endif

    @if(session('productdelete'))
    <div class="alert alert-primary" role="alert">
    <strong>{{session('productdelete')}}</strong>
    </div>
    @endif

        <div class="table-responsive">
        <table id="example" class="display table" style="width: 100%; cellspacing: 0;">
            <thead>
                <tr>
                    <!-- <th scope="col">Id</th>     -->
                    <th scope="col">Product Name</th>
                    <th scope="col">Category</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Species</th>
                    <th scope="col">Image_1</th>
                    <!-- <th scope="col">Image_2</th>
                    <th scope="col">Image_3</th>
                    <th scope="col">Image_4</th> -->

                    <th scope="col">Description</th>  
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
               @foreach($plant1 as $p)
               <tr>
                   <!-- <td>{{$p->plant_id}}</td> -->
                   <td>{{$p->name}}</td>
                   <td>{{$p->name}}</td>
                   <td>{{$p->price}}</td>
                   <td>{{$p->quantity}}</td>
                   <td>{{$p->plant_genes}}</td>
                   <td><img src="images/{{$p->image1}}" style="width:100px;height:130px;"></td>
                   <!-- <td><img src="images/{{$p->image2}}" style="width:100px;height:130px;"></td>
                   <td><img src="images/{{$p->image3}}" style="width:100px;height:130px;"></td>
                   <td><img src="images/{{$p->image4}}" style="width:100px;height:130px;"></td> -->
                   <td>{{$p->description}}</td>

                   
                   <td><a href="/deleteplant/{{$p->plant_id}}"><i class="fa fa-trash" aria-hidden="true"></i></a>  <a href="/updaterecord/{{$p->plant_id}}"><i class="fa fa-edit"></i></a></td>
               </tr>
               @endforeach
            </tbody>
            </table>  
        </div>
    </div>
</div>

@endsection


