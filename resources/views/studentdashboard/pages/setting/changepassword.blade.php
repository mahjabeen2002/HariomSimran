@extends('studentdashboard.layouts.layout')
@section('content')
    <style>
        .field-icon {
            float: right;
            margin-left: -25px;
            margin-top: -25px;
            position: relative;
            z-index: 2;
        }
    </style>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <div id="main">
        @if (Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif
        <div class="container ">
            <div class="page-heading">
                <section id="basic-vertical-layouts">
                    <div class="row match-height">
                        <div class="col-md-12 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title"> Edit Account </h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        @if (session('error'))
                                            <div class="alert alert-danger">
                                                {{ session('error') }}
                                            </div>
                                        @endif

                                        @if (session('success'))
                                            <div class="alert alert-success">
                                                {{ session('success') }}
                                            </div>
                                        @endif
                                        <form class="form form-vertical" action="{{ route('change.password') }}"
                                            method="POST">
                                            @csrf
                                            <div class="form-body">
                                                <div class="row">

                                                    <!-- Old Password Field -->
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="old_password">Old Password:</label>
                                                            <input type="password" class="form-control"
                                                                id="old-password-field" name="old_password" required>
                                                            <span toggle="#old-password-field"
                                                                class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                                        </div>
                                                    </div>

                                                    <!-- New Password Field -->
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="new_password">New Password:</label>
                                                            <input type="password" class="form-control"
                                                                id="new-password-field" name="new_password" required>
                                                            <span toggle="#new-password-field"
                                                                class="fa fa-fws fa-eye field-icon newtoggle-password"></span>
                                                        </div>
                                                    </div>

                                                    <!-- Confirm Password Field -->
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="confirm_password">Confirm Password:</label>
                                                            <input type="password" class="form-control"
                                                                id="confirm-password-field" name="confirm_password"
                                                                required>
                                                            <span toggle="#confirm-password-field"
                                                                class="fa fa-fwc fa-eye field-icon confirmtoggle-password"></span>
                                                        </div>
                                                    </div>

                                                    <div class="col-12 d-flex justify-content-end">
                                                        <button type="submit" name="submit"
                                                            class="btn btn-primary me-1 mb-1">
                                                            Add Password
                                                        </button>
                                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">
                                                            Reset
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </section>

            </div>
        </div>




    </div>

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>

    <script>
        $(".toggle-password").click(function() {
            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $($(this).attr("toggle"));
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
    </script>

    <script>
        $(".newtoggle-password").click(function() {
            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $($(this).attr("toggle"));
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
    </script>

    <script>
        $(".confirmtoggle-password").click(function() {
            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $($(this).attr("toggle"));
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
    </script>
@endsection
