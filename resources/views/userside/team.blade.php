@extends("userside.layout")
@section("title")
<head>
<title>Temple | HariomSimran </title>
<meta name="description" content="Media Page" />
<meta name="keywords" content="HariomSimran" />
</head>
@endsection
@section("usercontent")
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
  <!-- volunteers Start -->
  <div class="section section-padding">
    <div class="container">

      <div class="row">
        @foreach ($fetch as $fe)
        <div class="col-lg-3 col-md-6">
          <div class="sigma_volunteers volunteers-4">
            <div class="sigma_volunteers-thumb">
              <img src="{{ asset('/uploads/team/' . $fe->image) }}" alt="{{ $fe->title }}">
              <ul class="sigma_sm">
                <li> <a href="/teamdetail/{{ $fe->slug }}" class="trigger-volunteers-socials"> <i class="fal fa-plus"></i> </a> </li>
               
              </ul>
            </div>
            <div class="sigma_volunteers-body">
              <div class="sigma_volunteers-info">
                <p>{{ $fe->title }}</p>
                <h5>
                  <a href="/teamdetail/{{ $fe->slug }}">{{ $fe->designation }}</a>
                </h5>
              </div>
            </div>
          </div>
        </div>

  @endforeach

      </div>

    </div>
  </div>
  <!-- volunteers End -->
  
@endsection

