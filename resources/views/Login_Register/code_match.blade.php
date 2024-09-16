<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link rel="icon" href="PlantNest_USER/img/core-img/favicon.ico">
    <link rel="stylesheet" type="text/css" href="otp.css">
    <link rel="shortcut icon" type="image/x-icon" href="folder2/assets/images/favicon.ico">
    <link
        href="https://fonts.googleapis.com/css?family=Lato:300,400,400italic,700,700italic,900,900italic&amp;subset=latin,latin-ext"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Open%20Sans:300,400,400italic,600,600italic,700,700italic&amp;subset=latin,latin-ext"
        rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
        integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <style>
    input[type="text"],
    input[type="password"] {
        margin-top: 30px;
        height: 45px;
        width: 300px;
        font-size: 18px;
        margin-bottom: 20px;
        background-color: #fff;
        padding-left: 40px;
    }

    .form-input::before {
        content: "\f007";
        font-family: "FontAwesome";
        padding-left: 07px;
        padding-top: 40px;
        position: absolute;
        font-size: 35px;
        color: #2980b9;
    }

    .form-input:nth-child(2)::before {
        content: "\f023";
    }

    #image {
        padding: 0px !important;
        height: 700px;
    }

    .container {
        background-color: white;
        /* border: 1px solid black; */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        /* Adjust the values as needed */
        padding: 20px;
        /* Add padding to make the shadow visible */
    }
    </style>
</head>

<body>
    <!-- Main area -->
    <div class="p-5 bg-image" style="background-image: url('../../PlantNest_USER/img/bg-img/24.jpg'); height: 300px;">
    </div><br>

    <div class="container mt-5" style="background-color:white;">
        <div class="container-fluid ">
            <div class="row">
                <div class="col-md-12 text-center" style="height:420px; background-color:white; ">
                    <center>
                        <img src="PlantNest_USER/img/logplant-removebg-preview.png" alt="">
                        <form action="{{URL:: to('/code_match_')}}" method="POST">
                            @csrf
                            <?php
                            use App\Models\temp_verfy;
                            ?>
                            <div><br>
                                <label class="mt-3" for="frm-login-uname"
                                    style="font-weight:bold; color:black; font-size:2.5rem; margin-right:15px; margin-bottom:-100px; color:#74c644;">Email</label><br>
                                <input class="" type="text" id="frm-login-uname" name="emailinput"
                                    value="{{session('sessionuseremail')}}"
                                    style="border:2px solid black;font-weight:bold; width:38rem; border-radius:1rem; height:5rem;"
                                    readonly>
                            </div>
                            <div>
                                <label for="frm-login-uname"
                                    style="font-weight:bold; color:black; font-size:1.6rem; color:#74c644;">Please
                                    Enter Verification code sent to email address</label><br>
                                <br>
                                <div class="row">
                                    <div class="col-md-1">

                                    </div>
                                    <div class="col-md-2">

                                    </div>

                                    <div class="col-md-1">
                                        <input type="" id='ist' onkeyup="clickEvent(this,'sec')" name="code0"
                                            maxLength="1"
                                            style="border:2px solid black; color:black; font-weight:bold; width:4rem; height:3rem; font-size:1.5rem; text-align:center;"
                                            required>
                                    </div>

                                    <div class="col-md-1">
                                        <input type="" id="sec" onkeyup="clickEvent(this,'third')" name="code1"
                                            maxLength="1"
                                            style="border:2px solid black; color:black; font-weight:bold; width:4rem; height:3rem; font-size:1.5rem; text-align:center;"
                                            required>
                                    </div>

                                    <div class="col-md-1">
                                        <input type="" id="third" onkeyup="clickEvent(this,'fourth')" name="code2"
                                            maxLength="1"
                                            style="border:2px solid black; color:black; font-weight:bold; width:4rem; height:3rem; font-size:1.5rem; text-align:center;"
                                            required>
                                    </div>

                                    <div class="col-md-1">
                                        <input type="" id="fourth" onkeyup="clickEvent(this,'fifth')" name="code3"
                                            maxLength="1"
                                            style="border:2px solid black; color:black; font-weight:bold; width:4rem; height:3rem; font-size:1.5rem; text-align:center;"
                                            required>
                                    </div>

                                    <div class="col-md-1">
                                        <input type="" id="fifth" onkeyup="clickEvent(this,'six')" name="code4"
                                            maxLength="1"
                                            style="border:2px solid black; color:black; font-weight:bold; width:4rem; height:3rem; font-size:1.5rem; text-align:center;"
                                            required>
                                    </div>
                                    <div class="col-md-1">
                                        <input type="" id="six" onkeyup="clickEvent(this,'seven')" name="code5"
                                            maxLength="1"
                                            style="border:2px solid black; color:black; font-weight:bold; width:4rem; height:3rem; font-size:1.5rem; text-align:center;"
                                            required>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-4"><br>
                                    <button class="btn btn-primary" type="submit"
                                        style="width:18rem;  background-color:#74c644; font-weight:bold; height:4.5rem; width:15rem; border-radius:2rem; color:white; font-size:2rem;">Verify</button>
                                </div>
                            </div>
                            @if(session('succdess'))
                            <div class="alert alert-primary" role="alert">
                                <strong style="color:white;">{{(session('succdess'))}}</strong>
                            </div>
                            @endif
                        </form>
                        <br><br>
                    </center>
                </div>
            </div>
            @if(session()->has('register'))
            <div class="alert alert-success">
                {{ session()->get('register') }}
            </div>
            @endif
        </div>
        <script>
        function clickEvent(first, last) {
            if (first.value.length) {
                document.getElementById(last).focus();
            }
        }
        </script>
</body>

</html>