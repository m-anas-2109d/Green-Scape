@extends("PlantNest_USER.user_layout")
@section("dashboard")

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- ##### Breadcrumb Area Start ##### -->
<div class="breadcrumb-area">
        <!-- Top Breadcrumb Area -->
        <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url(../PlantNest_USER/img/bg-img/24.jpg);">
            <h2>Feedback</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">feedback</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Contact Area Info Start ##### -->
    <div class="contact-area-info section-padding-0-100">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <!-- Contact Thumbnail -->
                <div class="col-12 col-md-6">
                    <div class="contact--thumbnail">
                        <img src="https://media.istockphoto.com/id/1257919817/vector/online-feedback-concept-a-client-putting-stars-in-the-feedback-box-evaluating-product.jpg?s=170667a&w=0&k=20&c=qtVVm5O5P1mbU0XHI4BVQ77VVs6pDHmoIk8ZTED5Q7o=" alt="">
                    </div>
                </div>
                <div class="col-12 col-lg-5">
                    <!-- Section Heading -->
                    <div class="section-heading">
                        <h2>Feedback</h2>
                        <p>Share your Feedback</p>
                    </div>
                    <!-- Contact Form Area -->
                    <div class="contact-form-area mb-100">
                        <form action="{{URL::to('/feedbackpost')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="contact-name" name="nameinp" placeholder="Your Name" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="contact-email" name="emailinp" placeholder="Your Email">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="contact-subject" name="numberinp" placeholder="Phone Number" maxlength="13">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea class="form-control" id="message" name="msginp" cols="30" rows="10" placeholder="Message"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn alazea-btn mt-15">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Contact Area Info End ##### --> 

    <script>
    @if(session('feedbacksuccess'))
        Swal.fire({
            icon: 'success',
            title: 'Thanks',
            text: '{{ session('feedbacksuccess') }}',
        });
    @endif
    </script>


@endsection