@extends('userside.layout')
@section('title')

    <head>
        <title>Our Courses - HariOm Simran: Get in Touch for Modern Banking Solutions</title>
        <meta name="description"
            content="Contact HariOm Simran for reliable and innovative digital banking solutions. Reach out to us for inquiries, support, and partnership opportunities." />
        <meta name="keywords"
            content="HariOm Simran, Our Courses, digital banking solutions, modern banking, support, inquiries, partnership, hariom simran" />
        <meta property="og:image" content="{{ asset('/assets/img/logo-black.png/') }}" />
        <meta property="og:description"
            content="Contact HariOm Simran for reliable and innovative digital banking solutions. Reach out to us for inquiries, support, and partnership opportunities." />
        <meta property="og:url" content="https://hariomsimran.com/contactus" />
        <meta property="og:title" content="Contact Us">
        <meta property="og:site_name" content="HariOm Simran">
        <meta property="og:type" content="website">
    </head>
@endsection
@section('usercontent')
<style>
   

    .old-price {
        color: #999;
        text-decoration: line-through;
    }

    .new-price {
        color: #e74c3c; /* You can use your desired color for the new price */
        font-weight: bold;
    }
.level-indicator {
    position: absolute;
    top: 10px;
    left: 10px;
}

.level-button {
    background-color: #3498db;
    color: #fff;
    padding: 5px 10px;
    border-radius: 5px;
}

.price-info {
    margin-top: 15px;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
}

.original-price {
    text-decoration: line-through;
    color: #e74c3c;
}

.selling-price {
    font-weight: bold;
    color: #2ecc71;
}

.price-line {
    border-top: 1px solid #bdc3c7;
    margin-top: 5px;
    width: 100%;
}
</style>
    <div class="sigma_subheader dark-overlay dark-overlay-2"
        style="background-image: url(../../Mytemplate/assets/img/subheader.jpg)">

        <div class="container">
            <div class="sigma_subheader-inner">
                <div class="sigma_subheader-text">
                    <br><br><br><br><br><br><br>
                    <h1>Course</h1>
                    <br><br>
                </div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="btn-link" href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Events->Category</li>
                    </ol>
                </nav>
            </div>
        </div>

    </div>

    <!-- donation Start -->
    <div class="section section-padding">
        <div class="container">
            <div class="row">
                @foreach ($courses as $course)
                <div class="col-lg-4 col-md-6">
                    <div class="sigma_service style-2">
                        <div class="sigma_service-thumb">
                            <a href="{{ route('course_detail', $course->slug) }}">
                            <img src="{{ asset('/uploads/subcategory/' . $course->image) }}" style="width: 500px; height: 200px;" alt="{{ $course->title }}">
                            </a>
                        </div>
                        <div class="sigma_service-body">
                            <h5>
                                <a href="{{ route('course_detail', $course->slug) }}">{{ $course->title }}</a>
                            </h5>
                            <?php
                            $f1 = strip_tags($course->description);
                            $f2 = Str::limit($f1, 70);
                            
                            ?>
                            <p>{{ $f2 }}</p>
                            <div class="sigma_service-progress">
                                <div class="progress-content">
                                   
                                    <p>{{$course->level}}</p>
                                     <div class="price">
                                                    <span class="old-price">{{ $course->original_price }}</span>
                                                    <span class="new-price">{{ $course->selling_price }}</span>
                                                </div>
                                </div>
                               
                            </div>
                         
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
    <!-- donation End -->

    
@endsection
