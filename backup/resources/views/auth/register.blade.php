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

        <div class="container">
            <div class="row">
                <div class="col-xl-6 offset-xl-3">
                    <div class="utf-login-register-page-aera margin-bottom-50">
                        <div class="utf-welcome-text-item">
                            <h3>Create Your New Account!</h3>
                            <span>Don't Have an Account? <a href="{{ url('login') }}">Log In!</a></span>
                        </div>
                        <div class="utf-account-type">
                            {{-- <div>
                                <input type="radio" name="utf-account-type-radio" id="freelancer-radio"
                                    class="utf-account-type-radio" checked="">
                                <label for="freelancer-radio" data-tippy-placement="top" class="utf-ripple-effect-dark"
                                    data-tippy="" data-original-title="Jobseeker Registration"><i
                                        class="icon-material-outline-business-center"></i> Jobseeker
                                    Registration</label>
                            </div> --}}


                            <div>
                                <input type="radio"
                                    class="utf-account-type-radio" checked="">
                                <label for="freelancer-radio" class="utf-ripple-effect-dark"
                                    data-tippy="" data-original-title="Employer"><i
                                        class="icon-material-outline-business-center"></i> Jobseeker</label>
                            </div>
                            <a href="{{ url('/become/employer') }}">
                                <div>
                                    <input type="radio" class="utf-account-type-radio visually-hidden">
                                    <label for="employer-radio" class="utf-ripple-effect-dark" >
                                        <i class="icon-material-outline-account-circle"></i>Create Employer
                                    </label>
                                </div>
                            </a>



                        </div>


                        <form method="post" id="utf-register-account-form" action="{{ route('register') }}">
                            @csrf

                            <div class="utf-no-border">
                                <input type="text" class="utf-with-border" name="name" placeholder="User Name">
                            </div>
                            @error('name')
                                <span class="mt-2" style="color:#FF8A00;">{{ $message }}</span>
                            @enderror

                            <div class="utf-no-border">
                                <input type="text" class="utf-with-border" name="email"
                                    placeholder="Email Address">
                            </div>
                            @error('email')
                                <span class="mt-2" style="color:#FF8A00;">{{ $message }}</span>
                            @enderror

                            <div class="utf-no-border">
                                <input type="password" class="utf-with-border" name="password" placeholder="Password">
                            </div>
                            @error('password')
                                <span class="mt-2" style="color:#FF8A00;">{{ $message }}</span>
                            @enderror

                            <div class="utf-no-border">
                                <input type="password" class="utf-with-border" name="password_confirmation"
                                    placeholder="Repeat Password">
                            </div>
                            @error('password_confirmation')
                                <span class="mt-2" style="color:#FF8A00;">{{ $message }}</span>
                            @enderror

                            <button class="button full-width utf-button-sliding-icon ripple-effect margin-top-10"
                                type="submit">
                                Create An Account <i class="icon-feather-chevron-right"></i>
                            </button>
                        </form>



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
</body>

</html>






{{--

<x-guest-layout>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
