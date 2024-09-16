@extends("PlantNest_Admin.AdminLayout")

@section("title2")
Products
@endsection

@section("content")


<?php
use App\Models\category;

$data = category::get();    
?>


<div class="page-title">
    <h3>Form Elements</h3>
    <div class="page-breadcrumb">
        <ol class="breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li><a href="#">Forms</a></li>
            <li class="active">Add Product</li>
        </ol><br>
        <a href="/fetchproduct"><i class="fa fa-arrow-left" aria-hidden="true"> Back to List</i></a>
    </div>

    @if(session('productsuccess'))
    <div class="alert alert-primary" role="alert">
    <strong>{{session('productsuccess')}}</strong>
    </div>
    @endif

</div>  
        <div class="row">
            <div class="col-md-6 col-lg-12">
                <div class="panel panel-white">
                    <div class="panel-heading clearfix">
            <h4 class="panel-title">Products</h4>
                     </div>
        <div class="panel-body">
            <form action="{{URL::to('/plant_1')}}" method="post"  enctype="multipart/form-data">
            @csrf
                <div class="form-groupe">
                    <label for="exampleInputEmail1">Product Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="name">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Select Category</label>
                    <select name="category_name" id="exampleInputPassword1"  class="form-control">
                        <option value="" readonly>Select Category</option>
                        @foreach($data as $da)                                                
                        <option value="{{$da->category_id}}">{{$da->category_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Product Price</label>
                    <input type="number" class="form-control" id="exampleInputPassword1" name="price">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Quantity</label>
                    <input type="number" class="form-control" id="exampleInputPassword1" name="quantity">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Species</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="plant_genes">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Product Image</label>
                    <!-- <input type="file" multiple[] class="form-control" id="exampleInputPassword1" name="plantimage"> -->
                    <input type="file" name="plantimages[]"  multiple class="form-control">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Description</label>
                    <textarea class="form-control" id="exampleInputPassword1" placeholder="Enter details" name="description" cols="30" rows="10"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Add product</button>
            </form>
        </div>
    </div>
</div>

@endsection