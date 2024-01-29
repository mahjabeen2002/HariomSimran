@extends("userside.layout")
@section("title")
<head>
<?php
    $ptitle = str_replace(' ', '%20', $fetcheventde->title);
    $pdes = strip_tags($fetcheventde->eventdate);
    ?>
    <title> {{$fetcheventde->title}}</title>
<meta name="description" content="{{$fetcheventde->eventdate}}" />
<meta property="og:image" content="http://hariomsimran.com/eventimages/{{$fetcheventde->e_image}}" />
<meta property="og:url" content="http://hariomsimran.com/usereventdetail/{{$ptitle}}/{{$fetcheventde->id}}" />
<meta property="og:type" content="website" /> 
<meta name="keywords" content="learndigital" />
</head>
@endsection
@section("usercontent")
<div class="sigma_subheader dark-overlay dark-overlay-2" style="background-image: url(../../Mytemplate/assets/img/subheader.jpg)">

  <div class="container">
    <div class="sigma_subheader-inner">
      <div class="sigma_subheader-text">
        <h1>Events</h1>
      </div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a class="btn-link" href="#">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Events</li>
        </ol>
      </nav>
    </div>
  </div>

</div>

  

    <section>
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <ul>
              <li>
                <br>
                <h5>Title:</h5>
                <p>{{$fetcheventde->title}}</p>
              </li>

              <li>
                <h5>Event Date:</h5>
                <p>{{$fetcheventde->eventdate}}</p>
              </li>

              <h4 class="mt-0">Event Description</h4>
            <p>{!! html_entity_decode($fetcheventde->event_Des) !!}</p>

             
             
              <li>
                <br>
                <h5>Share On:</h5>
                <div class="sidebar">
                        <?php
                                $url = urlencode("http://hariomsimran.com/usereventdetail/$ptitle/$fetcheventde->id");
                                ?><a style="background-color:#f0c2c2" target="_blank" href="https://www.facebook.com/sharer.php?u={{$url}}" class="btn btn--small btn--secondary fab fa-facebook-f" title="Share on Facebook">
                                    <i style="color:black" class="fa fa-facebook-square" aria-hidden="true"></i> <span class="share-title sizeicon" aria-hidden="true"></span>
                                </a>
                                 <a style="background-color:#f0c2c2" target="_blank" href="https://twitter.com/share?url={{$url}}" class="btn btn--small btn--secondary fab fa-twitter" title="Tweet on Twitter">
                                    <i style="color:black" class="fa fa-twitter" aria-hidden="true"></i> <span class="share-titl sizeicon" aria-hidden="true"></span>
                                </a> 
                                 <a style="background-color:#f0c2c2" href="https://api.whatsapp.com/send?phone=&text=<?php urlencode("hi hello")?> {{$url}}" target="_blank" title="Share on Whatsapp" class="btn btn--small btn--secondary fab fa-whatsapp">
                                    <i style="color:black" class="fa fa-whatsapp" aria-hidden="true"></i> <span class="share-title sizeicon" aria-hidden="true"></span>
                                </a> 
                                <a style="background-color:#f0c2c2" target="_blank" href="https://www.linkedin.com/sharing/share-offsite/?url={{$url}}" class="btn btn--small btn--secondary fab fa-pinterest" title="Pin on Pinterest">
                                    <i style="color:black" class="fa fa-linkedin" aria-hidden="true"></i> <span class="share-title sizeicon" aria-hidden="true"></span>
                                </a>
                    </div>
               
              
              </li>
            </ul>
          </div> 
          <div class="col-md-4">
            <div class="">
              <div class="item">
                <br><br>
                <img src="/eventimages/{{$fetcheventde->e_image}}"  alt="">
              </div>
              <div class="item">
               
              </div>
            </div>
          </div>
        </div>
       
        
      </div>
    </section>


    

  </div>
@endsection