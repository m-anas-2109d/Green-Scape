<!doctype html>
<html lang="en">
  <head>
    <title>Login</title>
    <link rel="icon" href="PlantNest_USER/img/core-img/favicon.ico">

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="PlantNest_USER/img/core-img/favicon.ico">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      <!-- Section: Design Block -->
<section class="text-center">
    <!-- Background image -->
    <div class="p-5 bg-image" style="
          background-image: url('PlantNest_USER/img/bg-img/24.jpg');
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
          <div class="col-lg-8">
            <h2 class="fw-bold mb-5">Sign up now</h2>
            <form action="{{URL:: to ('/register')}}" method="POST" id="form">
              @csrf
            <!-- 2 column grid layout with text inputs for the first and last names -->
              <div class="row">
                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                    <input type="text" id="form3Example1" class="form-control" name="first_name"/>
                    <label class="form-label" for="form3Example1">First name</label>
                  </div>
                </div>
                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                    <input type="text" id="form3Example2" class="form-control" name="last_name"/>
                    <label class="form-label" for="form3Example2">Last name</label>
                  </div>
                </div>
              </div>
  
              <!-- Email input -->
              <div class="form-outline mb-4">
                <input type="email" id="form3Example3" class="form-control" name="email"/>
                <label class="form-label" for="form3Example3">Email address</label>
              </div>


               <!-- Email input -->
               <div class="form-outline mb-4">
                <input type="text" id="form3Example3" class="form-control" name="contact"/>
                <label class="form-label" for="form3Example3">Contact No</label>
              </div>


              <!-- Password input -->
              <div class="form-outline mb-4">
                <input type="password" id="form3Example4" class="form-control" name="passwordinput" />
                <label class="form-label" for="form3Example4">Password</label>
              </div>

              <div class="form-outline flex-fill mb-0">
                <input type="password" id="form3Example4c" class="form-control"
                    name="coninput" style="border: 1px solid gray;" required />
                <label class="form-label" for="form3Example4c"
                    style="font-weight:bold;">Confirm Password</label>
            </div>

  
              <!-- Submit button -->
              <button type="submit" class="btn btn mb-2" style="background-color:#70c645; color:white;">
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
  <!-- Section: Design Block -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>