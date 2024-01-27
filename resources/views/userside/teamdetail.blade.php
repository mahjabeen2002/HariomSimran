@extends('userside.layout')
@section('title')

    <head>
        <?php
        $ptitle = str_replace(' ', '%20', $fetch->title);
        $pdes = strip_tags($fetch->description);
        ?>
        <title> {{ $fetch->title }}</title>
        <meta name="description" content="{{ $pdes }}" />
        <meta property="og:image" content="http://hariomsimran.com/uploads/team/{{ $fetch->image }}" />
        <meta property="og:url" content="http://hariomsimran.com/teamdetail/{{ $fetch->slug }}" />
        <meta property="og:type" content="website" />
        <meta name="keywords" content="learndigital" />
    </head>
@endsection
@section('usercontent')
<div class="sigma_subheader dark-overlay dark-overlay-2" style="background-image: url(../../Mytemplate/assets/img/subheader.jpg)">

    <div class="container">
      <div class="sigma_subheader-inner">
        <div class="sigma_subheader-text">
          <h1>Team</h1>
        </div>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="btn-link" href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Team</li>
          </ol>
        </nav>
      </div>
    </div>
  
  </div>

    <!-- Post Content Start -->
    <div class="section sigma_post-single">
        <div class="container">

            <div class="row">

                <div class="col-12">

                    <div class="entry-content">
                        <div class="sigma_volunteer-detail mb-5">
                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="sigma_member-image style-1">
                                        <img src="{{ asset('/uploads/team/' . $fetch->image) }}"  class="mb-0"
                                            alt="{{ $fetch->title }}">
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="sigma_volunteer-detail-inner mt-5 mt-lg-0 ps-0 ps-lg-4">
                                        <h3 class="sigma_member-name">{{ $fetch->title }}</h3>
                                        <span class="sigma_volunteer-detail-category">{{ $fetch->designation }}</span>
                                        <ul class="sigma_volunteer-detail-info">

                                            <p>
                                                {!! html_entity_decode($fetch->description) !!}.
                                            </p>
                                        </ul>
                                        <ul class="sigma_volunteer-detail-info">
                                            <h3>Share On:</h3>
                                            <?php
                                            $url = urlencode("http://hariomsimran.com/teamdetail/$fetch->slug");
                                            ?> <a style="background-color:#f0c2c2" target="_blank"
                                                href="https://www.facebook.com/sharer.php?u={{ $url }}"
                                                class="btn btn--small btn--secondary fab fa-facebook-f"
                                                title="Share on Facebook">
                                                <i style="color:black" class="fa fa-facebook-square" aria-hidden="true"></i>
                                                <span class="share-title sizeicon" aria-hidden="true"></span>
                                            </a>
                                            <a style="background-color:#f0c2c2" target="_blank"
                                                href="https://twitter.com/share?url={{ $url }}"
                                                class="btn btn--small btn--secondary fab fa-twitter"
                                                title="Tweet on Twitter">
                                                <i style="color:black" class="fa fa-twitter" aria-hidden="true"></i> <span
                                                    class="share-titl sizeicon" aria-hidden="true"></span>
                                            </a>
                                            <a style="background-color:#f0c2c2"
                                                href="https://api.whatsapp.com/send?phone=&text=<?php urlencode('hi hello'); ?> {{ $url }}"
                                                target="_blank" title="Share on Whatsapp"
                                                class="btn btn--small btn--secondary fab fa-whatsapp">
                                                <i style="color:black" class="fa fa-whatsapp" aria-hidden="true"></i> <span
                                                    class="share-title sizeicon" aria-hidden="true"></span>
                                            </a>
                                            <a style="background-color:#f0c2c2" target="_blank"
                                                href="https://www.linkedin.com/sharing/share-offsite/?url={{ $url }}"
                                                class="btn btn--small btn--secondary fab fa-pinterest"
                                                title="Pin on Pinterest">
                                                <i style="color:black" class="fa fa-linkedin" aria-hidden="true"></i> <span
                                                    class="share-title sizeicon" aria-hidden="true"></span>
                                            </a>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                      
                    </div>

                </div>

            </div>
        </div>
    </div>
    <!-- Post Content End -->

    @endsection
