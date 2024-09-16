<!doctype html>
<html lang="en">

<head>
    <title>Reset</title>
    <link rel="icon" href="../../PlantNest_USER/img/core-img/favicon.ico">

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <link rel="icon" href="../../PlantNest_USER/img/core-img/favicon.ico">

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
.container {
            background-color: white;
            /* border: 1px solid black; */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Adjust the values as needed */
            padding: 20px; /* Add padding to make the shadow visible */
        }
</style>

<body>
    <!-- Section: Design Block -->
    <section class="text-center">
        <!-- Background image -->
        <div class="p-5 bg-image" style="
          background-image: url('../../PlantNest_USER/img/bg-img/24.jpg');
          height: 300px;
          "></div>
        <!-- Background image -->

        <div class=" mx-3 mx-md-4 shadow-3-strong" style="
          margin-top: -100px;
          background: hsla(0, 0%, 100%, 0.8);
          backdrop-filter: blur(30px);
          
          ">
            <div class="card-body py-6 px-md-3">

                <div class="row d-flex justify-content-center" >
                    <div class="col-lg-7" style="height:550px; background-color:white; "><br><br><br><br>
                        <img src="../../PlantNest_USER/img/logplant-removebg-preview.png" alt=""
                            style="margin-bottom:20px;">
                        <h2 class="fw-bold mb-4">Verify Code</h2>
                        <form method="POST" action="{{ URL::TO('/password/reset') }}" id="form">
                            @csrf

                            <?php
                            use App\Models\temp_verfy;
                            use App\Models\user_registration;

        // Retrieve the email from the session
         $sessionUserEmail = session('sessionuseremail');

        // Retrieve the email from the user_registration model based on the session email
        $user = user_registration::where('email', $sessionUserEmail)->first();
        $email = $user ? $user->email : null;

         
        ?>
                            <center>
                                <div class="form-outline mb-3 ">
                                    <div class="col-md-6 mb-3 justify-content-center">
                                        <input id="email" type="email" class="form-control" name="email"
                                            value="{{ $email }}" readonly>

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </center>

                            <center>
                                <div class="form-outline mb-3 ">
                                    <div class="col-md-6 mb-3 justify-content-center">
                                        <input placeholder="Verification Code" id="code" type="text"
                                            class="form-control @error('code') is-invalid @enderror" name="code"
                                            required autofocus>

                                        @error('code')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </center>

                            <center>
                                <div class="form-outline mb-3 ">
                                    <div class="col-md-6 mb-3 justify-content-center">
                                        <input placeholder="Password" id="passwordInput" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="new-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </center>

                            <center>
                                <div class="form-outline mb-3 ">
                                    <div class="col-md-6 mb-3 justify-content-center">
                                        <input placeholder="Confirm Password" id="confirmPasswordInput" type="password"
                                            class="form-control" name="password_confirmation" required
                                            autocomplete="new-password">
                                    </div>
                                </div>

                                <div class="form-outline flex-fill mb-0">
                                <input type="checkbox" onclick="togglePasswordVisibility()"> Show Password
                            </div>
                            </center>

                            <button type="submit" class="btn btn mb-3 form-control form-outline mb-3 mt-3"
                                style="background-color:#70c645; color:white; width:250px">
                                {{ __('Reset Password') }}
                            </button>

                            <!-- <div class="text-center">
                                
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
                    </div> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
</body>

</html>