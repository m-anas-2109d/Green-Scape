@extends("PlantNest_admin.AdminLayout")

@section("title2")
Edit Category
@endsection

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

@section("content")

<div class="page-title">
    <h3>Form Elements</h3>
    <div class="page-breadcrumb">
        <ol class="breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li><a href="#">Forms</a></li>
            <li class="active">Add Category</li>
        </ol>
    </div>
</div>
                

<div class="row">
<div class="col-md-6 col-lg-12">
    <div class="panel panel-white">
        <div class="panel-heading clearfix">
            <h4 class="panel-title">Edit Category</h4>
        </div>
        <div class="panel-body">
            <form method="POST" action="{{URL::to('/updatecategory/'.$edit->category_id)}}">
            @csrf
                <div class="form-groupe">
                    <label for="exampleInputEmail1">Category ID</label>
                    <input type="number" class="form-control" id="exampleInputEmail1" name="idinp" value="{{$edit->category_id}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Category Name</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="catnameinp" value="{{$edit->category_name}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Category Type</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="cattypeinp" value="{{$edit->category_type}}">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>


<script src="../PlantNest_admin/assets/plugins/jquery/jquery-2.1.4.min.js"></script>
<script src="../PlantNest_admin/assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="../PlantNest_admin/assets/plugins/pace-master/pace.min.js"></script>
<script src="../PlantNest_admin/assets/plugins/jquery-blockui/jquery.blockui.js"></script>
<script src="../PlantNest_admin/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="../PlantNest_admin/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="../PlantNest_admin/assets/plugins/switchery/switchery.min.js"></script>
<script src="../PlantNest_admin/assets/plugins/uniform/jquery.uniform.min.js"></script>
<script src="../PlantNest_admin/assets/plugins/offcanvasmenueffects/js/classie.js"></script>
<script src="../PlantNest_admin/assets/plugins/offcanvasmenueffects/js/main.js"></script>
<script src="../PlantNest_admin/assets/plugins/waves/waves.min.js"></script>
<script src="../PlantNest_admin/assets/plugins/3d-bold-navigation/js/main.js"></script>
<script src="../PlantNest_admin/assets/js/modern.min.js"></script>
<script src="../PlantNest_admin/assets/js/pages/inbox.js"></script>

@endsection