@extends("PlantNest_USER.user_layout")
@section("dashboard")



<!-- ##### Breadcrumb Area Start ##### -->
<div class="breadcrumb-area">
    <!-- Top Breadcrumb Area -->
    <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center"
        style="background-image: url(PlantNest_USER/img/bg-img/24.jpg);">
        <h2>Profile</h2>
    </div>
</div>
<!-- ##### Breadcrumb Area End ##### -->

<style>
.gradient-custom {
    /* fallback for old browsers */
    background: #70c745;

    /* Chrome 10-25, Safari 5.1-6 */
    /* background: -webkit-linear-gradient(to right bottom, rgba(246, 211, 101, 1), rgba(253, 160, 133, 1)); */

    /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    /* background: linear-gradient(to right bottom, rgba(246, 211, 101, 1), rgba(253, 160, 133, 1)) */
}


.visuallyhidden {
    border: 0;
    clip: rect(0 0 0 0);
    height: 1px;
    margin: -1px;
    overflow: hidden;
    padding: 0;
    position: absolute;
    width: 1px;
}
</style>


@foreach($profile as $pf)

@endforeach
<form action="{{URL:: to ('/update_company/' .session('sessionuseremail'))}}" method="post"
    enctype="multipart/form-data">
    @csrf
    <section class="vh-100" style="background-color: #f4f5f7;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-lg-6 mb-4 mb-lg-0">
                    <div class="card mb-3" style="border-radius: .5rem;">
                        <div class="row g-0">

                            <div class="col-md-4 gradient-custom text-center text-white"
                                style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                                <!-- <p>Profile</p> -->

                                <br><br>
                                <img src="images/{{$pf->profile_image}}" alt="Avatar" id="outImg" class="img-fluid "
                                    style="width: 80px;" />
                                <!-- <input type="file"  name="image" class="imageinput p-2 mt-3"
                                    onchange="onFileSelected(event)" style="color:#70c745;" value="Select an Image"> -->

                                <input type="file" name="image" id="file-input" class="visuallyhidden"
                                    onchange="onFileSelected(event)">
                                <!-- <a href="#" class="file-upload">File upload</a> --><br><br>
                                <button class="file-upload btn btn">Image upload</button>




                                <!-- <h5 style="color:white;">{{$pf->first_name}}</h5> -->
                                <input type="text" placeholder="Enter Company Name"
                                    onkeypress="return /[a-zA-Z space]/i.test(event.key)" name="first_name"
                                    class="form-control input-sm mt-3" value="{{$pf['first_name']}}"><br>

                                <input type="text" placeholder="Enter Company Name"
                                    onkeypress="return /[a-zA-Z space]/i.test(event.key)" name="last_name"
                                    class="form-control input-sm" value="{{$pf['last_name']}}">
                                <!-- <p style="color:white;">{{$pf->last_name}}</p> -->
                                <!-- <i class="far fa-edit mb-5"></i> -->
                            </div>

                            <div class="col-md-8">
                                <div class="card-body p-4">
                                    <h6>User Information</h6>
                                    <hr class="mt-0 mb-4">
                                    <div class="row pt-1">
                                        <div class="col-6 mb-3">
                                            <h6>Email</h6>
                                            <p class="text-muted"><input type="text" placeholder="Enter Company Name"
                                                    onkeypress="return /[a-zA-Z space]/i.test(event.key)" name="email"
                                                    class="form-control input-sm" value="{{$pf['email']}}" readonly></p>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <h6>Phone</h6>
                                            <!-- <p class="text-muted">{{$pf->contact_no}}</p> -->
                                            <input type="text" placeholder="Enter Company Name" maxLength="11"
                                                name="contact_no" class="form-control input-sm"
                                                value="{{$pf['contact_no']}}">
                                        </div>
                                    </div>
                                    <h6>Password</h6>
                                    <hr class="mt-0 mb-4">
                                    <div class="row pt-1">
                                        <div class="col-6 mb-3">
                                            <!-- <p class="text-muted">{{$pf->password}}</p> -->
                                            <input type="password" placeholder="Enter Company Name" name="password"
                                                class="form-control input-sm" value="{{$pf['password']}}">
                                        </div>

                                    </div>

                                    <button type="submit" class="btn btn-primary ml-5 mt-2"
                                        style="background-color:#70c745;">Update</button>
                                    <div class="d-flex justify-content-start">
                                        <!-- <a href="#!"><i class="fab fa-facebook-f fa-lg me-3"></i></a>
                  <a href="#!"><i class="fab fa-twitter fa-lg me-3"></i></a>
                  <a href="#!"><i class="fab fa-instagram fa-lg"></i></a> -->
                                    </div>
                                </div>
                            </div>
</form>
</div>
</div>
</div>
</div>
</div>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>

<script>
function onFileSelected(event) {
    var selectedFile = event.target.files[0];
    var reader = new FileReader();

    var imgtag = document.getElementById("outImg");
    imgtag.title = selectedFile.name;

    reader.onload = function(event) {
        imgtag.src = event.target.result;
    };

    reader.readAsDataURL(selectedFile);
}


$('.file-upload').on('click', function(e) {
    e.preventDefault();
    $('#file-input').trigger('click');
});
</script>
@endsection