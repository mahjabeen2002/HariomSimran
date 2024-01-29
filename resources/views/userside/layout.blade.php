{{-- <!DOCTYPE html>
<html dir="ltr" lang="en">
@yield('title')
<!-- index-mp-layout208:42-->
<head>

<!-- Meta Tags -->
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>

<!-- Favicon and Touch Icons -->
<link href="../../Mytemplate/images/favicon.png" rel="shortcut icon" type="image/png">
<link href="../../Mytemplate/images/apple-touch-icon.png" rel="apple-touch-icon">
<link href="../../Mytemplate/images/apple-touch-icon-72x72.png" rel="apple-touch-icon" sizes="72x72">
<link href="../../Mytemplate/images/apple-touch-icon-114x114.png" rel="apple-touch-icon" sizes="114x114">
<link href="../../Mytemplate/images/apple-touch-icon-144x144.png" rel="apple-touch-icon" sizes="144x144">

<!-- Stylesheet --->
<link href="../../Mytemplate/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="../../Mytemplate/css/jquery-ui.min.css" rel="stylesheet" type="text/css">
<link href="../../Mytemplate/css/animate.css" rel="stylesheet" type="text/css">
<link href="../../Mytemplate/css/css-plugin-collections.css" rel="stylesheet"/>
<!-- CSS | menuzord megamenu skins -->
<link id="menuzord-menu-skins" href="../../Mytemplate/css/menuzord-skins/menuzord-rounded-boxed.css" rel="stylesheet"/>
<!-- CSS | Main style file -->
<link href="../../Mytemplate/css/style-main.css" rel="stylesheet" type="text/css">
<!-- CSS | Preloader Styles -->
<link href="../../Mytemplate/css/preloader.css" rel="stylesheet" type="text/css">
<!-- CSS | Custom Margin Padding Collection -->
<link href="../../Mytemplate/css/custom-bootstrap-margin-padding.css" rel="stylesheet" type="text/css">
<!-- CSS | Responsive media queries -->
<link href="../../Mytemplate/css/responsive.css" rel="stylesheet" type="text/css">
<!-- CSS | Style css. This is the file where you can place your own custom css code. Just uncomment it and use it. -->
<!-- <link href="../../Mytemplate/css/style.css" rel="stylesheet" type="text/css"> -->

<!-- Revolution Slider 5.x CSS settings -->
<link  href="../../Mytemplate/js/revolution-slider/css/settings.css" rel="stylesheet" type="text/css"/>
<link  href="../../Mytemplate/js/revolution-slider/css/layers.css" rel="stylesheet" type="text/css"/>
<link  href="../../Mytemplate/js/revolution-slider/css/navigation.css" rel="stylesheet" type="text/css"/>

<!-- CSS | Theme Color -->
<link href="../../Mytemplate/css/colors/theme-skin-color-set-1.css" rel="stylesheet" type="text/css">

<!-- external javascripts -->
<script src="../../Mytemplate/js/jquery-2.2.4.min.js"></script>
<script src="../../Mytemplate/js/jquery-ui.min.js"></script>
<script src="../../Mytemplate/js/bootstrap.min.js"></script>
<!-- JS | jquery plugin collection for this theme -->
<script src="../../Mytemplate/js/jquery-plugin-collection.js"></script>

<!-- Revolution Slider 5.x SCRIPTS -->
<script src="../../Mytemplate/js/revolution-slider/js/jquery.themepunch.tools.min.js"></script>
<script src="../../Mytemplate/js/revolution-slider/js/jquery.themepunch.revolution.min.js"></script>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body class="">
<div id="wrapper" class="clearfix">
  <!-- preloader -->
  <div id="preloader">
    <div id="spinner">
      <img alt="" src="../../Mytemplate/images/preloaders/5.gif">
    </div>
    <div id="disable-preloader" class="btn btn-default btn-sm">Disable Preloader</div>
  </div>

  <!-- Header -->
  <header id="header" class="header">
    <div class="header-top bg-white-f1 sm-text-center">
      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <div class="widget no-border m-0">
              <ul class="list-inline sm-text-center mt-5">
                <li> <i class="fa fa-phone text-theme-colored"></i> Call Us at <a href="#">+(012) 345 6789</a> </li>
                <li> <i class="fa fa-envelope-o text-theme-colored"></i> <a href="#">contact@yourdomain.com</a> </li>
              </ul>
            </div>
          </div>
          <div class="col-md-5">
            <div class="widget no-border m-0 ">
              <ul class="pull-right flip sm-pull-none sm-text-center list-inline">
                <li> <a href="/membershipformget">Membership</a> </li> |
               
                @if(session('ida'))
                <li>  <a href="/tcategoryfetch">My Dashboard</a> </li>|
                <li> <a href="/logout">Logout</a> </li>  |
                @elseif(session('id1'))
                <li>  <a href="/user_profile">My Dashboard</a> </li> |
                <li> <a href="/stlogout">Logout</a> </li> |
                @else
              <li>  <a href="/loginget">Login</a> </li> |
              <li> <a href="/registerget">Register</a> </li>|
              @endif
              <li>  <a  href="/certificate">Verify Certificate</a> </li> 
           
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="header-nav">
      <div class="header-nav-wrapper navbar-scrolltofixed bg-white">
        <div class="container">
          <nav id="menuzord-right" class="menuzord default">
            <a class="menuzord-brand pull-left flip" href="/">
              <img src="../../Mytemplate/images/logo-wide.png" width="160px"  alt="">
            </a>
            <ul class="menuzord-menu">
              <li class="active"><a href="/">Home</a></li>

              <li><a href="/about">About us</a></li>

              <li><a href="javascript:void(0">Hinduisms</a>
                <ul class="dropdown hindi">
                </ul>
              </li>

              <li><a href="javascript:void(0)">Stories</a>
                <ul class="dropdown story">
                </ul>
              </li>

              <li><a href="javascript:void(0">Temples</a>
                <ul class="dropdown temple">
                </ul>
              </li>

              <li><a href="javascript:void(0)">Media Center</a>
                <ul class="dropdown media">
                </ul>
              </li>

              <li><a href="#">Courses</a>
                <ul class="dropdown catid">
                </ul>
              </li>
              

              <li><a href="#home">Events</a>
                <ul class="dropdown event">
                </ul>
              </li>
             
              <li><a href="/sindhitipno">Sindhi Tipno</a></li>
              <li><a href="/testyourskill">Test Your Skills</a></li>

            </ul>

          </nav>
        </div>
      </div>
    </div>
  </header> --}}
   <!DOCTYPE html>
  <html lang="en" dir="ltr">
  
  
  <!-- Mirrored from metropolitanhost.com/themes/themeforest/html/maharatri/home-v3.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 11 Oct 2023 10:55:29 GMT -->
  <head>
  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield('title')
  
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="favicon.ico">
  
    <!-- partial:partial/__stylesheets.html -->
    <link rel="stylesheet" href="../../Mytemplate/assets/css/plugins/bootstrap.min.css">
    <link rel="stylesheet" href="../../Mytemplate/assets/css/plugins/animate.min.css">
    <link rel="stylesheet" href="../../Mytemplate/assets/css/plugins/magnific-popup.css">
    <link rel="stylesheet" href="../../Mytemplate/assets/css/plugins/slick.css">
    <link rel="stylesheet" href="../../Mytemplate/assets/css/plugins/slick-theme.css">
    <link rel="stylesheet" href="../../Mytemplate/assets/css/plugins/ion.rangeSlider.min.css">
  
    <!-- Icon Fonts -->
    <link rel="stylesheet" href="../../Mytemplate/assets/fonts/flaticon/flaticon.css">
    <link rel="stylesheet" href="../../Mytemplate/assets/css/plugins/font-awesome.min.css">
    <!-- Template Style sheet -->
    <link rel="stylesheet" href="../../Mytemplate/assets/css/style.css">
    <link rel="stylesheet" href="../../Mytemplate/assets/css/responsive.css">
    <!-- partial -->
  
  </head>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0- 
alpha/css/bootstrap.css" rel="stylesheet">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<link rel="stylesheet" type="text/css" 
href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
  
  <body>
  
    <!-- Preloader Start -->
   
    <!-- Preloader End -->
  
    <!-- partial:partial/__quickview.html -->
    <div class="modal fade sigma_quick-view-modal" id="quickViewModal" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-body">
  
            <div class="close-btn close-dark close" data-bs-dismiss="modal">
              <span></span>
              <span></span>
            </div>
  
            <div class="row">
              <div class="col-md-6">
                <div class="sigma_product-single-thumb">
                  <img src="../../Mytemplate/assets/img/products/new/1.jpg" alt="product">
                </div>
              </div>
              <div class="col-md-6">
  
                <div class="sigma_product-single-content">
  
                  <h4 class="entry-title"> Koobay 14" Wooden Trousers Bottom Clips Hangers w Rose Gold. </h4>
  
                  <div class="sigma_product-price">
                    <span>352$</span>
                    <span>245$</span>
                  </div>
  
                  <div class="sigma_rating-wrapper">
                    <div class="sigma_rating">
                      <i class="fas fa-star active"></i>
                      <i class="fas fa-star active"></i>
                      <i class="fas fa-star active"></i>
                      <i class="fas fa-star active"></i>
                      <i class="far fa-star"></i>
                    </div>
                    <span>255 Reviews</span>
                  </div>
  
                  <p> <strong class="me-2">Interested: <span>05</span></strong> <strong>Availablity: <span>In Stock</span></strong> </p>
  
                  <p class="sigma_product-excerpt">All Religious Books are available in Temple Stores. Our mission is to share the Good of Hinduism, Loving, Faith and Serving.</p>
  
                  <form class="sigma_product-atc-form">
  
                    <div class="sigma_product-variation-wrapper">
                      <div class="sigma_product-radio form-group">
                        <label>
                          <input type="radio" name="size" value="" checked>
                          <span>XS</span>
                        </label>
                        <label>
                          <input type="radio" name="size" value="">
                          <span>S</span>
                        </label>
                        <label>
                          <input type="radio" name="size" value="">
                          <span>M</span>
                        </label>
                        <label>
                          <input type="radio" name="size" value="">
                          <span>L</span>
                        </label>
                        <label>
                          <input type="radio" name="size" value="">
                          <span>XL</span>
                        </label>
                      </div>
                    </div>
  
                    <div class="qty-outter">
                      <a href="product-single.html" class="sigma_btn-custom secondary">Buy Now</a>
                      <div class="qty-inner">
                        <h6>Qty:</h6>
                        <div class="qty">
                          <span class="qty-subtract"><i class="fa fa-minus"></i></span>
                          <input type="text" name="qty" value="1">
                          <span class="qty-add"><i class="fa fa-plus"></i></span>
                        </div>
                      </div>
                    </div>
  
                  </form>
  
                  <!-- Post Meta Start -->
                  <div class="sigma_post-single-meta">
                    <div class="sigma_post-single-meta-item sigma_post-share">
                      <h6>Share</h6>
                      <ul class="sigma_sm">
                        <li>
                          <a href="#">
                            <i class="fab fa-facebook-f"></i>
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <i class="fab fa-linkedin-in"></i>
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <i class="fab fa-twitter"></i>
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <i class="fab fa-youtube"></i>
                          </a>
                        </li>
                      </ul>
                    </div>
                    <div class="sigma_post-single-meta-item">
                      <div class="sigma_product-controls">
                        <a href="#" data-toggle="tooltip" title="Compare"> <i class="far fa-signal-4"></i> </a>
                        <a href="#" data-toggle="tooltip" title="Wishlist"> <i class="far fa-heart"></i> </a>
                      </div>
                    </div>
                  </div>
                  <!-- Post Meta End -->
  
                </div>
  
              </div>
            </div>
  
          </div>
        </div>
      </div>
    </div>
    <!-- partial -->
  
    <!-- partial:partia/__sidenav.html -->
    <aside class="sigma_aside sigma_aside-right sigma_aside-right-panel sigma_aside-bg">
      <div class="sidebar">
  
        <div class="sidebar-widget widget-logo">
          <img src="../../Mytemplate/assets/img/logo.png" class="mb-30" alt="img">
          <p>Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Donec rutrum congue leo eget malesuada. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi.</p>
        </div>
  
        <!-- Instagram Start -->
        <div class="sidebar-widget widget-ig">
          <h5 class="widget-title">Instagram</h5>
          <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 col-6">
              <a href="#" class="sigma_ig-item">
                <img src="../../Mytemplate/assets/img/ig/1.jpg" alt="ig">
              </a>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-6">
              <a href="#" class="sigma_ig-item">
                <img src="../../Mytemplate/assets/img/ig/2.jpg" alt="ig">
              </a>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-6">
              <a href="#" class="sigma_ig-item">
                <img src="../../Mytemplate/assets/img/ig/3.jpg" alt="ig">
              </a>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-6">
              <a href="#" class="sigma_ig-item">
                <img src="../../Mytemplate/assets/img/ig/4.jpg" alt="ig">
              </a>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-6">
              <a href="#" class="sigma_ig-item">
                <img src="../../Mytemplate/assets/img/ig/5.jpg" alt="ig">
              </a>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-6">
              <a href="#" class="sigma_ig-item">
                <img src="../../Mytemplate/assets/img/ig/6.jpg" alt="ig">
              </a>
            </div>
          </div>
        </div>
        <!-- Instagram End -->
  
        <!-- Social Media Start -->
        <div class="sidebar-widget">
          <h5 class="widget-title">Follow Us</h5>
          <div class="sigma_post-share">
            <ul class="sigma_sm square light">
              <li>
                <a href="#">
                  <i class="fab fa-facebook-f"></i>
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="fab fa-linkedin-in"></i>
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="fab fa-twitter"></i>
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="fab fa-youtube"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <!-- Social Media End -->
  
      </div>
    </aside>
  <div class="sigma_aside-overlay aside-trigger-right"></div>
    <!-- partial -->
  
    <!-- partial:partia/__mobile-nav.html -->
    <aside class="sigma_aside sigma_aside-left">
  
      <a class="navbar-brand" href="/"> <img src="../../Mytemplate/assets/img/logo-wide.png" alt="logo"> </a>
  
      <!-- Menu -->
      <ul>
            <li class="menu-item ">
              <a href="/">Home</a>
             
            </li>
             <li class="menu-item">
              <a href="/about">About Us</a>
             
            </li>
            <li class="menu-item menu-item-has-children">
              <a href="javascript:void(0)">Hinduism</a>
              <ul class="sub-menu dropdown hindi">
               
             </ul>
           </li>
           <li class="menu-item menu-item-has-children">
            <a href="javascript:void(0)">Stories</a>
            <ul class="sub-menu dropdown story">
             
           </ul>
         </li>
         <li class="menu-item menu-item-has-children">
          <a href="javascript:void(0)">Temples</a>
          <ul class="sub-menu dropdown temple">
           
         </ul>
       </li>
     

            <li class="menu-item menu-item-has-children">
              <a href="javascript:void(0)">Media Center</a>
              <ul class="sub-menu dropdown media">
              
              </ul>
            </li>
            <li class="menu-item menu-item-has-children">
              <a href="javascript:void(0)">Courses</a>
              <ul class="sub-menu dropdown catid">
               
             </ul>
           </li>
        
            <li class="menu-item menu-item-has-children">
              <a href="#">Event</a>
              <ul class="sub-menu dropdown event">
               
             </ul>
           </li>
      
           <li class="menu-item ">
            <a href="/testyourskill">Test Your Skills</a>
           
          </li>
          
          @if(session('ida'))
          <li class="menu-item ">
            <a href="/tcategoryfetch">My Dashboard</a>
          </li>
         <li class="menu-item ">
          <a href="/logout">Logout</a>
       </li>
         @elseif(session('id1')) 
         <li class="menu-item ">
          <a href="/user_profile">My Dashboard</a>
        </li>
       <li class="menu-item ">
        <a href="/stlogout">Logout</a>
     </li>
       
       @else
       <li class="menu-item ">
        <a href="{{route('login.form')}}">Login</a>
      </li>
     <li class="menu-item ">
      <a href="{{route('register.form')}}">Register</a> 
   </li>
    @endif
        
             <li class="menu-item ">
            <a href="/testyourskill">Verify Your Certificate</a>
           
          </li>
          <li class="menu-item ">
            <a href="/testyourskill">Membership Form</a>
           
          </li>
       </ul>
      
    </aside>
    <div class="sigma_aside-overlay aside-trigger-left"></div>
    <!-- partial -->
  
    <!-- partial:partia/__header.html -->
    <header class="sigma_header header-4 can-sticky header-absolute">
  
      <!-- Top Header Start -->
      <div class="sigma_header-top">
        <div class="container-fluid">
          <div class="sigma_header-top-inner">
            <ul class="sigma_header-top-links">
              <li class="menu-item" style="color: black"> <a style="color: black" href="tel:+123456789"> <i style="color: black" class="fal fa-phone"></i> (+123) 123 4567 890</a> </li>
              <li class="menu-item" style="color: black"> <a style="color: black" href="mailto:info@example.com"> <i style="color: black" class="fal fa-envelope"></i> info@domain.com</a> </li>
            </ul>
            <div class="sigma_header-middle">
              <div class="navbar p-0 shadow-none bg-transparent">
                <ul class="navbar-nav">
                  <li class="menu-item ">
                   <a href="/membershipformget">Membership</a> 
                  </li> 
              @if(session('ida'))
              <li class="menu-item ">
                <a href="/tcategoryfetch">My Dashboard</a>
              </li>
             <li class="menu-item ">
              <a href="/logout">Logout</a>
           </li>
             @elseif(session('id1')) 
             <li class="menu-item ">
              <a href="/user_profile">My Dashboard</a>
            </li>
           <li class="menu-item ">
            <a href="/stlogout">Logout</a>
         </li>
           
           @else
           <li class="menu-item ">
            <a href="{{route('login.form')}}">Login</a>
          </li>
         <li class="menu-item ">
          <a href="{{route('register.form')}}">Register</a> 
       </li>
        @endif
         <li class="menu-item ">
    <a  href="/certificate">Verify Certificate</a>
                  </li> 
         </ul>
              </div>
            </div>
            <ul class="sigma_sm">
             <li class="d-flex align-items-center" >
                <a href="#" style="color: black" class="live">
                  <i class="fa fa-circle"></i>
                  Live
                </a>
              </li>
              <li> <a href="#"> <i style="color: black" class="fab fa-facebook-f"></i> </a> </li>
              <li> <a href="#"> <i style="color: black" class="fab fa-twitter"></i> </a> </li>
              <li> <a href="#"> <i style="color: black" class="fab fa-instagram"></i> </a> </li>
            </ul>
          </div>
        </div>
      </div>
      <!-- Top Header End -->
  
      <!-- Middle Header Start -->
      <div class="sigma_header-middle">
        <div class="container-fluid">
          <nav class="navbar">
  
            <!-- Logo Start -->
            <div class="sigma_logo-wrapper">
              <a class="navbar-brand" href="/">
                <img src="../../Mytemplate/assets/img/logo-wide.png" alt="logo">
              </a>
            </div>
            <!-- Logo End -->
  
            <!-- Menu -->
            <ul class="navbar-nav">
                <li class="menu-item">
                  <a href="/">Home</a>
                  
                </li>
                <li class="menu-item"> <a href="/about">About</a> </li>
                 <li class="menu-item menu-item-has-children">

                  <a href="javascript:void(0)">Hinduism</a>
                  <ul class="dropdown hindi sub-menu">
                  
                 </ul>
                   </li>
                <li class="menu-item menu-item-has-children">

                  <a href="javascript:void(0)">Stories</a>
                  <ul class="dropdown story sub-menu">
                  
                 </ul>
                   </li>
                   <li class="menu-item menu-item-has-children">

                    <a href="javascript:void(0)">Temples</a>
                    <ul class="dropdown temple sub-menu">
                    
                   </ul>
                     </li>
            
                <li class="menu-item menu-item-has-children">

               <a href="javascript:void(0)">Media Center</a>
               <ul class="dropdown media sub-menu">
               
              </ul>
                </li>

                
            
                
                <li class="menu-item menu-item-has-children">

                  <a href="javascript:void(0)">Courses</a>
                  <ul class="dropdown catid sub-menu">
                  
                 </ul>
                   </li>

                     <li class="menu-item menu-item-has-children">

                  <a href="#home">Events</a>
                  <ul class="dropdown event sub-menu">
                  
                 </ul>
                   </li>
              
              
               
                <li class="menu-item"><a href="/testyourskill">Test Your Skills</a></li>
  
               
              </ul>
  
            <!-- Controls -->
          
     <!-- Controls -->
     <div class="sigma_header-controls style-2">

      <ul class="sigma_header-controls-inner">
      
        <!-- Mobile Toggler -->
        <li class="aside-toggler style-2 aside-trigger-left">
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
        </li>
      </ul>

    </div>

  </nav>
</div>
</div>
          </nav>
        </div>
      </div>
      <!-- Middle Header End -->
  
    </header>
    <!-- partial -->
  <!-- Start main-content -->
    @yield("usercontent")
  <!-- end main-content -->


  {{-- <!-- Footer -->
  <footer id="footer" class="footer bg-black-222" data-bg-img="../../Mytemplate/images/footer-bg.png">
    <div class="container pt-70 pb-40">
      <div class="row">
        <div class="col-sm-6 col-md-3">
          <div class="widget dark">
            <img class="mt-10 mb-15" alt="" src="../../Mytemplate/images/logo-white-footer.png">
            <p class="font-16 mb-10">GreenPeace is a library of Crowdfunding and Charity templates with predefined elements which helps you to build your own site. Lorem ipsum dolor sit amet consectetur.</p>
            <a class="font-14" href="#"><i class="fa fa-angle-double-right text-theme-colored"></i> Read more</a>
            <ul class="styled-icons icon-dark mt-20">
              <li class="wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".1s" data-wow-offset="10"><a href="#" data-bg-color="#3B5998"><i class="fa fa-facebook"></i></a></li>
              <li class="wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".2s" data-wow-offset="10"><a href="#" data-bg-color="#02B0E8"><i class="fa fa-twitter"></i></a></li>
              <li class="wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".3s" data-wow-offset="10"><a href="#" data-bg-color="#05A7E3"><i class="fa fa-skype"></i></a></li>
              <li class="wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".4s" data-wow-offset="10"><a href="#" data-bg-color="#A11312"><i class="fa fa-google-plus"></i></a></li>
              <li class="wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".5s" data-wow-offset="10"><a href="#" data-bg-color="#C22E2A"><i class="fa fa-youtube"></i></a></li>
            </ul>
          </div>
        </div>
        <div class="col-sm-6 col-md-3">
          <div class="widget dark">
            <h5 class="widget-title line-bottom">Useful Links</h5>
            <ul class="list angle-double-right list-border">
             
              <li><a href="/allhinduism">Hinduism</a></li>
              <li><a href="/alluserstory">Kids Stories</a></li>
              <li><a href="/alltemple">Temples</a></li>
              <li><a href="/allusercol">Collaborations</a></li>
              <li><a href="/mantra">Mantra</a></li>
              <li><a href="/alluarticle">Articles</a></li>       
              <li><a href="/sindhitipno">Sindhi Tipno</a></li>
              <li><a href="/contact">Contact us</a></li>
            </ul>
          </div>
        </div>
        <div class="col-sm-6 col-md-3">
          <div class="widget dark">
            <h5 class="widget-title line-bottom">Connect Links</h5>
            <ul class="list angle-double-right list-border">
              <li><a href="/">Home</a></li>
              <li><a href="/about">About Us</a></li>
              <li><a href="/alluserevent">Events</a></li>
              <li><a href="/allusermedia">Media Center</a></li>
              <li><a href="/alllibrary">Library</a></li>
              <li><a href="/allkatha">Katha</a></li>

                            <li><a href="/alluseran">Annoucement</a></li>
              <li><a href="/jobclassified">Job Classified</a></li>
         
            </ul>
          </div>
        </div>
        <div class="col-sm-6 col-md-3">
          <div class="widget dark">
            <h5 class="widget-title line-bottom">Quick Contact</h5>
            <ul class="list-border">
              <li><a href="#">+(012) 345 6789</a></li>
              <li><a href="#">hello@yourdomain.com</a></li>
              <li><a href="#" class="lineheight-20">121 King Street, Melbourne Victoria 3000, Australia</a></li>
            </ul>
            <p class="font-16 text-white mb-5 mt-15">Subscribe to our newsletter</p>
            <form id="footer-mailchimp-subscription-form" class="newsletter-form mt-10">
              <label class="display-block" for="mce-EMAIL"></label>
              <div class="input-group">
                <input type="email" value="" name="EMAIL" placeholder="Your Email"  class="form-control" data-height="37px" id="mce-EMAIL">
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-colored btn-theme-colored m-0"><i class="fa fa-paper-plane-o text-white"></i></button>
                </span>
              </div>
            </form>


          </div>
        </div>
      </div>
    </div>
    <div class="footer-bottom bg-black-333">
      <div class="container pt-20 pb-20">
        <div class="row">
          <div class="col-md-6">
            <p class="font-11 text-black-777 m-0">© 2023 All Rights Reserved & Developed By<a target="_blank" href="https://growdigitalcare.com/"> Grow Digital Care</a></p>
          </div>
          <div class="col-md-6 text-right">
            <div class="widget no-border m-0">
              <ul class="list-inline sm-text-center mt-5 font-12">
               
                <li>
                  <a href="/terms">Terms & Condition</a>
                </li>
                <li>|</li>
                <li>
                  <a href="/privacy">Privacy Policy</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <div id="WAButton" style="position:fixed; bottom:-30px; margin-left:30px;">
    <a href="https://wa.me/923352115333" target="_blank"><img src="/whatsapp2.png" width="150px" class="whatsapp_float_btn" /></a>
</div>

  <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
</div>
<!-- end wrapper -->

<!-- Footer Scripts -->
<!-- JS | Custom script for all pages -->
<script src="../../Mytemplate/js/custom.js"></script>

<!-- SLIDER REVOLUTION 5.0 EXTENSIONS
      (Load Extensions only on Local File Systems !
       The following part can be removed on Server for On Demand Loading) -->
<script type="text/javascript" src="../../Mytemplate/js/revolution-slider/js/extensions/revolution.extension.actions.min.js"></script>
<script type="text/javascript" src="../../Mytemplate/js/revolution-slider/js/extensions/revolution.extension.carousel.min.js"></script>
<script type="text/javascript" src="../../Mytemplate/js/revolution-slider/js/extensions/revolution.extension.kenburn.min.js"></script>
<script type="text/javascript" src="../../Mytemplate/js/revolution-slider/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script type="text/javascript" src="../../Mytemplate/js/revolution-slider/js/extensions/revolution.extension.migration.min.js"></script>
<script type="text/javascript" src="../../Mytemplate/js/revolution-slider/js/extensions/revolution.extension.navigation.min.js"></script>
<script type="text/javascript" src="../../Mytemplate/js/revolution-slider/js/extensions/revolution.extension.parallax.min.js"></script>
<script type="text/javascript" src="../../Mytemplate/js/revolution-slider/js/extensions/revolution.extension.slideanims.min.js"></script>
<script type="text/javascript" src="../../Mytemplate/js/revolution-slider/js/extensions/revolution.extension.video.min.js"></script> --}}

  <!-- partial:partia/__footer.html -->
  <footer class="sigma_footer footer-2 sigma_footer-dark">

    <!-- Middle Footer -->
    <div class="sigma_footer-middle">
      <div class="container">
        <div class="row">
          <div class="col-xl-3 col-lg-4 col-md-4 col-sm-12 footer-widget">
            <h5 class="widget-title">About Us</h5>
            <p class="mb-4">You need to be sure there isn’t anything embarrassing hidden in the middle of text. </p>
            <div class="d-flex align-items-center justify-content-md-start justify-content-center">
              <i class="far fa-phone custom-primary me-3"></i>
              <span>987-987-930-302</span>
            </div>
            <div class="d-flex align-items-center justify-content-md-start justify-content-center mt-2">
              <i class="far fa-envelope custom-primary me-3"></i>
              <span>info@example.com</span>
            </div>
            <div class="d-flex align-items-center justify-content-md-start justify-content-center mt-2">
              <i class="far fa-map-marker custom-primary me-3"></i>
              <span>14/A, Poor Street City Tower, New York USA</span>
            </div>
          </div>
          <div class="col-xl-3 col-lg-2 col-md-4 col-sm-12 footer-widget">
            <h5 class="widget-title">Information</h5>
            <ul>
              <li><a href="/allhinduism">Hinduism</a></li>
              <li><a href="/alluserstory">Kids Stories</a></li>
              <li><a href="/alltemple">Temples</a></li>
              <li><a href="/allcollaboration">Collaborations</a></li>
              <li><a href="/mantra">Mantra</a></li>
               <li>
                  <a href="/terms">Terms & Condition</a>
                </li>
              
               
              
            </ul>
          </div>
          <div class="col-xl-3 col-lg-2 col-md-4 col-sm-12 footer-widget">
            <h5 class="widget-title">Services</h5>
            <ul>
              <li><a href="/">Home</a></li>
              <li><a href="/about">About Us</a></li>
              <li><a href="/alluserevent">Events</a></li>
              <li><a href="/mediacenter">Media Center</a></li>
              <li><a href="/alllibrary">Library</a></li>
               <li>
                  <a href="/privacy">Privacy Policy</a>
                </li>
             
            </ul>
          </div>
          <div class="col-xl-3 col-lg-2 col-md-4 col-sm-12 footer-widget">
            <h5 class="widget-title">Others</h5>
            <ul>
              <li><a href="/allarticle">Articles</a></li>       
              <li><a href="/sindhitipno">Sindhi Tipno</a></li>
              <li><a href="/contact">Contact us</a></li>

              <li><a href="/alluseran">Annoucement</a></li>
             <li><a href="/jobclassified">Job Classified</a></li>
             <li><a href="/allkatha">Katha</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <!-- Footer Bottom -->
    <div class="sigma_footer-bottom">
      <div class="container-fluid">
        <div class="sigma_footer-copyright">
          <div id="WAButton" style="position:fixed; bottom:-30px; margin-left:-50px;">
            <a href="https://wa.me/923352115333" target="_blank"><img src="/whatsapp2.png" width="150px" class="whatsapp_float_btn" /></a>
        </div>
          <p> Copyright © HariOm Simran - <a href="#" class="text-white">2023</a> | Designed   <br> and Developed By <a class="text-white" href="https://growdigitalcare.com/">Grow Digital Care</a> </p>
        </div>
        <div class="sigma_footer-logo">
          <img src="../../Mytemplate/assets/img/logo-white-footer.png" alt="logo">
        </div>
        <ul class="sigma_sm square">
          <li>
            <a href="#">
              <i class="fab fa-facebook-f"></i>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="fab fa-linkedin-in"></i>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="fab fa-twitter"></i>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="fab fa-youtube"></i>
            </a>
          </li>
        </ul>
      </div>
    </div>

  </footer>
  <!-- partial -->

  <!-- partial:partia/__scripts.html -->
  <script src="../../Mytemplate/assets/js/plugins/jquery-3.4.1.min.js"></script>
  <script src="../../Mytemplate/assets/js/plugins/popper.min.js"></script>
  <script src="../../Mytemplate/assets/js/plugins/bootstrap.min.js"></script>
  <script src="../../Mytemplate/assets/js/plugins/imagesloaded.min.js"></script>
  <script src="../../Mytemplate/assets/js/plugins/jquery.magnific-popup.min.js"></script>
  <script src="../../Mytemplate/assets/js/plugins/jquery.countdown.min.js"></script>
  <script src="../../Mytemplate/assets/js/plugins/jquery.waypoints.min.js"></script>
  <script src="../../Mytemplate/assets/js/plugins/jquery.counterup.min.js"></script>
  <script src="../../Mytemplate/assets/js/plugins/jquery.zoom.min.js"></script>
  <script src="../../Mytemplate/assets/js/plugins/jquery.inview.min.js"></script>
  <script src="../../Mytemplate/assets/js/plugins/jquery.event.move.js"></script>
  <script src="../../Mytemplate/assets/js/plugins/wow.min.js"></script>
  <script src="../../Mytemplate/assets/js/plugins/isotope.pkgd.min.js"></script>
  <script src="../../Mytemplate/assets/js/plugins/slick.min.js"></script>
  <script src="../../Mytemplate/assets/js/plugins/ion.rangeSlider.min.js"></script>

  <script src="../../Mytemplate/assets/js/main.js"></script>
  <!-- partial -->

</body>


<!-- Mirrored from metropolitanhost.com/themes/themeforest/html/maharatri/home-v3.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 11 Oct 2023 10:55:58 GMT -->
</html>
<!-- navbar jquery -->

{{-- //toastr --}}

<script>
  @if (Session::has('message'))
      toastr.options = {
          "closeButton": true,
          "progressBar": true
      }
      toastr.success("{{ session('message') }}");
  @endif

  @if (Session::has('error'))
      toastr.options = {
          "closeButton": true,
          "progressBar": true
      }
      toastr.error("{{ session('error') }}");
  @endif

  @if (Session::has('info'))
      toastr.options = {
          "closeButton": true,
          "progressBar": true
      }
      toastr.info("{{ session('info') }}");
  @endif

  @if (Session::has('warning'))
      toastr.options = {
          "closeButton": true,
          "progressBar": true
      }
      toastr.warning("{{ session('warning') }}");
  @endif
</script>
{{-- end toaster --}}

<script>
              $(document).ready(function () {
                var html = "";
                var htmlmob = "";

                $.ajax({
                    url: "/Navbar",
                    type: 'GET',
                    dataType: 'json',
                    success: function (res) {
                        for (var i = 0; i < res.data.length; i++) {
                            html += `<li>
                                                    <a onclick="categorylist(this)" style="cursor:pointer"  onmouseover="categorylist1(this)" data-id="${res.data[i]['id']}" class="site-nav">${res.data[i]['title']}</a>
                                                    <ul  class="categorylist${res.data[i]['id']} catlist dropdown" style="display:none">
                                                    </ul>
                                                    </li> `;

                        }
                        console.log(html);
                        $(".catid").append(html);


                    }
                });
            });

            function categorylist1(e) {
               var html = "";
                var htmlmob = "";
                var id=e.getAttribute('data-id');
                $(".categorylist" +id).css("display", "none");
                $(".categorylist" +id).empty();
                console.log(id);

            }
            function categorylist(e) {
                $(".categorylist" +id).hide();
                var html = "";
                var htmlmob = "";
                var id=e.getAttribute('data-id');
                $(".categorylist" +id).empty();
                $(".catlist").empty();
                console.log(id);

                $.ajax({

                    url: "/categorylist",
                    data:"id="+id+
                    '&_token={{csrf_token()}}',
                    type: 'POST',
                    dataType: 'json',
                    success: function (res) {
                        for (var i = 0; i < res.show.length; i++) {
                            html = `<li>
                                                    <a href="/subcourse/${res.show[i]['Title']}/${res.show[i]['id']}" class="site-nav">${res.show[i]['Title']}</a>
                                                   </li>`;

                          $(".categorylist" +id).css("display", "block");
                            $(".categorylist" +id).append(html);

                               }


                    }
                });
            }

//  event
$(document).ready(function () {
                var html = "";
                var htmlmob = "";

                $.ajax({
                    url: "/eventcat",
                    type: 'GET',
                    dataType: 'json',
                    success: function (res) {
                        for (var i = 0; i < res.data1.length; i++) {
                            html += `<li>
                                                    <a href="/userevent/${res.data1[i]['title']}/${res.data1[i]['id']}" style="cursor:pointer" data-id="${res.data1[i]['id']}" class="site-nav">${res.data1[i]['title']}</a>
                                                    </li> `;

                        }
                        console.log(html);
                        $(".event").append(html);


                    }
                });
            });


//  media
$(document).ready(function () {
                var html = "";
                var htmlmob = "";

                $.ajax({
                    url: "/mediacat",
                    type: 'GET',
                    dataType: 'json',
                    success: function (res) {
                        for (var i = 0; i < res.datam.length; i++) {
                            html += `<li>
                                                    <a href="/usermedia/${res.datam[i]['title']}/${res.datam[i]['id']}" style="cursor:pointer" data-id="${res.datam[i]['id']}" class="site-nav">${res.datam[i]['title']}</a>
                                                    </li> `;

                        }
                        console.log(html);
                        $(".media").append(html);


                    }
                });
            });


//  article
$(document).ready(function () {
                var html = "";
                var htmlmob = "";

                $.ajax({
                    url: "/artcat",
                    type: 'GET',
                    dataType: 'json',
                    success: function (res) {
                        for (var i = 0; i < res.dataa.length; i++) {
                            html += `<li>
                                                    <a href="/userrart/${res.dataa[i]['title']}/${res.dataa[i]['id']}" style="cursor:pointer" data-id="${res.dataa[i]['id']}" class="site-nav">${res.dataa[i]['title']}</a>
                                                    </li> `;

                        }
                        console.log(html);
                        $(".art").append(html);


                    }
                });
            });


//  collaboration
$(document).ready(function () {
                var html = "";
                var htmlmob = "";

                $.ajax({
                    url: "/collabcat",
                    type: 'GET',
                    dataType: 'json',
                    success: function (res) {
                        for (var i = 0; i < res.datac.length; i++) {
                            html += `<li>
                                                    <a href="/usercol/${res.datac[i]['title']}/${res.datac[i]['id']}" style="cursor:pointer" data-id="${res.datac[i]['id']}" class="site-nav">${res.datac[i]['title']}</a>
                                                    </li> `;

                        }
                        console.log(html);
                        $(".collab").append(html);


                    }
                });
            });

      //  story
      $(document).ready(function () {
                var html = "";
                var htmlmob = "";

                $.ajax({
                    url: "/storycat",
                    type: 'GET',
                    dataType: 'json',
                    success: function (res) {
                        for (var i = 0; i < res.datas.length; i++) {
                            html += `<li>
                                                    <a href="/userstory/${res.datas[i]['title']}/${res.datas[i]['id']}" style="cursor:pointer" data-id="${res.datas[i]['id']}" class="site-nav">${res.datas[i]['title']}</a>
                                                    </li> `;

                        }
                        console.log(html);
                        $(".story").append(html);


                    }
                });
            });


            //  hindu
      $(document).ready(function () {
                var html = "";
                var htmlmob = "";

                $.ajax({
                    url: "/hindicat",
                    type: 'GET',
                    dataType: 'json',
                    success: function (res) {
                        for (var i = 0; i < res.datas.length; i++) {
                            html += `<li>
                                                    <a href="/hinduism/${res.datas[i]['slug']}" style="cursor:pointer" data-id="${res.datas[i]['id']}" class="site-nav">${res.datas[i]['title']}</a>
                                                    </li> `;

                        }
                        console.log(html);
                        $(".hindi").append(html);


                    }
                });
            });


             //  temples
      $(document).ready(function () {
                var html = "";
                var htmlmob = "";

                $.ajax({
                    url: "/temcat",
                    type: 'GET',
                    dataType: 'json',
                    success: function (res) {
                        for (var i = 0; i < res.datas.length; i++) {
                            html += `<li>
                                                    <a href="/temple/${res.datas[i]['title']}/${res.datas[i]['id']}" style="cursor:pointer" data-id="${res.datas[i]['id']}" class="site-nav">${res.datas[i]['title']}</a>
                                                    </li> `;

                        }
                        console.log(html);
                        $(".temple").append(html);


                    }
                });
            });
</script>
</body>

<!-- index-mp-layout209:18-->
</html>
