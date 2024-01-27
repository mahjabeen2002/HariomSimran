@extends("userside.layout")
@section("title")
<head>
<title>Contact us | HariomSimran</title>
<meta name="description" content="Contact Page" />
<meta name="keywords" content="HariomSimran" />
</head>
@endsection
@section("usercontent")
<!-- Start main-content -->
<div class="sigma_subheader dark-overlay dark-overlay-2" style="background-image: url(../../Mytemplate/assets/img/subheader.jpg)">

  <div class="container">
    <div class="sigma_subheader-inner">
      <div class="sigma_subheader-text">
        <h1>Contact Us</h1>
      </div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a class="btn-link" href="#">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
        </ol>
      </nav>
    </div>
  </div>

</div>

    <!-- Section: Have Any Question -->
    <section class="divider">
      <div class="container pt-60 pb-60">
       <br><br>
        <div class="section section-padding pt-0">
          <div class="container">
            <div class="row">
      
              <div class="col-lg-4">
                <div class="sigma_icon-block text-center light icon-block-7">
                  <i class="flaticon-email"></i>
                  <div class="sigma_icon-block-content">
                    <span>Send Email <i class="far fa-arrow-right"></i> </span>
                    <h5> Email Address</h5>
                    <p>info@example.com</p>
                    <p>info@support.com</p>
                  </div>
                  <div class="icon-wrapper">
                    <i class="flaticon-email"></i>
                  </div>
                </div>
              </div>
      
              <div class="col-lg-4">
                <div class="sigma_icon-block text-center light icon-block-7">
                  <i class="flaticon-call"></i>
                  <div class="sigma_icon-block-content">
                    <span>Call Us Now <i class="far fa-arrow-right"></i> </span>
                    <h5> Phone Number </h5>
                    <p> +123 478 390 </p>
                    <p> +489 472 928 </p>
                  </div>
                  <div class="icon-wrapper">
                    <i class="flaticon-call"></i>
                  </div>
                </div>
              </div>
      
              <div class="col-lg-4">
                <div class="sigma_icon-block text-center light icon-block-7">
                  <i class="flaticon-location"></i>
                  <div class="sigma_icon-block-content">
                    <span>Find Us Here <i class="far fa-arrow-right"></i> </span>
                    <h5> Location </h5>
                    <p>16/A Daddy Yankee Tower</p>
                    <p>New York, US</p>
                  </div>
                  <div class="icon-wrapper">
                    <i class="flaticon-location"></i>
                  </div>
                </div>
              </div>
      
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Section Contact -->
    <section id="contact" class="divider bg-lighter">
      <div class="container-fluid pt-0 pb-0">
        <div class="section-content">
          <div class="row">
            <div class="col-sm-12 col-md-12">
              <div class="contact-wrapper">
                <h3 class="line-bottom mt-0 mb-20 text-theme-color-2">Interested in discussing?</h3>
                <p class="mb-30">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                @if(session('sent'))
                <div class="alert alert-info " role="alert">
                    <strong style="text-align: center">{{session('sent')}}</strong>
                </div>
            @endif
                <!-- Contact Form -->

                  <form action="{{URL::to('/contactuspost') }}" method="post" id="contact_form" class="contact-form form-message-pct">
                    @csrf
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="form_name">Name <small>*</small></label>

                        <input name="insertname" class="form-control" id="ContactFormName"  type="text" placeholder="Enter Name" value="{{old('insertname')}}" required="">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="form_email">Email <small>*</small></label>



                        <input name="insertemail" class="form-control required email" type="email" id="ContactFormEmail" value="{{old('insertemail')}}" placeholder="Enter Email">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                      <div class="form-group">


                      <div class="form-group">
                        <label for="form_phone">Phone</label>

                        <input name="insertphone" class="form-control" id="ContactFormPhone" type="text" placeholder="Enter Phone">
                      </div>
                    </div>

                  <div class="form-group">
                    <label for="form_name">Message</label>


                    <textarea name="insertmessage" id="ContactFormMessage" class="form-control required" rows="5" placeholder="Enter Message">{{old('insertmessage')}}</textarea>

                </div>
              </div>
                  <div class="form-group">

                    <button type="submit" class="sigma_btn-custom section-button form-control" value="Send Message">Submit</button>

                  </div>
                </form>
                <!-- Contact Form Validation-->

              </div>
            </div>

          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- end main-content -->
@endsection
