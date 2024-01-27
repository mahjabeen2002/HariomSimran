<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
</head>
<style>
    @import url('https://fonts.googleapis.com/css?family=Open+Sans|Pinyon+Script|Rochester');

    .cursive {
        font-family: 'Pinyon Script', cursive;
    }

    .sans {
        font-family: 'Open Sans', sans-serif;
    }

    .bold {
        font-weight: bold;
    }

    .block {
        display: block;
    }

    .underline {
        border-bottom: 1px solid #777;
        padding: 5px;
        margin-bottom: 15px;
    }

    .margin-0 {
        margin: 0;
    }

    .padding-0 {
        padding: 0;
    }

    .row-split {
        display: flex;
        justify-content: space-between;
    }


    .pm-empty-space {
        height: 40px;
        width: 100%;
    }

    body {
        padding: 20px 0;
        background: #ccc;
    }

    .pm-certificate-container {
        position: relative;
        width: 800px;
        height: 840px;
        background-color: #7e4555;
        padding: 30px;
        color: #333;
        font-family: 'Open Sans', sans-serif;
        box-shadow: 0 0 5px rgba(0, 0, 0, .5);
    }

    .outer-border {
        width: 794px;
        height: 794px;
        position: absolute;
        left: 50%;
        margin-left: -397px;
        top: 36%;
        margin-top: -297px;
        border: 2px solid #fff;
    }

    .inner-border {
        width: 730px;
        height: 794px;
        position: absolute;
        left: 50%;
        margin-left: -365px;
        top: 36%;
        margin-top: -265px;
        border: 2px solid #fff;
    }

    .pm-certificate-border {
        position: relative;
        width: 720px;
        height: 750px;
        padding: 0;
        border: 1px solid #E1E5F0;
        background-color: rgba(255, 255, 255, 1);
        background-image: none;
        left: 50%;
        margin-left: -360px;
        top: 35%;
        margin-top: -260px;
    }

    .pm-certificate-block {
        width: 650px;
        height: 200px;
        position: relative;
        left: 50%;
        margin-left: -325px;
        top: 70px;
        margin-top: 0;
    }

    .pm-certificate-header {
        margin-bottom: 10px;
    }

    .pm-certificate-title {
        position: relative;
        top: 40px;
}
.pm-certificate-title   h2 {
            font-size: 34px !important;
        }
   

    .pm-certificate-body {
        padding: 20px;
    }

    .pm-name-text {
        font-size: 20px;
    }


    .pm-earned {
        margin: 15px 0 20px;
}
        .pm-earned  .pm-earned-text {
            font-size: 20px;
        }

        .pm-credits-text {
            font-size: 15px;
        }
  

    .pm-course-title .pm-earned-text {


        font-size: 20px;
    }

    .pm-credits-text {
        font-size: 15px;
    }


    .pm-certified {
        font-size: 12px;
    }

    .underline {
        margin-bottom: 5px;
    }


    .pm-certificate-footer {
        width: 650px;
        height: 100px;
        position: relative;
        left: 50%;
        margin-left: -325px;
        bottom: -105px;
    }
</style>

<body>
    <div class="container pm-certificate-container">
        <div class="outer-border"></div>
        <div class="inner-border"></div>

        <div class="pm-certificate-border col-xs-12">
            <div class="row pm-certificate-header">
                <div class="pm-certificate-title cursive col-xs-12 text-center">
                    <img src="{{ asset('/uploads/certificate/' . $certificate->logo) }}" alt="">
                    <br> <br>
                    <h2>{{ $certificate->institute_name }}</h2>
                </div>
            </div>

            <div class="row pm-certificate-body">

                <div class="pm-certificate-block">
                    <div class="col-xs-12">
                        <div class="row">
                            <div class="col-xs-2"><!-- LEAVE EMPTY --></div>
                            <div class="pm-certificate-name underline margin-0 col-xs-8 text-center">
                                <?php
                                $f = DB::table('users')->where('id',$certificate->user_id)->first();
                                ?>
                                            
                                <span class="pm-name-text bold">{{ $f->name  }}</span>
                            </div>
                            <div class="col-xs-2"><!-- LEAVE EMPTY --></div>
                        </div>
                    </div>

                    <div class="col-xs-12">
                        <div class="row">
                            <div class="col-xs-2"><!-- LEAVE EMPTY --></div>
                            <div class="pm-earned col-xs-8 text-center">
                                <span class="pm-earned-text padding-0 block cursive">has earned</span>
                                <span class="pm-credits-text block bold sans">{{ $certificate->heading }}</span>
                            </div>
                            <div class="col-xs-2"><!-- LEAVE EMPTY --></div>
                            <div class="col-xs-12"></div>
                        </div>
                    </div>

                    <div class="col-xs-12">
                        <div class="row">
                            <div class="col-xs-2"><!-- LEAVE EMPTY --></div>
                            <div class="pm-course-title col-xs-8 text-center">
                                {{-- <span class="pm-earned-text block cursive">{{$certificate->description}}</span> --}}
                            </div>
                            <div class="col-xs-2"><!-- LEAVE EMPTY --></div>
                        </div>
                    </div>

                    <div class="col-xs-12">
                        <div class="row">
                            <div class="col-xs-2"><!-- LEAVE EMPTY --></div>
                            <div class="pm-course-title underline col-xs-8 text-center">

                                <span class="pm-credits-text block bold sans">{{$certificate->description}}</span>

                            </div>
                            <div class="col-xs-2"><!-- LEAVE EMPTY --></div>
                            <br>
                        </div>
                    </div>


                </div>
                    <div class="col-xs-12 ">
                        <div class="row row-split" style="margin-top: -60px">
                            <!-- Left Section -->

                            <div class="pm-certificate-footer col-split pm-certified col-xs-4 text-left"> <br><br><br>
                                <br>      <br>  
                              <span></span>  <hr style="width: 200px">
                                <span class="pm-credits-text block sans">Signature</span>
                               
                               
                            </div>


                            <!-- Right Section -->
                            <div class="pm-certificate-footer col-split col-xs-4 pm-certified col-xs-4">
                                <br><br><br> <br>  
                               <span>{{ $certificate->issue_date }}</span> <hr style="width: 200px">
                                <span class="pm-credits-text block sans">Date Of Issurance</span>
                            
                               
                            </div>
                        </div>
                    </div>
          
                    <div class="col-xs-12">
                        <div class="row pm-certificate-footer " style="margin-top: 70px">
                           
                            <img src="{{ asset('/uploads/certificate/' . 
                            $certificate->collaboration_banner) }}" style="width: 100%;height: 55px;" alt="">
                        </div>
                    </div>
                    <div class="col-xs-12 ">
                        <div class="row row-split" style="margin-top: -130px">
                            <!-- Left Section -->

                          


                            <!-- Right Section -->
                            <div class="pm-certificate-footer col-split col-xs-12 pm-certified col-xs-12 text-center">
                                <br><br><br> <br>  <br> <br> 
                              <span>{{$certificate->verification_code}}</span>  <hr style="width: 400pxl">
                                <span class="pm-credits-text block sans text-center">Certification No</span>
                               
                               
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</body>

</html>
