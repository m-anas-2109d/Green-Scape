@extends("PlantNest_Admin.AdminLayout")
@section("content")


<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
        <link href="../PlantNest_admin/assets/plugins/pace-master/themes/blue/pace-theme-flash.css" rel="stylesheet"/>
        <link href="../PlantNest_admin/assets/plugins/uniform/css/uniform.default.min.css" rel="stylesheet"/>
        <link href="../PlantNest_admin/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../PlantNest_admin/assets/plugins/fontawesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
        <link href="../PlantNest_admin/assets/plugins/line-icons/simple-line-icons.css" rel="stylesheet" type="text/css"/>	
        <link href="../PlantNest_admin/assets/plugins/offcanvasmenueffects/css/menu_cornerbox.css" rel="stylesheet" type="text/css"/>	
        <link href="../PlantNest_admin/assets/plugins/waves/waves.min.css" rel="stylesheet" type="text/css"/>	
        <link href="../PlantNest_admin/assets/plugins/switchery/switchery.min.css" rel="stylesheet" type="text/css"/>
        <link href="../PlantNest_admin/assets/plugins/3d-bold-navigation/css/style.css" rel="stylesheet" type="text/css"/>	
        <link href="../PlantNest_admin/assets/plugins/slidepushmenus/css/component.css" rel="stylesheet" type="text/css"/>
        
        <!-- Theme Styles -->
        <link href="../PlantNest_admin/assets/css/modern.min.css" rel="stylesheet" type="text/css"/>
        <link href="../PlantNest_admin/assets/css/themes/green.css" class="theme-color" rel="stylesheet" type="text/css"/>
        <link href="../PlantNest_admin/assets/css/custom.css" rel="stylesheet" type="text/css"/>
        
        <script src="../PlantNest_admin/assets/plugins/3d-bold-navigation/js/modernizr.js"></script>
        <script src="../PlantNest_admin/assets/plugins/offcanvasmenueffects/js/snap.svg-min.js"></script>

<?php
use App\Models\category;

$data = category::get();
?>



<br><br><br>                
<h1 style="color:white">Enter flowering planet</h1>
<div id="main-wrapper">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="panel panel-white">
                                <div class="panel-heading clearfix">
                                    <h4 class="panel-title">Basic Form</h4>
                                </div>
                                <div class="panel-body">
                                    <form action="  {{URL:: to('/update_record/' .$update->plant_id)}}"  method="post"  enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Enter Product Name</label>
                                            <input type="text" class="form-control"  placeholder="Enter Name" name="updatename" value="{{$update['name']}}" >
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Enter price</label>
                                            <input type="text" class="form-control"  placeholder="Enter price" name="updateprice" value="{{$update['price']}}" >
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Enter description</label>
                                            <input type="text" class="form-control"  placeholder="Enter details" name="updatedescription" value="{{$update['description']}}" >
                                        </div>


                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Enter quantity</label>
                                            <input type="text" class="form-control"  placeholder="Enter quantity" name="updatequantity" value="{{$update['quantity']}}" >
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Enter plant genes</label>
                                            <input type="text" class="form-control"  placeholder="plant_genes" name="updateplant_genes" value="{{$update['plant_genes']}}" >
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Enter Image</label>
                                            <input type="file" class="form-control"   name="updateplantimage" value="images/{{$update['image']}}" >
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Enter Image</label>
                                            <input type="file" class="form-control"   name="updateplantimage_2" value="images/{{$update['image']}}" >
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Enter Image</label>
                                            <input type="file" class="form-control"   name="updateplantimage_3" value="images/{{$update['image']}}" >
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Enter Image</label>
                                            <input type="file" class="form-control"   name="updateplantimage_4" value="images/{{$update['image']}}" >
                                        </div>

                                        

                                        
                                        <!-- <div class="form-group">
                                            <select name="category_type" id=""  class="form-control">
                                            <option value="" readonly>Select Category Type</option>
                                            @foreach($data as $da)                                                
                                                <option value="">{{$da->category_type}}</option>
                                            @endforeach

                                            </select>
                                        </div>


 -->

                                             </div> 
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        @endsection