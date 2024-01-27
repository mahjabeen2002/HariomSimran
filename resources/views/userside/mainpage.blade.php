@extends('userside.layout')
@section('title')

    <head>
        <title>Discover Hinduism's Essence: Hari Om Simran - Your Spiritual Odyssey!</title>
        <meta name="description"
            content="Discover Hinduism's essence: Divine knowledge, Gods, culture, and more. Embark on a spiritual odyssey with Hari Om Simran." />
        <meta name="keywords"
            content="Hari Om Simran, Hindu Sanatana Dharma,Hindu religious website,Hindu Gods and Goddesses,Hindu religious scriptures,Hindu culture and traditions,Hindu Devi Devta,Hindu religious temples,Hindu religious knowledge,Hindu spiritual wisdom,Hindu religious practices,Sacred Hindu Mantras,Hindu mythology,Hindu festivals and rituals,Hinduism resourcesSpiritual journey, Lord Krishna, Lord Shiva, Lord Ganesha" />
    </head>
@endsection
@section('usercontent')
    <style>
        .showm {
            margin-top: 100px;
        }

        .showm1 {
            margin-top: 70px;
        }

        .image-cropper {
            width: 100px;
            height: 100px;
            position: relative;
            overflow: hidden;
            border-radius: 50%;
        }

        .profile-pic {
            display: inline;
            margin: 0 auto;
            margin-left: -25%; //centers the image
            height: 100%;
            width: auto;
        }
    </style>

    <!-- Banner Start -->
    <div class="sigma_banner banner-1 bg-cover light-overlay bg-center bg-norepeat"
        style="background-image: url(Mytemplate/assets/img/banner/9.jpg)">

        <div class="sigma_banner-slider">

            <!-- Banner Item Start -->
            <div class="sigma_banner-slider-inner">
                <div class="sigma_banner-text">
                    <div class="container position-relative">
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                <div class="sigma_box primary-bg banner-cta">
                                    <h1 class="text-white title">Mere Ganpati Guru Ganesh Ji Tusi Aa Jao.</h1>
                                    <p class="blockquote light light-border mb-0"> We are a Hindu that belives in Lord Rama
                                        and Vishnu Deva the followers and We are a Hindu that belives in Lord Rama and
                                        Vishnu Deva.</p>
                                    <div class="section-button d-flex align-items-center">
                                        <a href="/contact" class="sigma_btn-custom secondary">Join Today <i
                                                class="far fa-arrow-right"></i> </a>
                                        <a href="/about" class="ms-3 sigma_btn-custom light text-white">About Us <i
                                                class="far fa-arrow-right"></i> </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <img class="d-none d-lg-block" src="Mytemplate/assets/img/banner/png/4.png" alt="png">
                    </div>
                </div>
            </div>
            <!-- Banner Item End -->

            <!-- Banner Item Start -->
            <div class="sigma_banner-slider-inner">
                <div class="sigma_banner-text">
                    <div class="container position-relative">
                        <div class="row align-items-center">
                            <div class="offset-lg-6 col-lg-6">
                                <div class="sigma_box primary-bg banner-cta">
                                    <h1 class="text-white title">Welcome to Religion of the Hinduism</h1>
                                    <p class="blockquote light light-border mb-0"> We are a Hindu that belives in Lord Rama
                                        and Vishnu Deva the followers and We are a Hindu that belives in Lord Rama and
                                        Vishnu Deva.</p>
                                    <div class="section-button d-flex align-items-center">
                                        <a href="/contact" class="sigma_btn-custom secondary">Join Today <i
                                                class="far fa-arrow-right"></i> </a>
                                        <a href="/about" class="ms-3 sigma_btn-custom light text-white">About Us <i
                                                class="far fa-arrow-right"></i> </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <img class="left d-none d-lg-block" src="Mytemplate/assets/img/banner/png/5.png" alt="png">
                    </div>
                </div>
            </div>
            <!-- Banner Item End -->

        </div>

    </div>
    <!-- Banner End -->

    <br><br>
    <!-- Section: Sevices -->

    <!-- holi Start -->
    {{-- <div class="section-padding">
        <div class="container" style="border-color: green;border-style: solid">

            <div class="row">

                @foreach ($fetch as $f)
                    <div class="col-lg-4 col-md-6">
                        <a href="/hariomsimran/{{ $f->title }}/{{ $f->id }}"
                            class="sigma_service border text-center style-1 primary-bg">
                            <div class="sigma_service-thumb">
                                <img src="/cartimages/{{ $f->image }}" style="border-radius: 50%;height: 127px"
                                    alt="">
                                <span></span>
                                <span></span>
                            </div>
                            <div class="sigma_service-body">
                                <?php
                                $f1 = strip_tags($f->title);
                                $f3 = Str::limit($f1, 20);
                                
                                ?>
                                <h5 class="text-white">{{ $f3 }}</h5>

                                <?php
                                $f1 = strip_tags($f->des);
                                $f2 = Str::limit($f1, 50);
                                
                                ?><p class="text-white">{{ $f2 }} </p>
                            </div>
                        </a>
                    </div>
                @endforeach


            </div>

        </div>
    </div> --}}
    <!-- holi End -->
    <br><br>
    <!-- About Start -->
    <section class="section pt-0">
        <div class="container">

            <div class="row">
                <div class="col-lg-5 d-none d-lg-block">
                    <div class="sigma_counter bg-cover primary-overlay bg-norepeat bg-center"
                        style="background-image: url(Mytemplate/assets/img/counter.jpg)">
                        <h4> <b class="counter" data-from="0" data-to="25">25</b> <span>+</span> </h4>
                        <p>Join Temple</p>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="me-lg-30">
                        <div class="section-title mb-0 text-start">
                            <p class="subtitle">Education for all rural children</p>
                            <h4 class="title">We Are A Hindu That Believes In Rama.</h4>
                        </div>
                        <p class="blockquote bg-transparent"> We are a Hindu that belives in Lord Rama and Vishnu Deva the
                            followers and We are a Hindu that belives in Lord Rama and Vishnu Deva. </p>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="sigma_icon-block icon-block-3">
                                    <div class="icon-wrapper">
                                        <i class="flaticon-temple"></i>
                                    </div>
                                    <div class="sigma_icon-block-content">
                                        <h5> Temple </h5>
                                        <p>Donation is a good act amet quam vehicula elementum sed.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="sigma_icon-block icon-block-3">
                                    <div class="icon-wrapper">
                                        <i class="flaticon-powder-1"></i>
                                    </div>
                                    <div class="sigma_icon-block-content">
                                        <h5> Donation </h5>
                                        <p>Donation is a good act amet quam vehicula elementum sed.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="/about" class="sigma_btn-custom light">Learn More <i class="far fa-arrow-right"></i> </a>
                    </div>
                </div>
            </div>


        </div>
    </section>
    <!-- About End -->
    <div class="section pt-0">
        <div class="container">

            <div class="row position-relative">
                <div class="col-lg-7 col-md-6">
                    <div class="sigma_cta lg primary-bg">
                        <img class="d-none d-lg-block" src="Mytemplate/assets/img/cta/3.png" alt="cta">
                        <div class="sigma_cta-content">
                            <span class="fw-600 custom-secondary">Need Help, Call Our HOTLINE!</span>
                            <h4 class="text-white">+1 212-683-9756</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6 position-relative">
                    <div class="sigma_cta sm primary-bg">
                        <span class="sigma_cta-sperator d-none d-lg-flex">or</span>
                        <div class="sigma_cta-content">
                            <form method="post">
                                <label class="mb-0 text-white">Temple Newsletter</label>
                                <div class="sigma_search-adv-input">
                                    <input type="text" class="form-control" placeholder="Enter email address"
                                        name="search" value="">
                                    <button type="submit" name="button"><i class="far fa-envelope"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <br><br>
    <!-- Portfolio Start -->
    <div class="section-padding bg-cover portfolio-section">
        <div class="container">

            <div class="section-title section-title-2 flex-title">
                <div>
                    <p class="subtitle">Hinduism</p>
                    <h4 class="title">We are a Hindu that believe in Ram</h4>

                </div>
                <div class="sigma_arrows">
                    <i class="far fa-chevron-left slick-arrow slider-prev" style="color: #ffffff"></i>
                    <i class="far fa-chevron-right slick-arrow slider-next" style="color: #ffffff"></i>
                </div>
            </div>

            <div class="portfolio-slider">
                @foreach ($hinduism as $fh)
                    <div class="sigma_portfolio-item style-3">
                        <img src="{{ asset('/uploads/hinduism/'.$fh->image) }}" style="height: 350px;width: 100%" alt="portfolio">
                        <div class="sigma_portfolio-item-content" style="background-color: rgb(211, 202, 202)">
                            <div class="sigma_portfolio-item-content-inner">
                                <a href="/hinduismdetail/{{ $fh->slug }}">{{ $fh->title }}</a>
                                <h5> <a href="/hinduismdetail/{{ $fh->slug }}">
                                        <?php
                                        $f1 = strip_tags($fh->description);
                                        $f2 = Str::limit($f1, 50);
                                        
                                        ?>
                                        {{ $f2 }} </a> </h5>
                            </div>
                            <a href="/hinduismdetail/{{ $fh->slug }}"><i
                                    class="far fa-arrow-right"></i></a>
                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </div>
    <!-- Portfolio End -->
    <br><br><br><br>
    <!-- testyourskill Start -->
    <section class="section pt-0">

        <div class="container testimonial-section bg-contain bg-norepeat bg-center"
            style="background-image: url(Mytemplate/assets/img/textures/map-2.png)">

            <div class="section-title text-center">
                <p class="subtitle">Test Your Skill</p>
                <h4 class="title">Start Test These Categories</h4>
            </div>

            <div class="sigma_testimonial style-2">
                <div class="sigma_testimonial-slider row">


                    @foreach ($department as $test)
                        <div class="col-lg-4">
                           
                                <a href="{{ route('department_subjects', ['slug' => $test->slug]) }}"
                                    class="sigma_btn-custom section-button" style="width:85%">{{ $test->depart_name }}</a>
                           
                        </div>
                    @endforeach

                </div>
            </div>

        </div>
        </div>



        </div>
    </section>
    <!-- testyourskill End -->
    

    <br><br>
    <!-- Section: Online  Learning Start-->
    <div class="section-padding bg-cover portfolio-section">
        <div class="container">

            <div class="section-title section-title-2 flex-title">
                <div>
                    <p class="subtitle">Online Learning</p>
                    <h4 class="title">We are a Hindu that believe in Ram</h4>

                </div>
                <div class="sigma_arrows">
                    <i class="far fa-chevron-left slick-arrow slider-prev" style="color: #ffffff"></i>
                    <i class="far fa-chevron-right slick-arrow slider-next" style="color: #ffffff"></i>
                </div>
            </div>

            <div class="portfolio-slider">
                @foreach ($course as $fc)
                    <div class="sigma_portfolio-item style-3">
                        <img src="{{ asset('/uploads/coursecategory/'.$fc->image) }}" 
                        style="height: 350px;width: 100%" alt="{{$fc->name}}">
                        <div class="sigma_portfolio-item-content" style="background-color: rgb(211, 202, 202)">
                            <div class="sigma_portfolio-item-content-inner">
                                <a href="#">{{ $fc->name }}</a>
                                <h5> <a href="/all_courses">
                                    </a> </h5>
                            </div>
                            <a href="/all_courses"><i
                                    class="far fa-arrow-right"></i></a>
                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </div>


  
    <br><br><br><br>
    <!-- Portfolio Start -->
    <div class="section-padding bg-cover portfolio-section">
        <div class="container">

            <div class="section-title section-title-2 flex-title">
                <div>
                    <p class="subtitle">Katha</p>
                    <h4 class="title">We are a Hindu that believe in Ram</h4>

                </div>
                <div class="sigma_arrows">
                    <i class="far fa-chevron-left slick-arrow slider-prev" style="color: #ffffff"></i>
                    <i class="far fa-chevron-right slick-arrow slider-next" style="color: #ffffff"></i>
                </div>
            </div>

            <div class="portfolio-slider">
                @foreach ($katha as $fh)
                    <div class="sigma_portfolio-item style-3">
                        <img src="{{ asset('/uploads/katha/'.$fh->image) }}" style="height: 350px;width: 100%" alt="portfolio">
                        <div class="sigma_portfolio-item-content" style="background-color: rgb(211, 202, 202)">
                            <div class="sigma_portfolio-item-content-inner">
                                <a href="#">{{ $fh->title }}</a>
                                <h5> <a href="/detailkatha/{{ $fh->slug }}">
                                        <?php
                                        $f1 = strip_tags($fh->description);
                                        $f2 = Str::limit($f1, 50);
                                        
                                        ?>
                                        {{ $f2 }} </a> </h5>
                            </div>
                            <a href="/detailkatha/{{ $fh->slug }}"><i
                                    class="far fa-arrow-right"></i></a>
                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </div>

  

    <br><br><br><br>
    <!-- stories Start -->
    {{-- <div class="section-padding bg-cover portfolio-section">
        <div class="container">

            <div class="section-title section-title-2 flex-title">
                <div>
                    <p class="subtitle">RELIGIOUS STORIES</p>
                    <h4 class="title">We are a Hindu that believe in Ram</h4>

                </div>
                <div class="sigma_arrows">
                    <i class="far fa-chevron-left slick-arrow slider-prev" style="color: #ffffff"></i>
                    <i class="far fa-chevron-right slick-arrow slider-next" style="color: #ffffff"></i>
                </div>
            </div>

            <div class="portfolio-slider">
                @foreach ($fetchst as $fs)
                    <div class="sigma_portfolio-item style-3">
                        <img src="/storyimages/{{ $fs->image }}" style="height: 350px;width: 100%" alt="portfolio">
                        <div class="sigma_portfolio-item-content" style="background-color: rgb(211, 202, 202)">
                            <div class="sigma_portfolio-item-content-inner">
                                <a href="#">{{ $fs->Title }}</a>
                                <h5> <a href="userstorydetail/{{ $fs->Title }}/{{ $fs->id }}">
                                        <?php
                                        $f1 = strip_tags($fs->description);
                                        $f2 = Str::limit($f1, 50);
                                        
                                        ?>
                                        {{ $f2 }} </a> </h5>
                            </div>
                            <a href="userstorydetail/{{ $fs->Title }}/{{ $fs->id }}"><i
                                    class="far fa-arrow-right"></i></a>
                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </div> --}}
   

    <br><br><br><br>
    <!-- Portfolio Start -->
    <div class="section-padding bg-cover portfolio-section">
        <div class="container">

            <div class="section-title section-title-2 flex-title">
                <div>
                    <p class="subtitle">Temple history</p>
                    <h4 class="title">We are a Hindu that believe in Ram</h4>

                </div>
                <div class="sigma_arrows">
                    <i class="far fa-chevron-left slick-arrow slider-prev" style="color: #ffffff"></i>
                    <i class="far fa-chevron-right slick-arrow slider-next" style="color: #ffffff"></i>
                </div>
            </div>

            <div class="portfolio-slider">
                @foreach ($templehistory as $ft)
                    <div class="sigma_portfolio-item style-3">
                        <img src="{{ asset('/uploads/templehistory/'.$ft->image) }}" style="height: 350px;width: 100%" alt="{{$ft->title}}">
                        <div class="sigma_portfolio-item-content" style="background-color: rgb(211, 202, 202)">
                            <div class="sigma_portfolio-item-content-inner">
                                <a href="#">{{ $ft->title }}</a>
                                <h5> <a href="/templedetail/{{ $ft->slug }}">
                                        <?php
                                        $f1 = strip_tags($ft->description);
                                        $f2 = Str::limit($f1, 50);
                                        
                                        ?>
                                        {{ $f2 }} </a> </h5>
                            </div>
                            <a href="/templedetail/{{ $ft->slug }}"><i
                                    class="far fa-arrow-right"></i></a>
                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </div>

 



    <br><br><br><br>


    <!-- Portfolio Start -->
    <div class="section-padding bg-cover portfolio-section">
        <div class="container">

            <div class="section-title section-title-2 flex-title">
                <div>
                    <p class="subtitle">Religious Articles</p>
                    <h4 class="title">We are a Hindu that believe in Ram</h4>

                </div>
                <div class="sigma_arrows">
                    <i class="far fa-chevron-left slick-arrow slider-prev" style="color: #ffffff"></i>
                    <i class="far fa-chevron-right slick-arrow slider-next" style="color: #ffffff"></i>
                </div>
            </div>

            <div class="portfolio-slider">
                @foreach ($article as $fa)
                    <div class="sigma_portfolio-item style-3">
                        <img src="{{ asset('/uploads/article/'.$fa->image) }}" style="height: 350px;width: 100%" alt="{{ $fa->title }}">
                        <div class="sigma_portfolio-item-content" style="background-color: rgb(211, 202, 202)">
                            <div class="sigma_portfolio-item-content-inner">
                                <a href="#">{{ $fa->title }}</a>
                                <h5> <a href="userarticledetail/{{ $fa->slug }}">
                                        <?php
                                        $f1 = strip_tags($fa->description);
                                        $f2 = Str::limit($f1, 50);
                                        
                                        ?>
                                        {{ $f2 }} </a> </h5>
                            </div>
                            <a href="/userarticledetail/{{ $fa->slug }}"><i
                                    class="far fa-arrow-right"></i></a>
                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </div>


  
    <br><br><br>
    <section class="section pt-0">

        <div class="container testimonial-section bg-contain bg-norepeat bg-center"
            style="background-image: url(assets/img/textures/map-2.png)">

            <div class="section-title text-center">
                <p class="subtitle">Our Library</p>
                <h4 class="title">Lorem Ipsum Library</h4>
            </div>

            <div class="sigma_testimonial style-2">
                <div class="sigma_testimonial-slider row">

                    @foreach ($librarycategory as $c)
                        <a href="/library/{{ $c->slug }}"
                            class="sigma_btn-custom section-button" style="width:85%">{{ $c->title }}</a>
                    @endforeach


                </div>
            </div>

        </div>
        </div>



        </div>
    </section>

 

    <br><br>

    <div class="section-padding bg-cover portfolio-section">
        <div class="container">

            <div class="section-title section-title-2 flex-title">
                <div>
                    <p class="subtitle">Media Center</p>
                    <h4 class="title">We are a Hindu that believe in Ram</h4>

                </div>
                <div class="sigma_arrows">
                    <i class="far fa-chevron-left slick-arrow slider-prev" style="color: #ffffff"></i>
                    <i class="far fa-chevron-right slick-arrow slider-next" style="color: #ffffff"></i>
                </div>
            </div>

            <div class="portfolio-slider">
                @foreach ($media as $fm)
                    <div class="sigma_portfolio-item style-3">
                      @if($fm->videoul!="null")
                      <iframe src="{{$fm->videoul}}"  style="height: 350px;width: 100%"
                          frameborder="0"></iframe>
                      @elseif($fm->image!="null")
                      <img src="{{ asset('/uploads/mediacenter/'.$fm->image) }}" 
                       style="height: 350px;width: 100%" alt="{{$fm->title}}">
                      @endif
                       
                        <div class="sigma_portfolio-item-content" style="background-color: rgb(211, 202, 202)">
                            <div class="sigma_portfolio-item-content-inner">
                                <a href="#">{{ $fm->title }}</a>
                                <h5> <a href="/usermediadetail/{{ $fm->slug }}">
                                        <?php
                                        $f1 = strip_tags($fm->description);
                                        $f2 = Str::limit($f1, 50);
                                        
                                        ?>
                                        {{ $f2 }} </a> </h5>
                            </div>
                            <a href="/usermediadetail/{{ $fm->slug }}"><i
                                    class="far fa-arrow-right"></i></a>
                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </div>
   


    <br><br><br><br>
    <div class="section-padding bg-cover portfolio-section">
        <div class="container">

            <div class="section-title section-title-2 flex-title">
                <div>
                    <p class="subtitle">Job Classified</p>
                    <h4 class="title">We are a Hindu that believe in Ram</h4>

                </div>
                <div class="sigma_arrows">
                    <i class="far fa-chevron-left slick-arrow slider-prev" style="color: #ffffff"></i>
                    <i class="far fa-chevron-right slick-arrow slider-next" style="color: #ffffff"></i>
                </div>
            </div>

            <div class="portfolio-slider">
                @foreach ($jobclassified as $fjc)
                    <div class="sigma_portfolio-item style-3">
                        <img src="{{ asset('/uploads/jobclassified/'.$fjc->image) }}" style="height: 350px;width: 100%" alt="{{ $fjc->title }}">
                        <div class="sigma_portfolio-item-content" style="background-color: rgb(211, 202, 202)">
                            <div class="sigma_portfolio-item-content-inner">
                                <a href="#">{{ $fjc->title }}</a>
                                <h5> <a href="jobdetail/{{ $fjc->slug }}">
                                        <?php
                                        $f1 = strip_tags($fjc->description);
                                        $f2 = Str::limit($f1, 50);
                                        
                                        ?>
                                        {{ $f2 }} </a> </h5>
                            </div>
                            <a href="jobdetail/{{ $fjc->slug }}"><i
                                    class="far fa-arrow-right"></i></a>
                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </div>
   
    <br><br><br><br>
    <div class="section-padding bg-cover portfolio-section">
        <div class="container">

            <div class="section-title section-title-2 flex-title">
                <div>
                    <p class="subtitle">Mantras</p>
                    <h4 class="title">We are a Hindu that believe in Ram</h4>

                </div>
                <div class="sigma_arrows">
                    <i class="far fa-chevron-left slick-arrow slider-prev" style="color: #ffffff"></i>
                    <i class="far fa-chevron-right slick-arrow slider-next" style="color: #ffffff"></i>
                </div>
            </div>

            <div class="portfolio-slider">
                @foreach ($businesspromotion as $fbp)
                    <div class="sigma_portfolio-item style-3">
                        <img src="{{ asset('/uploads/businesspromotion/'.$fbp->image) }}"
                         alt="{{ $fbp->title }}">
                        <div class="sigma_portfolio-item-content" style="background-color: rgb(211, 202, 202)">
                            <div class="sigma_portfolio-item-content-inner">
                                <a href="#">{{ $fbp->title }}</a>
                                <h5> <a href="mantradetail/{{ $fbp->slug }}">
                                        <?php
                                        $f1 = strip_tags($fbp->description);
                                        $f2 = Str::limit($f1, 50);
                                        
                                        ?>
                                        {{ $f2 }} </a> </h5>
                            </div>
                            <a href="mantradetail/{{ $fbp->slug }}"><i
                                    class="far fa-arrow-right"></i></a>
                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </div>

   
    <br><br><br><br>
    <div class="section-padding bg-cover portfolio-section">
        <div class="container">

            <div class="section-title section-title-2 flex-title">
                <div>
                    <p class="subtitle">Collaborations</p>
                    <h4 class="title">We are a Hindu that believe in Ram</h4>

                </div>
                <div class="sigma_arrows">
                    <i class="far fa-chevron-left slick-arrow slider-prev" style="color: #ffffff"></i>
                    <i class="far fa-chevron-right slick-arrow slider-next" style="color: #ffffff"></i>
                </div>
            </div>

            <div class="portfolio-slider">
                @foreach ($collaboration as $fc)
                    <div class="sigma_portfolio-item style-3">
                        <img src="{{ asset('/uploads/collaboration/'.$fc->image) }}"
                         style="height: 350px;width: 100%" alt="{{ $fc->title }}">
                        <div class="sigma_portfolio-item-content" style="background-color: rgb(211, 202, 202)">
                            <div class="sigma_portfolio-item-content-inner">
                                <a href="#">{{ $fc->title }}</a>
                                <h5> <a href="usercoldetail/{{ $fc->slug }}">
                                        <?php
                                        $f1 = strip_tags($fc->description);
                                        $f2 = Str::limit($f1, 50);
                                        
                                        ?>
                                        {{ $f2 }} </a> </h5>
                            </div>
                            <a href="usercoldetail/{{ $fc->slug }}"><i
                                    class="far fa-arrow-right"></i></a>
                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </div>
 
  
    <br><br><br><br>
    <div class="section-padding bg-cover portfolio-section">
        <div class="container">

            <div class="section-title section-title-2 flex-title">
                <div>
                    <p class="subtitle">Festivals / Events</p>
                    <h4 class="title">We are a Hindu that believe in Ram</h4>

                </div>
                <div class="sigma_arrows">
                    <i class="far fa-chevron-left slick-arrow slider-prev" style="color: #ffffff"></i>
                    <i class="far fa-chevron-right slick-arrow slider-next" style="color: #ffffff"></i>
                </div>
            </div>

            <div class="portfolio-slider">
                @foreach ($event as $f)
                    <div class="sigma_portfolio-item style-3">
                        <img src="{{ asset('/uploads/event/'.$f->image) }}" 
                        style="height: 350px;width: 100%" alt="{{ $fc->title }}">
                        <div class="sigma_portfolio-item-content" style="background-color: rgb(211, 202, 202)">
                            <div class="sigma_portfolio-item-content-inner">
                                <a href="#">{{ $fc->title }}</a>
                                <h5> <a href="/usereventdetail/{{ $f->slug }}">
                                        <?php
                                        $f1 = strip_tags($fc->description);
                                        $f2 = Str::limit($f1, 50);
                                        
                                        ?>
                                        {{ $f2 }} </a> </h5>
                            </div>
                            <a href="/usereventdetail//{{ $f->slug }}"><i
                                    class="far fa-arrow-right"></i></a>
                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </div>
  
    <br><br>
    </div>
@endsection
