@extends("userside.layout")
@section("title")
<head>
<title>Quiz result | HariomSimran</title>
<meta name="description" content="Team Page" />
<meta name="keywords" content="HariomSimran" />
</head>
@endsection
@section("usercontent")
<!-- ============================ Page Title Start================================== -->

<div class="sigma_subheader dark-overlay dark-overlay-2" style="background-image: url(../../Mytemplate/assets/img/subheader.jpg)">

  <div class="container">
    <div class="sigma_subheader-inner">
      <div class="sigma_subheader-text">
        <h1>Register</h1>
      </div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a class="btn-link" href="#">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Register</li>
        </ol>
      </nav>
    </div>
  </div>

</div>
  </section>
  
<!-- ============================ Page Title End ================================== -->			

<!-- ============================ Full Width Shop  ================================== -->
<section class="pt-0">
  <div class="container">
  <?php
  $username = DB::table('users')->where('id',$result->userid)->first();
  $skillname = DB::table('category1tbls')->where('id',$result->skillid)->first();
  $percent = ($result->studentmarks/$result->totalmarks)*100;
  ?>
  <hr  style="background-color:brown">
  <div  style="background-color:brown" class="row">
      <div class="col-xl-5 col-md-3 col-lg-5 col-sm-12">
     
      </div>
      <div  class="col-xl-4 col-md-5 col-lg-4 col-sm-12">
      <h4 style="background-color:brown;color: white">Result:</h4>
      </div>
      <div class="col-xl-3 col-md-4 col-lg-3 col-sm-12">
     
     </div>
  </div>
 
  <hr  style="background-color:brown">
 
  <div class="row">

      <div class="col-md-12 col-lg-12 col-sm-12">
      <table class="table tale-stripped">
          <tr  style="background-color:
#7e4555">
          <th style="color: white" >Student Name</th>
          <th style="color: white">Skill Name:</th>
          </tr>
          <tr>
              <td style="text-align:center">{{$username->name}}</td>
              <td style="text-align:center">{{$skillname->category_name}}</td>
          </tr>
      </table>
      </div>
    
  </div>
  <div class="row">
  <div class="col-md-12 col-lg-12 col-sm-12">
      <table class="table tale-stripped">
          <tr style="background-color:
#7e4555">
          <th style="color: white">Total Questions</th>
          <th style="color: white">Correct Answer:</th>
          <th style="color: white">Attempted Question:</th>
          </tr>
          <tr>
              <td style="text-align:center">{{$result->totalquestion}}</td>
              <td style="text-align:center">{{$result->correctanswer}}</td>
              <td style="text-align:center">{{$result->attemptquestion}}</td>
          </tr>
      </table>
      </div>
     
   </div>
   <div class="row">
   <div class="col-md-12 col-lg-12 col-sm-12">
      <table class="table tale-stripped">
          <tr style="background-color:
#7e4555">
          <th style="color: white">Total Marks</th>
          <th style="color: white" >Student Marks:</th>
          </tr>
          <tr>
              <td style="text-align:center">{{$result->totalmarks}}</td>
              <td style="text-align:center">{{$result->studentmarks}}</td>
          </tr>
      </table>
      </div>
     
   </div>
   <div class="row">
   <div class="col-md-12 col-lg-12 col-sm-12">
      <table class="table tale-stripped">
          <tr style="background-color:
#7e4555">
          <th style="color: white">Percentage:</th>
          <th style="color: white">Remarks:</th>
          </tr>
          <tr>
              <td style="text-align:center">{{$percent}}%</td>
              <td style="text-align:center">{{$result->remarks}}</td>
          </tr>
      </table>
      <a href="/testyourskill" class="btn btn-info">Back</a>
      </div>
     
   </div>
</div>
  <br><br><br>
</section>
@endsection