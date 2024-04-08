<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="">
    <meta name="theme-color" content="#ff8a00">
    <meta name="description" content="Job Portal HTML Template">
    <meta name="keywords" content="Employment, Naukri, Shine, Indeed, Job Posting, Job Provider">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>

    <!--  Favicon -->
    <link rel="shortcut icon" href="{{ asset('frontend/images/favicon.png') }}">
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap-grid.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/icons.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,600,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
</head>

<body>

    <!-- Wrapper -->
    <div id="wrapper">
        <!-- Header Container -->
       @include('frontend.body.header')
        <div class="clearfix"></div>
        <!-- Header Container / End -->

        <!-- Titlebar -->
        <div id="titlebar" class="gradient">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Log In</h2>
                        <nav id="breadcrumbs">
                            <ul>
                                <li><a href="{{ url('/') }}">Home</a></li>
                                <li>Log In</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <!-- Page Content -->
        <div class="container">
            <div class="row">
                <div class="col-xl-6 offset-xl-3">
                    <div class="utf-login-register-page-aera margin-bottom-50">
                        <div class="utf-welcome-text-item">
                            <h3>Welcome jobseeker Back Sign in to Continue</h3>
                            <span>Don't Have an Account? <a href="{{ url('/register') }}">Sign Up!</a></span>
                        </div>


                        <form method="post" id="login-form" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group utf-no-border">
                                <input type="text" class="form-control utf-with-border @error('email') is-invalid @enderror"
                                    name="email" id="email" placeholder="Email Address">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color:#FF8A00;">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group utf-no-border">
                                <input type="password" class="form-control utf-with-border @error('password') is-invalid @enderror"
                                    name="password" id="password" placeholder="Password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color:#FF8A00;">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            {{-- <a href="forgot-password.html" class="forgot-password">Forgot Password?</a> --}}
                        </form>




                        <button class="button full-width utf-button-sliding-icon ripple-effect margin-top-10"
                            type="submit" form="login-form">Log In <i
                                class="icon-feather-chevron-right"></i></button>

                        {{-- <div class="utf-social-login-separator-item"><span>Or Login in With</span></div> --}}
                        {{-- <div class="utf-social-login-buttons-block">
                            <button class="facebook-login ripple-effect"><i class="icon-brand-facebook-f"></i>
                                Facebook</button>
                            <button class="google-login ripple-effect"><i class="icon-brand-google"></i>
                                Google+</button>
                            <button class="twitter-login ripple-effect"><i class="icon-brand-twitter"></i>
                                Twitter</button>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>


@include('frontend.body.footer')
    </div>
    <!-- Wrapper / End -->

    <!-- Scripts -->
    <script src="{{ asset('frontend/js/jquery-3.3.1.min.js') }} "></script>
    <script src="{{ asset('frontend/js/jquery-migrate-3.0.0.min.js') }} "></script>
    <script src="{{ asset('frontend/js/mmenu.min.js') }} "></script>
    <script src="{{ asset('frontend/js/tippy.all.min.js') }} "></script>
    <script src="{{ asset('frontend/js/simplebar.min.js') }} "></script>
    <script src="{{ asset('frontend/js/bootstrap-slider.min.js') }} "></script>
    <script src="{{ asset('frontend/js/bootstrap-select.min.js') }} "></script>
    <script src="{{ asset('frontend/js/snackbar.js') }} "></script>
    <script src="{{ asset('frontend/js/clipboard.min.js') }} "></script>
    <script src="{{ asset('frontend/js/counterup.min.js') }} "></script>
    <script src="{{ asset('frontend/js/magnific-popup.min.js') }} "></script>
    <script src="{{ asset('frontend/js/slick.min.js') }} "></script>
    <script src="{{ asset('frontend/js/custom_jquery.js') }} "></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch (type) {
                case 'info':
                    toastr.info(" {{ Session::get('message') }} ");
                    break;
                case 'success':
                    toastr.success(" {{ Session::get('message') }} ");
                    break;
                case 'warning':
                    toastr.warning(" {{ Session::get('message') }} ");
                    break;
                case 'error':
                    toastr.error(" {{ Session::get('message') }} ");
                    break;

            }
        @endif
    </script>
</body>

</html>
