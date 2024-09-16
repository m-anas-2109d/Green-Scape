<!doctype html>
<html lang="en">

<head>
    <title>Login</title>
    <link rel="icon" href="PlantNest_USER/img/core-img/favicon.ico">

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <link rel="icon" href="PlantNest_USER/img/core-img/favicon.ico">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<style>
@import url('https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap');
@import url('https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');

.password-container {
    position: relative;
}

.password-toggle-icon {
    cursor: pointer;
    position: absolute;
    right: 10px;
    top: 50%;
    transform: translateY(-50%);
    z-index: 1000;
}
</style>

<body>
    @if(session('success'))
    <script>
    Swal.fire({
        icon: 'success',
        title: 'Success',
        text: '{{ session("success") }}',
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'OK'
    });
    </script>
    @endif
    <!-- Section: Design Block -->
    <section class="text-center">
        <!-- Background image -->
        <div class="p-5 bg-image" style="
          background-image: url('PlantNest_USER/img/bg-img/24.jpg');
          height: 300px;
          "></div>
        <!-- Background image -->

        <div class=" mx-3 mx-md-4 shadow-3-strong" style="
          margin-top: -100px;
          background: hsla(0, 0%, 100%, 0.8);
          backdrop-filter: blur(30px);
          
          ">
            <div class="card-body py-6 px-md-3">

                <div class="row d-flex justify-content-center">
                    <div class="col-lg-7" style="height:550px; background-color:white; "><br><br><br><br>
                        <img src="PlantNest_USER/img/logplant-removebg-preview.png" alt="" style="margin-bottom:20px;">
                        <h2 class="fw-bold mb-4">Login</h2>
                        <form action="{{URL:: to ('/loginadminpost')}}" method="POST" id="form">
                            @Csrf
                            <!-- 2 column grid layout with text inputs for the first and last names -->
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                    </div>
                                </div>
                            </div>

                            <!-- Email input -->
                            <center>
                                <div class="form-outline mb-3 ">
                                    <div class="col-md-6 mb-3 justify-content-center">
                                        <input type="text" class="form-control" id="first_name form3Example3"
                                            name="emailinput" value="" placeholder="Email address *" required>
                                    </div>
                                </div>
                            </center>

                            <!-- Password input -->
                            <center>
                                <div class="form-outline mb-3 ">
                                    <div class="col-md-6 mb-4 justify-content-center password-container">
                                            <span onclick="togglePasswordVisibility('form3Example4')"
                                                class="password-toggle-icon" style="padding-right:20px;"><i class="toggle-password fa fa-fw fa-eye-slash"></i>
</span>
                                        <input type="password" name="passwordinput" placeholder="Password"
                                            class="form-control" id="form3Example4">
                                    </div>
                                </div>
                            </center>

                            <div class="form-outline mb-1" style="margin-left:70px; margin-top:-20px">
                                <div class="col-md-6 mb-2 mt-2 justify-content-center">
                                    <a href="/password/reset/email" class="ml-5" >Forget Password</a>

                                </div>
                            </div>



                            <!-- Submit button -->
                            <button type="submit" class="btn btn mb-3 form-control form-outline mb-3 mt-3"
                                style="background-color:#70c645; color:white; width:250px">
                                Sign in
                            </button>
                            @if(session('errormessage'))
                            <div class="alert alert-info" role="alert">
                                <strong>{{(session('errormessage'))}}</strong>
                            </div>
                            @endif


                            <!-- Register buttons -->
                            <div class="text-center">
                                <p>or register up with? <a href="/register">Register Here</a></p>


                            </div>
                            <button type="button" class="btn btn-link btn-floating mx-1">
                                <i class="fa fa-facebook-f"></i>
                            </button>

                            <button type="button" class="btn btn-link btn-floating mx-1">
                                <i class="fa fa-google"></i>
                            </button>

                            <button type="button" class="btn btn-link btn-floating mx-1">
                                <i class="fa fa-twitter"></i>
                            </button>

                            <button type="button" class="btn btn-link btn-floating mx-1">
                                <i class="fa fa-github"></i>
                            </button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </section>


    


        <script>
        function togglePasswordVisibility(inputId) {
            var passwordInput = document.getElementById(inputId);
            var icon = document.querySelector('.password-toggle-icon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.innerHTML = '<i class="toggle-password fa fa-fw fa-eye"></i>'; // Visibility on
            } else {
                passwordInput.type = 'password';
                icon.innerHTML = '<i class="toggle-password fa fa-fw fa-eye-slash"></i>'; // Visibility off
            }
        }
        </script>




        <!-- Section: Design Block -->
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
        </script>
    </body>

    </html>