@extends('userside.layout')
@section('title')

    <head>

        <title>{{ $courseDetails->subcategory->title }} | Digital Banking Zone</title>
        <meta name="description" content="{{ $courseDetails->learn_description }}" />

        <meta name="keywords" content="{{ $courseDetails->subcategory->title }}" />
        <meta property="og:image" content="https://digitalbankingzone.com/uploads/coursedetail/{{ $courseDetails->image }}" />
        <meta property="og:url" content="https://digitalbankingzone.com/course_detail/{{ $courseDetails->slug }}}" />
        <meta property="og:type" content="website" />
        <meta property="og:title" content="{{ $courseDetails->subcategory->title }}">
        <meta property="og:site_name" content="Digital Banking Zone">
        <script src="https://www.youtube.com/iframe_api"></script>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    </head>
@endsection

@section('usercontent')

    <!doctype html>
    <html class="no-js" lang="en">

    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
     
        <meta name="robots" content="noindex, follow" />
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('web') }}/images/favicon.png">

        <!-- CSS
                         ============================================ -->
        <link rel="stylesheet" href="{{ asset('web') }}/css/vendor/bootstrap.min.css">
        <link rel="stylesheet" href="{{ asset('web') }}/css/vendor/remixicon.css">
        <link rel="stylesheet" href="{{ asset('web') }}/css/vendor/eduvibe-font.css">
        <link rel="stylesheet" href="{{ asset('web') }}/css/vendor/magnifypopup.css">
        <link rel="stylesheet" href="{{ asset('web') }}/css/vendor/slick.css">
        <link rel="stylesheet" href="{{ asset('web') }}/css/vendor/odometer.css">
        <link rel="stylesheet" href="{{ asset('web') }}/css/vendor/lightbox.css">
        <link rel="stylesheet" href="{{ asset('web') }}/css/vendor/animation.css">
        <link rel="stylesheet" href="{{ asset('web') }}/css/vendor/jqueru-ui-min.css">
        <link rel="stylesheet" href="{{ asset('web') }}/css/style.css">
    </head>

    <body>

        <style>
            .rating input[type="radio"] {
                display: none;
            }

            .rating label {
                cursor: pointer;
                font-size: 25px;
                /* Adjust as needed */
                color: #ccc;
                /* Adjust as needed for the unfilled star color */
            }

            .rating input[type="radio"]:checked~label {
                color: #ffcc00;
                /* Adjust as needed for the filled star color */
            }

            .materials-dropdown {
                min-width: 690px;
                /* Adjust the width as needed */
            }

            .material-item {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 10px;
            }

            .material-title {
                flex-grow: 1;
            }

            .no-materials {
                padding: 10px;
                text-align: center;
                font-style: italic;
                color: #999;
            }

            /* Add this to your CSS */

            .rating {
                color: white;
                /* Set initial color to white */
                cursor: pointer;
            }

            .rating i.filled {
                color: yellow;
                /* Set color to yellow when filled */
            }
        </style>
        <div class="main-wrapper">



            <div class="sigma_subheader dark-overlay dark-overlay-2"
                style="background-image: url(../../Mytemplate/assets/img/subheader.jpg)">

                <div class="container">
                    <div class="sigma_subheader-inner">
                        <div class="sigma_subheader-text">
                            <br><br><br><br><br><br><br>
                            <h1>Course Detail</h1>
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
            <div class="edu-course-details-area edu-section-gap bg-color-white">
                <div class="container">
                    <div class="row g-5">
                        <div class="col-lg-12">
                            <div class="main-image thumbnail">
                                <img class="radius-small"
                                    src="{{ asset('/uploads/coursedetail/' . $courseDetails->image) }}"
                                    {{-- src="{{ asset('/uploads/coursedetail/' . $courseDetails->image) }}" --}} alt="Banner Images">
                            </div>
                        </div>
                    </div>

                    <div class="row g-5">
                        <div class="col-xl-8 col-lg-7">
                            <div class="course-details-content">
                                <div class="content-top">
                                    <div class="author-meta">
                                        <div class="author-thumb">
                                            <a>
                                                <img src="{{ asset('/uploads/Instructor/' . $courseDetails->instructor->profile_picture) }}"
                                                    alt="{{ $courseDetails->instructor->name }}">
                                                <span class="author-title">
                                                    {{ $courseDetails->instructor->name }}
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="edu-rating rating-default">
                                        <div class="rating">
                                            <i class="icon-Star"></i>
                                            <i class="icon-Star"></i>
                                            <i class="icon-Star"></i>
                                            <i class="icon-Star"></i>
                                            <i class="icon-Star"></i>
                                        </div>
                                        <span class="rating-count">({{ $subCategory->reviews->count() }}) Reviews</span>
                                    </div>
                                </div>

                                <h3 class="title">{{ $courseDetails->subcategory->title }}</h3>

                                <ul class="edu-course-tab nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="overview-tab" data-bs-toggle="tab"
                                            data-bs-target="#overview" type="button" role="tab"
                                            aria-controls="overview" aria-selected="true">Overview</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="curriculum-tab" data-bs-toggle="tab"
                                            data-bs-target="#curriculum" type="button" role="tab"
                                            aria-controls="curriculum" aria-selected="false">Curriculum</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="instructor-tab" data-bs-toggle="tab"
                                            data-bs-target="#instructor" type="button" role="tab"
                                            aria-controls="instructor" aria-selected="false">Instructor</button>
                                    </li>

                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="review-tab" data-bs-toggle="tab"
                                            data-bs-target="#review" type="button" role="tab"
                                            aria-controls="review" aria-selected="false">Reviews</button>
                                    </li>
                                </ul>

                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="overview" role="tabpanel"
                                        aria-labelledby="overview-tab">
                                        <div class="course-tab-content">
                                            <h5>Course Description</h5>
                                            <p>{{ $courseDetails->course_description }}</p>
                                            <h5>What You’ll Learn From This Course</h5>
                                            <ul>
                                                <li>{{ $courseDetails->what_you_will_learn }}</li>
                                            </ul>
                                            <h5>Certification</h5>
                                            <p>{{ $courseDetails->certification_description }}</p>
                                        </div>
                                    </div>

                                    {{-- curriculum --}}

                                    <div class="tab-pane fade" id="curriculum" role="tabpanel"
                                        aria-labelledby="curriculum-tab">
                                        <div class="course-tab-content">
                                            <div class="edu-accordion-02" id="accordionExample1">
                                                @if ($courseDetails->lectures)
                                                    @forelse($courseDetails->lectures as $index => $lecture)
                                                        <div class="edu-accordion-item">
                                                            <div class="edu-accordion-header"
                                                                id="heading{{ $index }}">
                                                                <button class="edu-accordion-button" type="button"
                                                                    data-bs-toggle="collapse"
                                                                    data-bs-target="#collapse{{ $index }}"
                                                                    aria-expanded="false"
                                                                    aria-controls="collapse{{ $index }}">
                                                                    {{ $lecture->title }}

                                                                </button>
                                                            </div>
                                                            <div id="collapse{{ $index }}"
                                                                class="accordion-collapse collapse"
                                                                aria-labelledby="heading{{ $index }}"
                                                                data-bs-parent="#accordionExample1">
                                                                <div class="edu-accordion-body">
                                                                    <ul>
                                                                        {{-- Lecture Link --}}
                                                                        <li>
                                                                            <div class="text">
                                                                                <i class="icon-draft-line"></i>
                                                                                {{ $lecture->title }}
                                                                            </div>
                                                                            <div class="icon">
                                                                                <i class="icon-lock-password-line"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#exampleModal{{ $index }}"></i>
                                                                            </div>
                                                                        </li>



                                                                        {{-- Materials  --}}
                                                                        <li class="dropdown">
                                                                            <div class="text">
                                                                                <i class="icon-draft-line"></i> Materials
                                                                            </div>
                                                                            <div class="text" id="materialsDropdown"
                                                                                role="button" data-bs-toggle="dropdown"
                                                                                aria-haspopup="true"
                                                                                aria-expanded="false">
                                                                                {{-- <i class="bi bi-arrow-down"></i>  --}}
                                                                                <i class="fa fa-arrow-circle-down "
                                                                                    aria-hidden="true"></i>
                                                                                {{-- <i class="fa fa-arrow-circle-o-down" aria-hidden="true"></i> --}}
                                                                            </div>

                                                                            <ul class="dropdown-menu materials-dropdown"
                                                                                aria-labelledby="materialsDropdown">
                                                                                @forelse ($subCategory->materials as $material)
                                                                                    <li>
                                                                                        <div class="material-item">
                                                                                            <div class="material-title">
                                                                                                <i
                                                                                                    class="icon-draft-line">{{ $material->title }}</i>
                                                                                            </div>
                                                                                            <div class="material-download">
                                                                                                <a href="{{ route('material-download', ['id' => $material->id]) }}"
                                                                                                    target="_blank">
                                                                                                    <i
                                                                                                        class="icon-draft-line">Download
                                                                                                        Material</i>
                                                                                                </a>
                                                                                            </div>
                                                                                        </div>
                                                                                    </li>
                                                                                @empty
                                                                                    <li>
                                                                                        <p class="no-materials">No
                                                                                            materials available.</p>
                                                                                    </li>
                                                                                @endforelse
                                                                            </ul>
                                                                        </li>






                                                                        {{-- Materials --}}
                                                                        {{-- <li class="">
                                                                            <div class="text">
                                                                                <i class="icon-draft-line"></i> Materials
                                                                            </div>

                                                                            <ul class="dropdown-menu">
                                                                                @forelse ($subCategory->materials as $material)
                                                                                    <li>
                                                                                        <div class="text">
                                                                                            <i class="icon-draft-line"></i>
                                                                                            {{ $material->title }}
                                                                                        </div>
                                                                                    </li>
                                                                                @empty
                                                                                    <li>
                                                                                        <p>No materials available.</p>
                                                                                    </li>
                                                                                @endforelse
                                                                            </ul>
                                                                        </li> --}}


                                                                        {{-- Quiz --}}
                                                                        {{-- <li>
                                                                            <div class="text">
                                                                                <i class="icon-draft-line"></i> Quiz
                                                                            </div>
                                                                            <div class="icon">
                                                                                <i class="icon-lock-password-line"></i>
                                                                            </div>
                                                                        </li> --}}
                                                                    </ul>
                                                                </div>
                                                            </div>

                                                            <!-- Modal for Lecture Details -->
                                                            <div class="modal fade" id="exampleModal{{ $index }}"
                                                                tabindex="-1" aria-labelledby="exampleModalLabel"
                                                                aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title"
                                                                                id="exampleModalLabel">
                                                                                {{ $lecture->title }}</h5>
                                                                            <button type="button" class="btn-close"
                                                                                data-bs-dismiss="modal"
                                                                                aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            {{-- Display embedded YouTube video --}}
                                                                            <iframe id="youtubeIframe{{ $index }}"
                                                                                width="100%" height="315"
                                                                                src="{{ getYoutubeEmbedUrl($lecture->video_link) }}"
                                                                                frameborder="0" allowfullscreen></iframe>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                class="btn btn-secondary"
                                                                                data-bs-dismiss="modal">Close</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @empty
                                                        <p>No lectures available.</p>
                                                    @endforelse
                                                @else
                                                    <p>No lectures available.</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>











                                    {{-- curriculum --}}





                                    <div class="tab-pane fade" id="instructor" role="tabpanel"
                                        aria-labelledby="instructor-tab">
                                        <div class="course-tab-content row">
                                            <div class="col-md-6">
                                                <div class="course-author-wrapper">
                                                    <div class="thumbnail">
                                                        <img src="{{ asset('/uploads/Instructor/' . $courseDetails->instructor->profile_picture) }}"
                                                            alt="{{ $courseDetails->instructor->name }}"
                                                            style="width: 100%; height: auto; max-width: 300px; max-height: 300px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="course-author-wrapper">
                                                    <div class="author-content">
                                                        <h6 class="title">
                                                            <a>{{ $courseDetails->instructor->name }}</a>
                                                        </h6>
                                                        <span
                                                            class="subtitle">{{ $courseDetails->instructor->skills }}</span>
                                                        <p>{{ $courseDetails->instructor->bio }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                    {{-- <div class="tab-pane fade" id="review" role="tabpanel"
                                        aria-labelledby="review-tab">
                                        <div class="course-tab-content">
                                            <div class="row row--30">
                                                <div class="col-lg-4">
                                                    <div class="rating-box">
                                                        <div class="rating-number">5.0</div>
                                                        <div class="rating">
                                                            <i class="icon-Star"></i>
                                                            <i class="icon-Star"></i>
                                                            <i class="icon-Star"></i>
                                                            <i class="icon-Star"></i>
                                                            <i class="icon-Star"></i>
                                                        </div>
                                                        <span>(25 Review)</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8">
                                                    <div class="review-wrapper">

                                                        <div class="single-progress-bar">
                                                            <div class="rating-text">
                                                                5 <i class="icon-Star"></i>
                                                            </div>
                                                            <div class="progress">
                                                                <div class="progress-bar" role="progressbar"
                                                                    style="width: 100%" aria-valuenow="100"
                                                                    aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                            <span class="rating-value">1</span>
                                                        </div>

                                                        <div class="single-progress-bar">
                                                            <div class="rating-text">
                                                                4 <i class="icon-Star"></i>
                                                            </div>
                                                            <div class="progress">
                                                                <div class="progress-bar" role="progressbar"
                                                                    style="width: 0%" aria-valuenow="0" aria-valuemin="0"
                                                                    aria-valuemax="100"></div>
                                                            </div>
                                                            <span class="rating-value">0</span>
                                                        </div>

                                                        <div class="single-progress-bar">
                                                            <div class="rating-text">
                                                                3 <i class="icon-Star"></i>
                                                            </div>
                                                            <div class="progress">
                                                                <div class="progress-bar" role="progressbar"
                                                                    style="width: 0%" aria-valuenow="0" aria-valuemin="0"
                                                                    aria-valuemax="100"></div>
                                                            </div>
                                                            <span class="rating-value">0</span>
                                                        </div>

                                                        <div class="single-progress-bar">
                                                            <div class="rating-text">
                                                                2 <i class="icon-Star"></i>
                                                            </div>
                                                            <div class="progress">
                                                                <div class="progress-bar" role="progressbar"
                                                                    style="width: 0%" aria-valuenow="0" aria-valuemin="0"
                                                                    aria-valuemax="100"></div>
                                                            </div>
                                                            <span class="rating-value">0</span>
                                                        </div>

                                                        <div class="single-progress-bar">
                                                            <div class="rating-text">
                                                                1 <i class="icon-Star"></i>
                                                            </div>
                                                            <div class="progress">
                                                                <div class="progress-bar" role="progressbar"
                                                                    style="width: 0%" aria-valuenow="0" aria-valuemin="0"
                                                                    aria-valuemax="100"></div>
                                                            </div>
                                                            <span class="rating-value">0</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="comment-wrapper pt--40">
                                                <div class="section-title">
                                                    <h5 class="mb--25">Reviews</h5>
                                                </div>
                                                <div class="edu-comment">
                                                    <div class="thumbnail">
                                                        <img src="{{ asset('web') }}/images/course/student-review/student-1.png"
                                                            alt="Comment Images">
                                                    </div>
                                                    <div class="comment-content">
                                                        <div class="comment-top">
                                                            <h6 class="title">Elen Saspita</h6>
                                                            <div class="rating">
                                                                <i class="icon-Star"></i>
                                                                <i class="icon-Star"></i>
                                                                <i class="icon-Star"></i>
                                                                <i class="icon-Star"></i>
                                                                <i class="icon-Star"></i>
                                                            </div>
                                                        </div>
                                                        <span class="subtitle">“ Outstanding Course ”</span>
                                                        <p>As Thomas pointed out, Chegg’s survey appears more like a
                                                            scorecard that details obstacles and challenges that the current
                                                            university undergraduate student population is going through in
                                                            their universities and countries.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                    <!-- Add this to your Blade file where you display reviews -->
                                    <div class="tab-pane fade" id="review" role="tabpanel"
                                        aria-labelledby="review-tab">
                                        <div class="course-tab-content">
                                            <div class="comment-wrapper pt--40">
                                                <div class="section-title">
                                                    <h5 class="mb--25">Reviews</h5>
                                                </div>
                                                @foreach ($subCategory->reviews as $review)
                                                    <div class="edu-comment">
                                                        <div class="thumbnail">
                                                            <img src="{{ asset('/uploads/Users/' . $review->user->profile_image) }}"
                                                                alt="Comment Images">
                                                        </div>
                                                        <div class="comment-content">
                                                            <div class="comment-top">
                                                                <h6 class="title">{{ $review->user->name }}</h6>
                                                                <div class="rating">
                                                                    @for ($i = 1; $i <= $review->rating; $i++)
                                                                        {{-- <label class="star-rating-complete"
                                    title="text">{{ $i }}
                                    stars</label> --}}
                                                                        <i
                                                                            class="icon-Star {{ $i ? 'filled' : '' }}"></i>
                                                                    @endfor
                                                                </div>
                                                            </div>
                                                            {{-- <span class="subtitle">{{ $review->comment }}</span> --}}
                                                            <p>{{ $review->comment }}</p>
                                                        </div>
                                                    </div>
                                                @endforeach

                                                @auth
                                                    <div class="edu-comment">
                                                        <div class="thumbnail">
                                                            <img src="{{ asset('/uploads/Users/' . auth()->user()->profile_image) }}"
                                                                alt="Comment Images">
                                                        </div>
                                                        <div class="comment-content">
                                                            {{-- <form action="{{ route('course-reviews.store') }}" method="post">
                            @csrf
                            <input type="hidden" name="course_subcategory_id" value="{{ $subCategory->id }}">
                            <div class="rating" id="userRating">
                                @for ($i = 5; $i >= 1; $i--)
                                    <i class="icon-Star" data-rating="{{ $i }}"></i>
                                @endfor
                                <input type="hidden" name="rating" id="selectedRating" value="{{ old('rating') }}">
                            </div>
                            <textarea name="comment" placeholder="Write your review here..." required>{{ old('comment') }}</textarea>
                            <button class="btn btn-success" type="submit">Submit Review</button>
                        </form> --}}






                                                            {{-- new --}}
                                                            {{-- <form action="{{ route('course-reviews.store') }}" method="post">
                            @csrf
                            <input type="hidden" name="course_subcategory_id" value="{{ $subCategory->id }}">
                            <div class="rating">
                                @for ($i = 5; $i >= 1; $i--)
                                    <input type="radio" name="rating" value="{{ $i }}" id="rating{{ $i }}">
                                    <label for="rating{{ $i }}"><i class="icon-Star"></i></label>
                                @endfor
                            </div>
                            <textarea name="comment" placeholder="Write your review here..." required></textarea>
                            <button class="btn btn-success" type="submit">Submit Review</button>
                        </form> --}}




                                                            {{-- newest --}}
                                                            <form action="{{ route('course-reviews.store') }}"
                                                                method="post">
                                                                @csrf
                                                                <input type="hidden" name="course_subcategory_id"
                                                                    value="{{ $subCategory->id }}">
                                                                <div class="rating">
                                                                    @for ($i = 5; $i >= 1; $i--)
                                                                        <input type="radio" name="rating"
                                                                            value="{{ $i }}"
                                                                            id="rating{{ $i }}">
                                                                        <label for="rating{{ $i }}"><i
                                                                                class="fas fa-star"></i></label>
                                                                    @endfor
                                                                </div>
                                                                <textarea name="comment" placeholder="Write your review here..." required></textarea>
                                                                <br> <button class="btn btn-danger" type="submit">Submit
                                                                    Review</button>
                                                            </form>
                                                        </div>

                                                        @push('scripts')
                                                            <script>
                                                                document.addEventListener("DOMContentLoaded", function() {
                                                                    const userRating = document.getElementById('userRating');
                                                                    const selectedRating = document.getElementById('selectedRating');

                                                                    userRating.addEventListener('click', function(event) {
                                                                        if (event.target.tagName === 'I') {
                                                                            const ratingValue = event.target.getAttribute('data-rating');
                                                                            selectedRating.value = ratingValue;

                                                                            userRating.querySelectorAll('i').forEach(star => {
                                                                                if (star.getAttribute('data-rating') <= ratingValue) {
                                                                                    star.classList.add('filled');
                                                                                } else {
                                                                                    star.classList.remove('filled');
                                                                                }
                                                                            });
                                                                        }
                                                                    });
                                                                });
                                                            </script>
                                                        @endpush

                                                    </div>
                                                @endauth
                                            </div>
                                        </div>
                                    </div>












                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-lg-5">
                            <div class="eduvibe-sidebar course-details-sidebar">
                                <div class="inner">
                                    <div class="eduvibe-widget">
                                        <div class="video-area">
                                            <div class="thumbnail video-popup-wrapper">
                                                <img class="radius-small w-100"
                                                    src="{{ asset('web') }}/images/course/video-bg/course-02.jpg"
                                                    alt="Course Images">
                                                <a href="https://www.youtube.com/watch?v=pNje3bWz7V8"
                                                    class="video-play-btn position-to-top video-popup-activation">
                                                    <span class="play-icon course-details-video-popup"></span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="eduvibe-widget-details mt--35">
                                            <div class="widget-content">
                                                <ul>
                                                    <li><span><i class="icon-time-line"></i>Course
                                                            Duration</span><span>{{ $courseDetails->subcategory->course_duration }}</span>
                                                    </li>

                                                    <li><span><i class="icon-user-2"></i> Enrolled</span><span>89</span>
                                                    </li>

                                                    <li><span><i class="icon-draft-line"></i>
                                                            Lectures</span><span>{{ $lectureCount }}</span></li>


                                                    <li><span><i class="icon-bar-chart-2-line"></i> Skill
                                                            Level</span><span>{{ $courseDetails->subcategory->level }}</span>
                                                    </li>

                                                    <li><span><i class="icon-translate"></i>
                                                            Language</span><span>{{ $courseDetails->language }}</span></li>

                                                    {{-- <li><span><i class="icon-artboard-line"></i> Quizzes</span><span>25</span></li> --}}

                                                    <li><span><i class="icon-award-line"></i>
                                                            Certificate</span><span>Yes</span></li>


                                                    {{-- 
                                                <li><span><i class="icon-calendar-2-line"></i> Deadline</span><span>25 Dec, 2023</span></li> --}}

                                                    <li><span><i class="icon-user-2-line_tie"></i> Instructor</span><span>
                                                            {{ $courseDetails->instructor->name }}</span></li>
                                                </ul>

                                                <div class="read-more-btn mt--45">
                                                    <a class="edu-btn btn-bg-alt w-100 text-center"
                                                        href="#">RS:{{ $courseDetails->subcategory->selling_price }}</a>
                                                </div>

                                                <div class="read-more-btn mt--15">
                                                    <a class="edu-btn w-100 text-center" href="#">Buy Now</a>
                                                </div>
                                                <div class="read-more-btn mt--30 text-center">
                                                    <div class="eduvibe-post-share">
                                                        <span>Share: </span>
                                                        <?php
                                                        $url = urlencode("https://digitalbankingzone.com/course_detail/$courseDetails->slug");
                                                        ?>
                                                        <a class="linkedin" target="_blank"
                                                            href="https://www.linkedin.com/sharing/share-offsite/?url={{ $url }}"><i
                                                                class="icon-linkedin"></i></a>
                                                        <a class="facebook" target="_blank"
                                                            href="https://www.facebook.com/sharer.php?u={{ $url }}"><i
                                                                class="icon-Fb"></i></a>
                                                        <a class="twitter" target="_blank"
                                                            href="https://twitter.com/share?url={{ $url }}"><i
                                                                class="icon-Twitter"></i></a>
                                                        <a class="whatsapp" href="#"><i
                                                                class="icon-whatsapp"></i></a>
                                                        <a href="https://api.whatsapp.com/send?phone=&text=<?php urlencode('hi hello'); ?> {{ $url }}"
                                                            target="_blank" title="Share on Whatsapp"
                                                            class="btn btn--small btn--secondary btn--share">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="19"
                                                                height="19" fill="currentColor"
                                                                style="margin-left: -50px;margin-top: -6px;"
                                                                class="bi bi-whatsapp" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z" />
                                                            </svg>
                                                            {{-- <i class="fas fa-whatsapp-square" aria-hidden="true"></i> <span
                                                                class="share-title sizeicon" aria-hidden="true"></span> --}}
                                                        </a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="edu-course-wrapper pt--65">
                                <div class="section-title text-start mb--20">
                                    <span class="pre-title">Related Courses</span>
                                    <h3 class="title">Courses You May Like</h3>
                                </div>

                                <div
                                    class="mt--40 edu-slick-button slick-activation-wrapper eduvibe-course-one-carousel eduvibe-course-details-related-course-carousel">
                                    @forelse ($relatedCourses as $relatedCourse)
                                        <div class="single-slick-card">
                                            <div class="edu-card card-type-3 radius-small">
                                                <div class="inner">
                                                    <div class="thumbnail">
                                                        <a
                                                            href="{{ route('course_detail', $relatedCourse->subcategory->slug) }}">
                                                            <img class="w-100"
                                                                src="{{ asset('/uploads/subcategory/' . $relatedCourse->subcategory->image) }}"
                                                                alt="Course Thumb">
                                                        </a>
                                                        <div class="wishlist-top-right">
                                                            <button class="wishlist-btn"><i
                                                                    class="icon-Heart"></i></button>
                                                        </div>
                                                        <div class="top-position status-group left-bottom">
                                                            <span
                                                                class="eduvibe-status status-03">{{ $relatedCourse->subcategory->category->name }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="content">

                                                        <h6 class="title"><a
                                                                href="{{ route('course_detail', $relatedCourse->subcategory->slug) }}">{{ $relatedCourse->subcategory->title }}</a>
                                                        </h6>
                                                        <div class="card-bottom">
                                                            <div class="price-list price-style-02">
                                                                <div class="price">
                                                                    <span
                                                                        class="old-price">{{ $relatedCourse->subcategory->original_price }}</span>
                                                                    <span
                                                                        class="new-price">{{ $relatedCourse->subcategory->selling_price }}</span>
                                                                </div>
                                                                {{-- <div class="price current-price">
                                                                {{ $relatedCourse->subcategory->selling_price }}

                                                            </div>
                                                            <div class="price old-price">
                                                                </div> --}}
                                                            </div>
                                                            <div class="edu-rating rating-default">
                                                                <a
                                                                    href="{{ route('course_detail', $relatedCourse->subcategory->slug) }}">
                                                                    <button class="btn btn-success">See More</button>
                                                                </a> {{-- <div class="rating">
                                                                <i class="icon-Star"></i>
                                                                <i class="icon-Star"></i>
                                                                <i class="icon-Star"></i>
                                                                <i class="icon-Star"></i>
                                                                <i class="icon-Star"></i>
                                                            </div>
                                                            <span class="rating-count">(18)</span> --}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    @empty
                                        <p>NO Related Course Avaible Yet</p>
                                    @endforelse

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Start Footer Area  -->

            <!-- End Footer Area  -->
        </div>


        <!-- JS
                        ============================================ -->
        <!-- Modernizer JS -->
        <script src="{{ asset('web') }}/js/vendor/modernizr.min.js"></script>
        <!-- jQuery JS -->
        <script src="{{ asset('web') }}/js/vendor/jquery.js"></script>
        <script src="{{ asset('web') }}/js/vendor/bootstrap.min.js"></script>
        <script src="{{ asset('web') }}/js/vendor/sal.min.js"></script>
        <script src="{{ asset('web') }}/js/vendor/backtotop.js"></script>
        <script src="{{ asset('web') }}/js/vendor/magnifypopup.js"></script>
        <script src="{{ asset('web') }}/js/vendor/slick.js"></script>
        <script src="{{ asset('web') }}/js/vendor/countdown.js"></script>
        <script src="{{ asset('web') }}/js/vendor/jquery-appear.js"></script>
        <script src="{{ asset('web') }}/js/vendor/odometer.js"></script>
        <script src="{{ asset('web') }}/js/vendor/isotop.js"></script>
        <script src="{{ asset('web') }}/js/vendor/imageloaded.js"></script>
        <script src="{{ asset('web') }}/js/vendor/lightbox.js"></script>
        <script src="{{ asset('web') }}/js/vendor/wow.js"></script>
        <script src="{{ asset('web') }}/js/vendor/paralax.min.js"></script>
        <script src="{{ asset('web') }}/js/vendor/paralax-scroll.js"></script>
        <script src="{{ asset('web') }}/js/vendor/jquery-ui.js"></script>
        <script src="{{ asset('web') }}/js/vendor/tilt.jquery.min.js"></script>
        <!-- Main JS -->
        <script src="{{ asset('web') }}/js/main.js"></script>

        {{-- <script>
            document.addEventListener('DOMContentLoaded', function() {
                var accordionItems = document.querySelectorAll('.edu-accordion-item');

                accordionItems.forEach(function(item) {
                    var button = item.querySelector('.edu-accordion-button');
                    var collapse = item.querySelector('.accordion-collapse');

                    button.addEventListener('click', function() {
                        var isOpen = collapse.classList.contains('show');

                        accordionItems.forEach(function(otherItem) {
                            otherItem.querySelector('.accordion-collapse').classList.remove(
                                'show');
                        });

                        if (!isOpen) {
                            collapse.classList.add('show');
                        }
                    });

                    button.addEventListener('blur', function() {
                        setTimeout(function() {
                            if (!button.matches(':focus')) {
                                collapse.classList.remove('show');
                            }
                        }, 200);
                    });

                    // Stop event propagation for elements inside the accordion item
                    item.querySelectorAll('.icon, .dropdown-menu').forEach(function(element) {
                        element.addEventListener('click', function(event) {
                            event.stopPropagation();
                        });
                    });
                });

                document.addEventListener('click', function(event) {
                    if (!event.target.closest('.edu-accordion-item')) {
                        accordionItems.forEach(function(item) {
                            item.querySelector('.accordion-collapse').classList.remove('show');
                        });
                    }
                });
            });
        </script> --}}


        <script>
            // Handle modal events
            $('#accordionExample1').on('show.bs.collapse', function(e) {
                // Pause the YouTube video when the accordion is opened
                $('#youtubeIframe{{ $index }}')[0].contentWindow.postMessage(
                    '{"event":"command","func":"pauseVideo","args":""}', '*');
            });

            $('#accordionExample1').on('hidden.bs.collapse', function(e) {
                // Stop the YouTube video when the accordion is closed
                $('#youtubeIframe{{ $index }}')[0].contentWindow.postMessage(
                    '{"event":"command","func":"stopVideo","args":""}', '*');
            });
        </script>





        {{-- <script>
    document.addEventListener("DOMContentLoaded", function () {
        const userRating = document.getElementById('userRating');
        const selectedRating = document.getElementById('selectedRating');

        userRating.addEventListener('click', function (event) {
            if (event.target.tagName === 'I') {
                const ratingValue = event.target.getAttribute('data-rating');
                selectedRating.value = ratingValue;

                userRating.querySelectorAll('i').forEach(star => {
                    if (star.getAttribute('data-rating') <= ratingValue) {
                        star.classList.add('filled');
                    } else {
                        star.classList.remove('filled');
                    }
                });
            }
        });
    });
</script> --}}








    </body>

    </html>



@endsection
