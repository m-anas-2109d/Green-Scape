<!doctype html>
<html lang="en">

<head>
    <title>Register</title>
    <link rel="icon" href="PlantNest_USER/img/core-img/favicon.ico">

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <!-- Section: Design Block -->
    <section class="text-center">
        <!-- Background image -->
        <div class="p-5 bg-image" style="
          background-image: url(PlantNest_USER/img/bg-img/24.jpg);
          height: 300px;
          "></div>
        <!-- Background image -->

        <div class="card mx-4 mx-md-5 shadow-5-strong" style="
          margin-top: -100px;
          background: hsla(0, 0%, 100%, 0.8);
          backdrop-filter: blur(30px);
          ">
            <div class="card-body py-5 px-md-5">

                <div class="row d-flex justify-content-center">
                    <div class="col-lg-9"  style="height:680px; background-color:white; "><br><br><br><br>
                        <img src="PlantNest_USER/img/logplant-removebg-preview.png" alt="" style="margin-bottom:20px;">
                        <h2 class="fw-bold mb-5">Sign up now</h2>
                        <form action="{{URL:: to ('/input')}}" method="POST" id="form" enctype="multipart/form-data">
                            @csrf
                            <!-- 2 column grid layout with text inputs for the first and last names -->
                            <input type="file" name="image" class="imageinput p-2 ml-5" onchange="onFileSelected(event)"
                                style="height:2.7rem; width:19rem; border-color: #189AB4; border-bottom-width: 2px;">

                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input type="text" id="form3Example1" class="form-control" name="first_name"
                                            placeholder="First name" />

                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input type="text" id="form3Example2" class="form-control"
                                            placeholder="Last name" name="last_name" />

                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input type="email" id="form3Example3" class="form-control"
                                            placeholder="Email address" name="emailinput" />

                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input type="text" id="myInput" class="form-control" placeholder="Contact No"
                                            maxLength="11" name="contact" />

                                    </div>
                                </div>
                            </div>

                            <div class="form-outline mb-4">
                                <input type="password" id="passwordInput" placeholder="Password" class="form-control"
                                    name="passwordinput" />
                            </div>

                            <div class="form-outline flex-fill mb-0">
                                <input type="password" id="confirmPasswordInput" class="form-control"
                                    placeholder="Confirm Password" name="coninput" style="border: 1px solid gray;"
                                    required />
                            </div>

                            <div class="form-outline flex-fill mb-0">
                                <input type="checkbox" onclick="togglePasswordVisibility()"> Show Password
                            </div>




                            <!-- Submit button -->
                            <button type="submit" class="btn btn mb-2 btn-block"
                                style="margin-top: 20px; background-color:#70c645; color:white;">
                                Sign up
                            </button>

                            <!-- Register buttons -->
                            <div class="text-center">
                                <p>Already have an account? <a href="/login">Login here</a></p>
                                <button type="button" class="btn btn-link btn-floating mx-1">
                                    <i class="fab fa-facebook-f"></i>
                                </button>

                                <button type="button" class="btn btn-link btn-floating mx-1">
                                    <i class="fab fa-google"></i>
                                </button>

                                <button type="button" class="btn btn-link btn-floating mx-1">
                                    <i class="fab fa-twitter"></i>
                                </button>

                                <button type="button" class="btn btn-link btn-floating mx-1">
                                    <i class="fab fa-github"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    

    <script>
    function togglePasswordVisibility() {
        var passwordInput = document.getElementById("passwordInput");
        var confirmPasswordInput = document.getElementById("confirmPasswordInput");

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            confirmPasswordInput.type = "text";
        } else {
            passwordInput.type = "password";
            confirmPasswordInput.type = "password";
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