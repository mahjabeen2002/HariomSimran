@extends('userside.layout')
@section('title')

    <head>
        <title>Login | HariomSimran</title>
        <meta name="description" content="Login Page" />
        <meta name="keywords" content="HariomSimran" />
    </head>
@endsection
@section('usercontent')
    <div class="sigma_subheader dark-overlay dark-overlay-2"
        style="background-image: url(Mytemplate/assets/img/subheader.jpg)">

        <div class="container">
            <div class="sigma_subheader-inner">
                <div class="sigma_subheader-text">
                    <h1>Login</h1>
                </div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="btn-link" href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Login</li>
                    </ol>
                </nav>
            </div>
        </div>

    </div>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <div class="main-content">
        <!-- Section: inner-header -->

        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-push-3" style="margin-top:40px ">
                        <img src="Mytemplate/assets/img/about.jpg" alt="about">

                    </div>


                    <div class="col-md-6 col-md-push-3">
                        <h4 class="text-gray mt-0 pt-5"> Login</h4>
                        <hr>

                        @if (session('error'))
                            <div class="alert alert-danger" role="alert">
                                <strong>{{ session('error') }}</strong>
                            </div>
                        @endif

                        @if (session('loginfailed'))
                            <div class="alert alert-danger" role="alert">
                                <strong>{{ session('loginfailed') }}</strong>
                            </div>
                        @endif

                        @if (session('mesg'))
                            <div class="alert alert-primary" role="alert">
                                <strong>{{ session('mesg') }}</strong>
                            </div>
                        @endif


                        <form method="POST" action="{{ route('login.process') }}" class="clearfix">
                            @csrf

                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="email">Email</label>
                                    <input class="form-control" name="email" required autofocus>
                                </div>
                                @error('email')
                                    <div class="text-danger text-sm"><small>{{ $message }}</small></div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" name="password" required>

                                </div>
                                @error('password')
                                    <div class="text-danger text-sm"><small>{{ $message }}</small></div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-8">
                                    <div class="checkbox pull-left mt-15">
                                        <label for="form_checkbox">
                                            <a class="sigma_btn-custom section-button" href="/registerget"
                                                style="margin-top: -12px">Sign up? </a></label>
                                    </div>
                                </div>

                                {{-- <div class="col-md-4"><label for="form_checkbox">
                                        <div class="checkbox pull-right mt-15">
                                            <a class="sigma_btn-custom section-button"
                                                href="{{ route('forget.password.get') }}" style="margin-top: -12px">Reset
                                                Password</a>

                                        </div>
                                </div> --}}
                            </div>
                            <div class="clear text-center pt-10">
                                <a class="text-theme-colored font-weight-600 font-12" href="#"></a>
                            </div>

                            <div class="clear text-center pt-10">
                                <button type="submit" class="sigma_btn-custom section-button form-control">LogIn</button>
                                <br> OR <br>
                            </div>

                            <div class="clear text-center pt-10">
                                <div class="google-btn">
                                    <div class="google-icon-wrapper">
                                        <a type="button" href="/auth/google" class="form-control">
                                            <img class="google-icon"
                                                src="https://upload.wikimedia.org/wikipedia/commons/5/53/Google_%22G%22_Logo.svg" />
                                            Continue with Google</a> <br>
                                    </div>
                                </div>



                            </div>
                    </div>
                    </form>
                </div>
            </div>
    </div>
    </section>
    </div>
@endsection
